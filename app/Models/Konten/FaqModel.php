<?php  namespace App\Models\Konten;
use CodeIgniter\Model;

class FaqModel extends Model
{
    protected $table              = 'faq';
    protected $primaryKey         = 'id';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = true;

    protected $allowedFields      = [
        'id',
        'pertanyaan',
        'jawaban',
        'created_at',
        'updated_at',
        'deleted_at',
        'id',
        'pertanyaan',
        'jawaban',
        'created_at',
        'updated_at',
        'deleted_at',
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