<?php namespace App\Models\Option;
use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table              = 'app_users';
    protected $primaryKey         = 'user_id';

    protected $useSoftDeletes     = false;
    protected $returnType         = 'object';

    protected $allowedFields      = [
                                        'username',
                                        'email',
                                        'kontak',
                                        'password',
                                        'group_id',
                                        'foto',
                                        'is_active'
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
        if($id == false)
        {
            return $this->findAll();
        }
        else
        {
            return $this->where($id)->first();
        }   
    }

    public function joinGroup($id = '')
    {
        $this->table($this->table);
        $this->select('*');
        $this->join('app_group', 'app_group.group_id = app_users.group_id');

        if($id != '')
        {
            $this->where($id);
        }

        return  $this->get();
    }

    public function is_active($id,$is_active)
    {
        $is_active==0?$data['is_active']=1:$data['is_active']=0;
        $this->update($id,$data);
    }

    public function cek_login($email,$password)
   	{
        $email      = $this->escapeString($email);
        $password   = $this->escapeString($password);
        
	   	$query = $this->table($this->table)
					   ->where('email', $email);
					   
        $row = $query->get()->getRow();
        
        if(is_null($row))
        {
			return false;
		}
        else
        {
            if(password_verify($password,$row->password))
            {
				$hasil = $this->table($this->table)
								->select('*')
								->join('ecc_app_group','ecc_app_group.group_id = ecc_app_users.group_id')
								->where('ecc_app_users.email', $email)
								->limit(1)
								->get()
								->getRowArray();
				return $hasil;
			}
			return false;
		}
   	}
}