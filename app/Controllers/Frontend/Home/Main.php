<?php namespace App\Controllers\Frontend\Home;
use App\Controllers\FrontendController;
use App\Models\Konten\FaqModel;
use App\Models\Konten\BeritaModel;

class Main extends FrontendController
{
	public $path_view 	= "frontend/home/";
	public $theme		= "pages/theme-frontend/render";

	public function __construct()
	{
		$this->FaqModel 	= new FaqModel();
		$this->BeritaModel 	= new BeritaModel();
	}

	public function index()
	{
		$data['berita']	= $this->BeritaModel->get();
		$data['faq']	= $this->FaqModel->get();
		$param['page'] 	= view($this->path_view.'page-index',$data);
		return view($this->theme, $param);
	}
}