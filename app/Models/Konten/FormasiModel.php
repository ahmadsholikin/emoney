<?php  namespace App\Models\Konten;
use CodeIgniter\Model;

class FormasiModel extends Model
{
    protected $table              = 'formasi';
    protected $primaryKey         = 'no';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = true;

    protected $allowedFields      = [
                                        'jabatan',
                                        'pendidikan',
                                        'cpns',
                                        'pppk',
                                        'kode_unit_kerja',
                                        'unit_kerja',
                                        'jbt_tipe_kd',
                                        'tahun',
                                        'ket',
                                        'gol',
                                        'created_at',
                                        'updated_at',
                                        'deleted_at'
                                    ];

    protected $useTimestamps      = true;
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
            return $this->where($id)->find();
        } 
    }

    public function getCPNSAll()
    {
        $kueri = "SELECT jabatan,pendidikan,cpns as jumlah,unit_kerja as ket FROM formasi WHERE pppk=0";

        $kueri = $this->db->query($kueri)->getResultArray();

        if(empty($kueri))
        {
            return array();
        }
        else
        {
            return $kueri;
        }
    }

    public function getCPNSNonTeknis()
    {
        $kueri = "SELECT jabatan,pendidikan,cpns as jumlah,unit_kerja as ket FROM formasi WHERE jbt_tipe_kd NOT IN ('90','40') AND pppk=0";

        $kueri = $this->db->query($kueri)->getResultArray();

        if(empty($kueri))
        {
            return array();
        }
        else
        {
            return $kueri;
        }
    }

    public function getCPNSTeknis()
    {
        $kueri = "SELECT jabatan,pendidikan,cpns as jumlah,unit_kerja as ket FROM formasi WHERE jbt_tipe_kd IN ('90','40') AND pppk=0";

        $kueri = $this->db->query($kueri)->getResultArray();

        if(empty($kueri))
        {
            return array();
        }
        else
        {
            return $kueri;
        }
    }

    public function getPPPKAll()
    {
        $kueri = "SELECT jabatan,pendidikan,pppk as jumlah,unit_kerja as ket FROM formasi WHERE jbt_tipe_kd IN ('90','40') AND cpns=0";

        $kueri = $this->db->query($kueri)->getResultArray();

        if(empty($kueri))
        {
            return array();
        }
        else
        {
            return $kueri;
        }
    }

    public function getPPPKNonTeknis()
    {
        $kueri = "SELECT jabatan,pendidikan,pppk as jumlah,unit_kerja as ket FROM formasi WHERE jbt_tipe_kd NOT IN ('90','40') AND cpns=0";

        $kueri = $this->db->query($kueri)->getResultArray();

        if(empty($kueri))
        {
            return array();
        }
        else
        {
            return $kueri;
        }
    }

    public function getPPPKTeknis()
    {
        $kueri = "SELECT jabatan,pendidikan,pppk as jumlah,unit_kerja as ket FROM formasi WHERE jbt_tipe_kd IN ('90','40') AND cpns=0";

        $kueri = $this->db->query($kueri)->getResultArray();

        if(empty($kueri))
        {
            return array();
        }
        else
        {
            return $kueri;
        }
    }

    public function getAll()
    {
        $kueri = "SELECT jabatan,pendidikan,CONCAT('CPNS : ',cpns,'<br>','PPPK : ',pppk) as jumlah,unit_kerja as ket FROM formasi";

        $kueri = $this->db->query($kueri)->getResultArray();

        if(empty($kueri))
        {
            return array();
        }
        else
        {
            return $kueri;
        }
    }
}