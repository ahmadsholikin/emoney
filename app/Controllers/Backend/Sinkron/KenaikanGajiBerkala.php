<?php namespace App\Controllers\Backend\Sinkron;
use App\Controllers\BackendController;

class KenaikanGajiBerkala extends BackendController
{
    public $path_view = 'backend/sinkron/kenaikangajiberkala/';
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

    public function getList()
    {
        if ($this->request->isAJAX())
        {
            $th     = tanggal_Y(entitiestag($this->request->getPost('periode')));
            $bl     = tanggal_m(entitiestag($this->request->getPost('periode')));
            $rest   = get_api("https://sipgan.magelangkab.go.id/sipgan/api/integrasi/kgb?th=".$th."&bl=".$bl,"");
            if($rest->status===true)
            {
                $data['data'] = $rest->data;
                echo view($this->path_view . 'page-list', $data);
            }
            else
            {
                echo "false";
            }
        }
        else 
        { 
            echo 'Akses Ditolak';
        }
    }
}