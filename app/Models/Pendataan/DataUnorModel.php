<?php  namespace App\Models\Pendataan;
use CodeIgniter\Model;

class DataUnorModel extends Model
{
    protected $table              = 'dataunor';
    protected $primaryKey         = 'UnorId';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = true;

    protected $allowedFields      = [
                                        'no_urut',
                                        'UnorId',
                                        'NamaUnor',
                                        'nama_unor',
                                        'EselonId',
                                        'cepat_kode',
                                        'unor_atasan',
                                        'jenis_unor_id',
                                        'unor_induk',
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
    
    public function getKueri($id = false)
    {
        if($id === false)
        {
            $kueri = "SELECT d1.*, d2.NamaUnor as nama_induk
                        FROM 
                        dataunor d1
                        LEFT JOIN 
                        dataunor d2
                        ON d1.unor_induk = d2.UnorId
                        ORDER BY d1.no_urut ASC";
        }
        else
        {
            $kueri = "SELECT d1.*, d2.NamaUnor as nama_induk
                        FROM 
                        dataunor d1
                        LEFT JOIN 
                        dataunor d2
                        ON d1.unor_induk = d2.UnorId
                        WHERE $id
                        ORDER BY d1.no_urut ASC";
        } 
        $result = $this->db->query($kueri)->getResultArray();
        return $result;
    }

    public function getCepatKode($id = false)
    {
        if($id === false)
        {
            $kueri = "SELECT d1.*, d2.NamaUnor as nama_induk
                        FROM 
                        dataunor d1
                        LEFT JOIN 
                        dataunor d2
                        ON d1.unor_induk = d2.UnorId
                        WHERE d1.cepat_kode<>'0'
                        ORDER BY d1.no_urut ASC";
        }
        else
        {
            $kueri = "SELECT d1.*, d2.NamaUnor as nama_induk
                        FROM 
                        dataunor d1
                        LEFT JOIN 
                        dataunor d2
                        ON d1.unor_induk = d2.UnorId
                        WHERE d1.cepat_kode<>'0' AND $id
                        ORDER BY d1.no_urut ASC";
        } 
        $result = $this->db->query($kueri)->getResultArray();
        return $result;
    }
}