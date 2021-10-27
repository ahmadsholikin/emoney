<?php namespace App\Models\DataTpp;
use CodeIgniter\Model;

class NominatifPenerimaModel extends Model
{
    protected $table              = 'tpp_nominatif_penerima';
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

    //SHOW COLUMNS FROM tpp_nominatif_penerima;
    protected $allowedFields      = [
        'nip',
        'kelas',
        'nominal',
        'prosentase',
        'penerimaan',
        'jenis',
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