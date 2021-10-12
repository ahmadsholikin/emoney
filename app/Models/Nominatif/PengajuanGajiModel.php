<?php namespace App\Models\Nominatif;
use CodeIgniter\Model;

class PengajuanGajiModel extends Model
{
    protected $table              = 'pengajuan_gaji';
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

    //SHOW COLUMNS FROM pengajuan_gaji;
    protected $allowedFields      = [
        'id',
        'periode',
        'nip',
        'skpd',
        'valid',
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