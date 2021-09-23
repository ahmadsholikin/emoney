<?php namespace App\Models\Auth;
use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table              = 'app_users';
    protected $primaryKey         = 'email';
    protected $useSoftDeletes     = false;
    protected $returnType         = 'array';

    protected $allowedFields      = [
                                        'username',
                                        'email',
                                        'password',
                                        'group_id',
                                        'is_active'
                                    ];

    protected $useTimestamps      = true;
    protected $createdField       = 'created_at';
    protected $updatedField       = 'updated_at';
    protected $deletedField       = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;


    public function cek($email,$password)
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
								->join('app_group','app_group.group_id = app_users.group_id')
								->where('app_users.email', $email)
								->limit(1)
								->get()
								->getRowArray();
				return $hasil;
			}
			return false;
		}
   	}
}