<?php namespace App\Models\DataTpp;
use CodeIgniter\Model;

class NominalKelasJabatanModel extends Model
{
    protected $table              = 'nominal_kelas_jabatan';
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

    //SHOW COLUMNS FROM nominal_kelas_jabatan;
    protected $allowedFields      = [
        'id',
        'induk_kelas',
        'kelas',
        'nominal',
        'tahun_berlaku',
        'keterangan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function get($id=false)
    {
        $this->orderBy('nominal','DESC');
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