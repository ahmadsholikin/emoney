<?php  namespace App\Models\Pendataan;
use CodeIgniter\Model;

class DataRelasiUnorModel extends Model
{
    protected $table              = 'relasi_unor';
    protected $primaryKey         = 'unor_id_verifikator';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = true;

    protected $allowedFields      = [
                                        'unor_id_verifikator',
                                        'unor_verifikator',
                                        'unor_id_approval',
                                        'unor_approval',
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
}