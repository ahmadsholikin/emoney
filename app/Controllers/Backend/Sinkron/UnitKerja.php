<?php namespace App\Controllers\Backend\Sinkron;
use App\Controllers\BackendController;
use App\Models\Sinkron\UnitKerjaModel;

class UnitKerja extends BackendController
{
    public $path_view = 'backend/sinkron/unitkerja/';
    public $theme     = 'pages/theme-backend/render';

    public function __construct()
    {
        $this->UnitKerjaModel = new UnitKerjaModel();
    }

    public function index()
    {
        $param['menu']       = $this->menu;
        $param['activeMenu'] = $this->activeMenu;
        if ($param['activeMenu']['akses_lihat'] == '0')
        {
            return redirect()->to('denied');
        }
        $data['data']   = $this->UnitKerjaModel->get();
        $param['page']  = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
    }
}