<?php namespace App\Controllers\Backend\Laporan;
use App\Controllers\BackendController;

class LaporanBPJS extends BackendController
{
    public $path_view = 'backend/laporan/laporanbpjs/';
    public $theme     = 'pages/theme-backend/render';

    public function index()
    {
        $param['menu']       = $this->menu;
        $param['activeMenu'] = $this->activeMenu;
        if ($param['activeMenu']['akses_lihat'] == '0')
        {
            return redirect()->to('denied');
        }
        $param['page']  = view($this->path_view . 'page-index');
        return view($this->theme, $param);
    }
}