<?php  namespace App\Models\Pendataan;
use CodeIgniter\Model;

class DataVerifikatorModel extends Model
{
    protected $table              = 'verifikator';
    protected $primaryKey         = 'id';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = true;

    protected $allowedFields      = [
                                        'nip',
                                        'nama',
                                        'status',
                                        'biro_sdm',
                                        'unor_id',
                                        'nama_unor',
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
            return $this->orderBy('nama_unor','ASC')->findAll();
        }
        else
        {
            return $this->where($id)->find();
        } 
    }
}