<?php namespace App\Controllers\Backend\Dashboard;
use App\Controllers\BackendController;

class Main extends BackendController
{
	public $path_view 	= "backend/dashboard/";
	public $theme		= "pages/theme-backend/render";

	public function index()
	{
		$param['menu']          = $this->menu;
		$param['activeMenu'] 	= $this->activeMenu;
		$data['pertanyaan']		= 0;
		$param['page']          = view($this->path_view.'page-index',$data);
		return view($this->theme, $param);
	}
}