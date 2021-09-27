<?php namespace App\Models\Sinkron;
use CodeIgniter\Model;

class HistKGBModel extends Model
{
    protected $table              = 'hist_kgb';
    protected $primaryKey         = 'id';
    protected $useSoftDeletes     = true;
    protected $returnType         = 'array';
    protected $useTimestamps      = true;
    protected $createdField       = 'created_at';
    protected $updatedField       = 'updated_at';
    protected $deletedField       = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

    //SHOW COLUMNS FROM hist_kgb;
    protected $allowedFields = [
        'periode',
        'nip',
        'nama',
        'jabatan',
        'unit_kerja',
        'pangkat',
        'gaji',
        'masker',
        'tmt',
        'pejabat',
        'no_sk',
        'tgl_sk',
        'flag_update',
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