<?php namespace App\Controllers\Backend\DataTPP;
use App\Controllers\BackendController;
use App\Models\DataTpp\NominalKelasJabatanModel;

class NominalKelasJabatan extends BackendController
{
    public $path_view = 'backend/datatpp/nominalkelasjabatan/';
    public $theme     = 'pages/theme-backend/render';

    public function __construct()
    {
        $this->NominalKelasJabatanModel = new NominalKelasJabatanModel();
    }

    public function index()
    {
        $param['menu']       = $this->menu;
        $param['activeMenu'] = $this->activeMenu;
        if ($param['activeMenu']['akses_lihat'] == '0')
        {
            return redirect()->to('denied');
        }
        $data['data']   = $this->NominalKelasJabatanModel->get();
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
        $db     = $this->NominalKelasJabatanModel->get(['id'=>$id]);
        if (empty($db))
        {
            return redirect()->to('404');
        }
        $data['data']   = $db[0];
        $param['page']  = view($this->path_view . 'page-edit',$data);
        return view($this->theme, $param);
    }

    public function insert()
    {
        $param['menu']          = $this->menu;
        $param['activeMenu']    = $this->activeMenu;
        if($param['activeMenu']['akses_tambah'] == '0')
        {
            return redirect()->to('denied');
        }
        $data['induk_kelas']    = entitiestag($this->request->getPost('induk_kelas'));
        $data['kelas']          = entitiestag($this->request->getPost('kelas'));
        $data['nominal']        = str_replace(".","",entitiestag($this->request->getPost('nominal')));
        $data['tahun_berlaku']  = entitiestag($this->request->getPost('tahunBerlaku'));
        $data['keterangan']     = entitiestag($this->request->getPost('keterangan'));

        if(!$this->validate([
            'induk_kelas' => [
                'rules'     => 'required',
                'errors'    => [
                    'required' 		=> 'Wajib diisikan',
                ]
            ],
            'kelas' => [
                'rules'     => 'required',
                'errors'    => [
                    'required' 		=> 'Wajib diisikan',
                ]
            ],
            'nominal' => [
                'rules'     => 'required',
                'errors'    => [
                    'required' 		=> 'Wajib diisikan',
                ]
            ],
            'tahunBerlaku' => [
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

        $this->NominalKelasJabatanModel->insert($data);
        return redirect()->to(backend_url() . '/nominal-kelas-jabatan');
    }


    public function update()
    {
        $param['menu']          = $this->menu;
        $param['activeMenu']    = $this->activeMenu;
        if($param['activeMenu']['akses_ubah'] == '0')
        {
            return redirect()->to('denied');
        }
        $data['induk_kelas']    = entitiestag($this->request->getPost('induk_kelas'));
        $data['kelas']          = entitiestag($this->request->getPost('kelas'));
        $data['nominal']        = str_replace(".","",entitiestag($this->request->getPost('nominal')));
        $data['tahun_berlaku']  = entitiestag($this->request->getPost('tahunBerlaku'));
        $data['keterangan']     = entitiestag($this->request->getPost('keterangan'));

        if(!$this->validate([
            'induk_kelas' => [
                'rules'     => 'required',
                'errors'    => [
                    'required' 		=> 'Wajib diisikan',
                ]
            ],
            'kelas' => [
                'rules'     => 'required',
                'errors'    => [
                    'required' 		=> 'Wajib diisikan',
                ]
            ],
            'kelas' => [
                'rules'     => 'required',
                'errors'    => [
                    'required' 		=> 'Wajib diisikan',
                ]
            ],
            'nominal' => [
                'rules'     => 'required',
                'errors'    => [
                    'required' 		=> 'Wajib diisikan',
                ]
            ],
            'tahunBerlaku' => [
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
        $this->NominalKelasJabatanModel->update($id,$data);
        return redirect()->to(backend_url() . '/nominal-kelas-jabatan');
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
        $this->NominalKelasJabatanModel->delete($id);
        return redirect()->to(backend_url() . '/nominal-kelas-jabatan');
    }



}