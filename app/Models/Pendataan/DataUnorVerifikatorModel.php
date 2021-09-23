<?php  namespace App\Models\Pendataan;
use CodeIgniter\Model;

class DataUnorVerifikatorModel extends Model
{
    protected $table              = 'unor_verifikator';
    protected $primaryKey         = 'unor_id_verifikator';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = true;

    protected $allowedFields      = [
                                        'unor_id_verifikator',
                                        'unor_verifikator',
                                        'status_v',
                                        'status_a',
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

    public function getJoin($id = false)
    {
        if($id === false)
        {
            $kueri = "SELECT d1.*, d2.NamaUnor as nama_induk, status_v, status_a
                        FROM 
                        dataunor d1
                        LEFT JOIN 
                        dataunor d2
                        ON d1.unor_induk = d2.UnorId
                        LEFT JOIN
                        unor_verifikator uva
                        ON uva.unor_id_verifikator = d1.UnorId
                        WHERE d1.cepat_kode<>'0'
                        ORDER BY d1.no_urut ASC";
        }
        else
        {
            $kueri = "SELECT d1.*, d2.NamaUnor as nama_induk, status_v, status_a
                        FROM 
                        dataunor d1
                        LEFT JOIN 
                        dataunor d2
                        ON d1.unor_induk = d2.UnorId
                        LEFT JOIN
                        unor_verifikator uva
                        ON uva.unor_id_verifikator = d1.UnorId
                        WHERE d1.cepat_kode<>'0' AND $id
                        ORDER BY d1.no_urut ASC";
        } 
        $result = $this->db->query($kueri)->getResultArray();
        return $result;
    }
}