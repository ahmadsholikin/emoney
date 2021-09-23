<?php  namespace App\Models\Option;
use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table              = 'app_menu';
    protected $primaryKey         = 'menu_id';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = true;

    protected $allowedFields      = [
                                        'menu_nama',
                                        'deskripsi',
                                        'link',
                                        'prefik',
                                        'ikon',
                                        'induk_id',
                                        'root_nama',
                                        'hirarki',
                                        'sub',
                                        'urutan',
                                        'aktif',
                                        'nama_tabel',
                                        'primary_key'
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

    public function getMenu($id = false)
    {
        if($id === false)
        {
            $session    = session();
            $group_id   = $session->group_id;

            $app_menu   = "app_menu";
            $app_role   = "app_role";
            $app_group  = "app_group";

            $kueri = "SELECT m.*,r.*
                        FROM $app_menu m
                            LEFT JOIN app_role r
                                ON r.menu_id = m.menu_id
                            LEFT JOIN $app_group g
                                ON r.group_id = g.group_id
                        WHERE r.group_id='$group_id' 
                            AND m.deleted_at IS NULL 
                            AND m.aktif='1'
                            AND r.akses_lihat='1'
                        ORDER BY urutan ASC;";
            return $this->db->query($kueri)->getResultArray();
        }
        else
        {
            return $this->where($id)->first();
        }   
    }

    public function getPrefik($prefik='')
    {
        $session    = session();
        $group_id   = $session->group_id;
        $app_menu   = "app_menu";
        $app_role   = "app_role";
        $app_group  = "app_group";

        $kueri = "SELECT m.*,r.*
                    FROM $app_menu m
                        LEFT JOIN $app_role r
                            ON r.menu_id = m.menu_id
                        LEFT JOIN $app_group g
                            ON r.group_id = g.group_id
                    WHERE m.prefik='".$prefik."' ;";

        return $this->db->query($kueri)->getRowArray();
    }

    public function lastSortingUrutan($id)
    {
        
        $cek    = $this->query("SELECT urutan+1 as hasil 
                                FROM ".$this->table." 
                                WHERE induk_id='".$id."' 
                                ORDER BY urutan DESC 
                                LIMIT 1 ");

        $last   = $this->query("SELECT urutan+1 as hasil 
                                FROM ".$this->table." 
                                ORDER BY urutan DESC 
                                LIMIT 1 ");
        $auto   = $last->getRow()->hasil;

        if (count($cek->getResult()) >= 1 )
        {
            $auto    = $cek->getRow()->hasil;
        }

        return $auto;
    }
}