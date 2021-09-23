<?php namespace App\Controllers\Backend\Option;
use App\Controllers\BackendController;
use App\Models\Option\UsersModel;

class Profile extends BackendController
{
	public $path_view = 'backend/option/pages/';
	public $theme     = 'pages/theme-backend/render';

	public function __construct()
	{	
		$this->UsersModel = new UsersModel();
	}

	public function index()
	{
		$param['menu']       = $this->menu;
		$param['activeMenu'] = $this->activeMenu;
		if ($param['activeMenu']['akses_lihat'] == '0')
		{
			return redirect()->to('denied');
		}
		$data['data']	= $this->UsersModel->get(['user_id'=>$_SESSION['user_id']]);		
		$param['page']  = view($this->path_view . 'page-profile',$data);
		return view($this->theme, $param);
	}

	public function update()
    {
		$data['kontak']     = entitiestag($this->request->getPost('kontak'));
        $data['email']      = entitiestag($this->request->getPost('email'));
        $data['username']   = entitiestag($this->request->getPost('username'));

        //proses validasi
        if(!$this->validate([
			'username' => [
			    'rules'     => 'required',
			    'errors'    => [
	                'required' 		=> 'Entrian nama site wajib diisikan',
			    ]
			],
			'email' => [
			    'rules'     => 'required|valid_email',
			    'errors'    => [
	                'required' 		=> 'Entrian email wajib diisikan',
					'valid_email' 	=> 'Entrian email harus valid dengan format email xxxxx@namadomain.com',
			    ]
			],
		]))
		{
			$validation = \Config\Services::validation();
			return redirect()->back()->withInput()->with('validation',$validation);
        }

		$cek_foto 	= $this->request->getFile('foto');
		if ($cek_foto->isValid())
		{
			$foto 	= $this->request->getFile('foto')->store('foto');
			$data['foto'] = $foto;
		}

        $id = $_SESSION['user_id'];
        $this->UsersModel->update($id, $data);
        return redirect()->back();
    }
}