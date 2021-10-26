<?php namespace App\Models\Sinkron;
use CodeIgniter\Model;

class UnitKerjaModel extends Model
{
    protected $table              = 'unit_kerja';
    protected $primaryKey         = 'id';
    protected $useSoftDeletes     = false;
    protected $returnType         = 'array';
    protected $useTimestamps      = true;
    protected $createdField       = 'created_at';
    protected $updatedField       = 'updated_at';
    protected $deletedField       = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

    //SHOW COLUMNS FROM unit_kerja;
    protected $allowedFields      = [
        'id',
        'kode_simpeg',
        'nama',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function get($id=false)
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