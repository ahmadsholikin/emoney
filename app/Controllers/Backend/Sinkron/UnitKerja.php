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

    public function add()
    {
        $param['menu']       = $this->menu;
        $param['activeMenu'] = $this->activeMenu;
        if ($param['activeMenu']['akses_lihat'] == '0')
        {
            return redirect()->to('denied');
        }
        $data = array();
        $param['page']  = view($this->path_view . 'page-add',$data);
        return view($this->theme, $param);
    }

    public function edit()
    {
        $param['menu']       = $this->menu;
        $param['activeMenu'] = $this->activeMenu;
        if ($param['activeMenu']['akses_lihat'] == '0')
        {
            return redirect()->to('denied');
        }
        $id     = entitiestag($this->request->getGet('id'));
        $db     = $this->UnitKerjaModel->get(['id'=>$id]);
        if (empty($db))
        {
            return redirect()->to('404');
        }
        $data['data'] = $db[0];
        $param['page']  = view($this->path_view . 'page-edit',$data);
        return view($this->theme, $param);
    }

    //proses
    public function insert()
    {
        $param['menu']          = $this->menu;
        $param['activeMenu']    = $this->activeMenu;
        if($param['activeMenu']['akses_tambah'] == '0')
        {
            return redirect()->to('denied');
        }

        $data['kode_simpeg']    = entitiestag($this->request->getPost('kodeSimpeg'));
        $data['nama']           = entitiestag($this->request->getPost('nama'));

        if(!$this->validate([
            'kodeSimpeg' => [
                'rules'     => 'required',
                'errors'    => [
                    'required' 		=> 'Wajib diisikan',
                ]
            ],
            'nama' => [
                'rules'     => 'required',
                'errors'    => [
                    'required' 		=> 'Wajib diisikan',
                ]
            ],

        ]))
        {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation',$validation);
        }

        $this->UnitKerjaModel->insert($data);
        return redirect()->to(backend_url() . '/unit-kerja');
    }


    public function update()
    {
        $param['menu']          = $this->menu;
        $param['activeMenu']    = $this->activeMenu;
        if($param['activeMenu']['akses_ubah'] == '0')
        {
            return redirect()->to('denied');
        }

        $data['kode_simpeg']    = entitiestag($this->request->getPost('kodeSimpeg'));
        $data['nama']           = entitiestag($this->request->getPost('nama'));

        if(!$this->validate([
            'kodeSimpeg' => [
                'rules'     => 'required',
                'errors'    => [
                    'required' 		=> 'Wajib diisikan',
                ]
            ],
            'nama' => [
                'rules'     => 'required',
                'errors'    => [
                    'required' 		=> 'Wajib diisikan',
                ]
            ],

        ]))
        {
            $validation = \Config\Services::validation();
            return redirect()->back()->withInput()->with('validation',$validation);
        }

        $id =  entitiestag($this->request->getPost('id'));
        $this->UnitKerjaModel->update($id,$data);
        return redirect()->to(backend_url() . '/unit-kerja');
    }


    public function delete()
    {
        $param['menu']          = $this->menu;
        $param['activeMenu']    = $this->activeMenu;
        if($param['activeMenu']['akses_hapus'] == '0')
        {
            return redirect()->to('denied');
        }

        $id =  entitiestag($this->request->getGet('id'));
        $this->UnitKerjaModel->delete($id);
        return redirect()->to(backend_url() . '/unit-kerja');
    }


}