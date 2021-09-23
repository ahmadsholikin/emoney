<?php  namespace App\Models\Option;
use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table              = 'app_role';
    protected $primaryKey         = 'id';

    protected $returnType         = 'array';
    protected $useSoftDeletes     = true;

    protected $allowedFields      = [
                                        'group_id',
                                        'menu_id',
                                        'akses_lihat',
                                        'akses_tambah',
                                        'akses_ubah',
                                        'akses_hapus',
                                        'created_at',
                                        'updated_at',
                                        'deleted_at'
                                    ];

    protected $useTimestamps      = false;
    protected $createdField       = 'created_at';
    protected $updatedField       = 'updated_at';
    protected $deletedField       = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;


    public function get($id = false)
    {
        if($id === false)
        {
            return $this->findAll();
        }
        else
        {
            return $this->where($id)->first();
        }   
    }

    public function roleGroups($group_id)
    {
        $app_menu   = "app_menu";
        $app_role   = "app_role";
        $app_group  = "app_group";

        $kueri = "SELECT role.menu_id,role.menu_nama,role.aktif,role.hirarki,role.deskripsi,role.sub,role.link,role.deskripsi,role.ikon,role.prefik,
                    SUM(akses_lihat) AS akses_lihat,SUM(akses_tambah) AS akses_tambah,SUM(akses_ubah) AS akses_ubah,SUM(akses_hapus) AS akses_hapus,role.urutan,role.induk_id
                    FROM (SELECT m.*,'0' AS akses_lihat,'0' AS akses_tambah,'0' AS akses_ubah,'0' AS akses_hapus
                    FROM $app_menu m
                    LEFT JOIN $app_role r
                    ON r.menu_id = m.menu_id
                    WHERE m.deleted_at IS NULL
                    UNION
                    SELECT m.*,COALESCE(r.akses_lihat,0) AS akses_lihat,COALESCE(r.akses_tambah,0) AS akses_tambah,
                    COALESCE(r.akses_ubah,0) AS akses_ubah,COALESCE(r.akses_hapus,0) AS akses_hapus
                    FROM $app_menu m
                    LEFT JOIN $app_role r
                    ON r.menu_id = m.menu_id
                    LEFT JOIN $app_group g
                    ON r.group_id = g.group_id
                    WHERE r.group_id='$group_id' AND m.deleted_at IS NULL) role GROUP BY role.menu_id
                    ORDER BY urutan ASC;";

        $data   = $this->db->query($kueri)->getResult();
        return  $data; 
    }

    public function setRole($group_id,$menu_id,$akses,$value)
	{
		$hasil      = 0;

		$data = array(
			"group_id" 	=> $group_id,
			"menu_id" 	=> $menu_id, 
			$akses 		=> $value
		);

		$cek = $this->get(['menu_id'=>$menu_id, 'group_id' => $group_id]);
		if(is_null($cek))
		{
			$hasil = $this->insert($data);
		}
		else
		{
            $hasil = $this->update($cek['id'],$data);
		}
        return $hasil;
    }


    public function getAccess($menu_id)
    {
        $session    = session();
        $group_id   = $session->group_id;
        $cek = $this->where(['menu_id'=>$menu_id, 'group_id' => $group_id])->first();
        return $cek;
    }

}