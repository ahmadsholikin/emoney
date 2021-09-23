<?php namespace App\Controllers\Pages\Auth;
use App\Controllers\FrontendController;
use App\Models\Auth\LoginModel;

class Auth extends FrontendController
{
	public $path_view 	= "pages/auth/";
	public $theme		= "pages/theme-frontend/render";

	public function __construct()
    {
		$this->session      = session();
		$this->LoginModel   = new LoginModel();
    }

	public function index()
	{
		return view('frontend/home/page-sso');
	}

	public function signin()
	{
		$email      = $this->request->getPost('email');
        $password   = $this->request->getPost('password');

        // bagian awal validasi
        $post_validasi['email']       = $email;
        $post_validasi['password']    = $password;

        $validation = \Config\Services::validation();
        if($validation->run($post_validasi,'form_login')==false)
        {
            $this->session->setFlashdata('flash_auth_email_class', '-danger');
            $this->session->setFlashdata('flash_auth_email_info', 'Wajib diisi dengan email yang valid | Minimal 10 karakter');
            $this->session->setFlashdata('flash_auth_password_class', '-danger');
            $this->session->setFlashdata('flash_auth_password_info', 'Wajib diisikan | Minimal 5 karakter');
            return redirect()->back();
        }
        // bagian akhir validasi

        // proses autentikasi
		$cek_akun = $this->LoginModel->cek($email,$password);
        if(!$cek_akun)
        {
            $this->session->setFlashdata('flash_auth_email_class', '-danger');
            $this->session->setFlashdata('flash_auth_email_info', 'Akun tersebut tidak ditemukan. Mohon cek kembali');

            $output = [
                'status'    => 401,
                'message'   => 'Login failed',
            ];
            //return $this->respond($output, 401);
            $this->session->setFlashdata('flash_auth_email',  $email);
            $this->session->setFlashdata('flash_auth_password',  $password);
            $this->session->setFlashdata('flash_auth_password_class', '-danger');
            $this->session->setFlashdata('flash_auth_password_info', 'Kata sandi yang Anda entrikan salah.');
            return redirect()->back();
        }
        else
        {
            $user = array(
				"email"      => $cek_akun['email'],
                "foto"       => base_url()."/writable/uploads/".$cek_akun['foto'],
                "user_id"    => $cek_akun['user_id'],
                "username"   => $cek_akun['username'],
                "group_id"   => $cek_akun['group_id'],
                "group_nama" => $cek_akun['group_nama'],
				'logged_in'  => TRUE,
				"user_image" => "",
			);
            $this->session->set($user);
            return redirect()->to(backend_url().'/beranda');
        }
    }
    
    public function signout()
    {
        $this->session->destroy();
        return redirect()->to(base_url());
    }
}