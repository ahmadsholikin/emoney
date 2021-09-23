<?php namespace App\Controllers\Backend\Option;
use App\Controllers\BackendController;
use App\Models\Option\UsersModel;
use App\Models\Option\GroupsModel;

class Users extends BackendController
{
    public $path_view   = "backend/option/users/";
    public $theme       = "pages/theme-backend/render";

    public function __construct()
    {
        $this->UsersModel  = new UsersModel();
        $this->GroupsModel = new GroupsModel();
    }

    public function index() {
        $data['app_users']   = $this->UsersModel->joinGroup();
        $param['menu']       = $this->menu;
        $param['activeMenu'] = $this->activeMenu;

        if ($param['activeMenu']['akses_lihat'] == '0')
        {
            return redirect()->to('denied');
        }

        $param['page'] = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
    }

    public function add()
    {
        $data['app_group']   = $this->GroupsModel->get();
        $param['menu']       = $this->menu;
        $param['activeMenu'] = $this->activeMenu;
        
        if ($param['activeMenu']['akses_tambah'] == '0')
        {
            return redirect()->to('denied');
        }

        $param['page'] = view($this->path_view . 'page-add',$data);
        return view($this->theme, $param);
    }

    public function edit()
    {
        $id                 = $this->request->getVar('id');
        $data['row']        = $this->UsersModel->get(['email' => $id]);
        $data['app_group']  = $this->GroupsModel->get();

        if (empty($data['row']))
        {
            return redirect()->to(base_url() . '/404');
        }

        $param['menu'] = $this->menu;
        $param['activeMenu'] = $this->activeMenu;

        if ($param['activeMenu']['akses_ubah'] == '0')
        {
            return redirect()->to('denied');
        }

        $param['page'] = view($this->path_view . 'page-edit',$data);
        return view($this->theme, $param);
    }


    public function insert()
	{
		$data = [
			'username' 	=> entitiestag($this->request->getPost('username')),
			'email' 	=> entitiestag($this->request->getPost('email')),
			'group_id' 	=> entitiestag($this->request->getPost('group_id')),
			'password' 	=> password_hash(entitiestag($this->request->getPost('password')), PASSWORD_BCRYPT)
		];	
		$this->UsersModel->insert($data);
		return redirect()->to(backend_url().'/users');
	}

	public function update()
	{
        $id 	=   $this->request->getPost('email');
        
		//cek apakah user ingin mengubah kata sandinya sekalian atau tidak
		if(empty($this->request->getPost('password')))
		{
			$data['group_id'] =  entitiestag($this->request->getPost('group_id'));
			$data['username'] =  entitiestag($this->request->getPost('username'));
		}
		else
		{
			$data['password'] =  password_hash(entitiestag($this->request->getPost('password')), PASSWORD_BCRYPT);
		}

		$this->UsersModel->update($id, $data);
		return redirect()->to(backend_url().'/users');
	}

	public function delete()
	{
        $param['activeMenu']	= $this->activeMenu;
        
		if($param['activeMenu']['akses_hapus']=='0')
		{
			return redirect()->to('denied');	
		}

		$id 	=   $this->request->getVar('id');
		$this->UsersModel->delete($id);

		return redirect()->to(backend_url().'/users');
	}

	public function is_active()
	{
		$id 		=  $this->request->getGet('email');
        $is_active	=  $this->request->getGet('is_active');
        
		if($is_active==0)
        {
            $is_active=1;
        }
        else
        {
            $is_active=0;
        }

        $data['is_active'] = $is_active;
		$this->UsersModel->update($id,$data);
		return redirect()->to(backend_url().'/users');
	}
}
