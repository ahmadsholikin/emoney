<?php namespace App\Controllers\Backend\Nominatif;
use App\Controllers\BackendController;

class Penggajian extends BackendController
{
    public $path_view = 'backend/nominatif/penggajian/';
    public $theme     = 'pages/theme-backend/render';

    public function __construct()
    {
        $this->taspen = db_connect("taspen");
    }

    public function index()
    {
        $param['menu']       = $this->menu;
        $param['activeMenu'] = $this->activeMenu;
        if ($param['activeMenu']['akses_lihat'] == '0')
        {
            return redirect()->to('denied');
        }
        $data['data']   = $this->taspen->query("SELECT KDSKPD,NMSKPD FROM skpd_tbl")->getResult();
        $param['page']  = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
    }

    public function getList()
    {
        if ($this->request->isAJAX())
        {
            $skpd   = entitiestag($this->request->getPost('skpd')); 
            $db     = $this->taspen->query("SELECT * FROM mstpegawai WHERE KDSKPD='".$skpd."' AND KDSTAPEG='4' AND (TMTSTOP>='".date("Y-m-01")."' OR TMTSTOP IS NULL) ORDER BY GAPOK DESC")->getResult();
            $data['data'] = $db;
            echo view($this->path_view . 'page-list', $data);
        } 
        else
        { 
            echo 'Akses Ditolak';
        }
    }
}