<?php namespace App\Models\Option;
use CodeIgniter\Model;

class GroupsModel extends Model
{
    protected $table              = 'app_group';
    protected $primaryKey         = 'group_id';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = true;

    protected $allowedFields      = [
                                        'group_nama',
                                        'deskripsi',
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
            return $this->where($this->primaryKey, $id)->first();
        }   
    }
}