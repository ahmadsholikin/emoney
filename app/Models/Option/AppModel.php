<?php  namespace App\Models\Option;
use CodeIgniter\Model;

class AppModel extends Model
{
    protected $table              = 'app_info';
    protected $returnType         = 'array';
    protected $useSoftDeletes     = false;

    protected $allowedFields      = [
                                        'nama',
                                        'pengembanga',
                                        'site',
                                        'email',
                                        'kontak',
                                        'alamat',
                                        'versi',
                                        'logo',
                                        'deskripsi',
                                        'tentang',
                                    ];
    
    protected $skipValidation     = true;


    public function get($id = false)
    {
        if($id === false)
        {
            return $this->first();
        }
        else
        {
            return $this->where($id)->first();
        }   
    }
}