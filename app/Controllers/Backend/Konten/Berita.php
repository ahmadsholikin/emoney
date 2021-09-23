<?php namespace App\Controllers\Backend\Konten;
use App\Controllers\BackendController;
use App\Models\Konten\BeritaModel;

class Berita extends BackendController
{
    public $path_view = "backend/konten/berita/";
    public $theme     = "pages/theme-backend/render";

    public function __construct()
    {
        $this->BeritaModel = new BeritaModel();
    }

    public function index()
    {
        $data['data']        = $this->BeritaModel->get();
        $param['menu']       = $this->menu;
        $param['activeMenu'] = $this->activeMenu;

        if ($param['activeMenu']['akses_lihat'] == '0')
        {
            return redirect()->to('denied');
        }

        $param['page'] = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
    }

    public function add()
    {
        $param['menu']       = $this->menu;
        $param['activeMenu'] = $this->activeMenu;

        if ($param['activeMenu']['akses_tambah'] == '0')
        {
            return redirect()->to('denied');
        }

        $data['validation'] = \Config\Services::validation();
        $param['page']      = view($this->path_view . 'page-add',$data);
        return view($this->theme, $param);
    }

    public function edit()
    {
        $id          = $this->request->getGet('id');
        $data['row'] = $this->BeritaModel->get(['id' => $id]);
        
        if (empty($data['row']))
        {
            return redirect()->to(base_url() . '/404');
        }

        $param['menu']       = $this->menu;
        $param['activeMenu'] = $this->activeMenu;

        if ($param['activeMenu']['akses_ubah'] == '0')
        {
            return redirect()->to('denied');
        }

        $data['validation'] = \Config\Services::validation();
        $param['page']      = view($this->path_view . 'page-edit', $data);
        return view($this->theme, $param);
    }

    public function insert()
    {
        $data['judul']  = entitiestag($this->request->getPost('judul'));
        $data['isi']    = ($this->request->getPost('isi'));
        $data['slug']   = url_title($data['judul'], '-', TRUE);

        if (!empty($_FILES['cover']['name']))
        {
            $data['cover'] = $this->request->getFile('cover')->store('gambar');

            // $imgPath = $this->request->getFile('cover')->store('gambar');

            // // Image manipulation
            // $image = \Config\Services::image()
            //     ->withFile($imgPath)
            //     ->resize(200, 100, true, 'height')
            //     ->save(FCPATH .'/images/'. $imgPath->getRandomName(),6);

            // $imgPath->move(WRITEPATH . 'uploads');
        } 

        //proses validasi
        if(!$this->validate([
			'judul' => [
			    'rules'     => 'required',
			    'errors'    => [
	                'required' 		=> 'Wajib diisikan',
			    ]
			],
            'isi' => [
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

        $this->BeritaModel->insert($data);
        return redirect()->to(backend_url() . '/konten-berita');
    }

    public function update()
    {
        $id             = entitiestag($this->request->getPost('id'));
        $data['judul']  = entitiestag($this->request->getPost('judul'));
        $data['isi']    = ($this->request->getPost('isi'));
        $data['slug']   = url_title($data['judul'], '-', TRUE);

        if (!empty($_FILES['cover']['name']))
        {
            $data['cover'] = $this->request->getFile('cover')->store('gambar');
        } 

        //proses validasi
        if(!$this->validate([
			'judul' => [
			    'rules'     => 'required',
			    'errors'    => [
	                'required' 		=> 'Wajib diisikan',
			    ]
			],
            'isi' => [
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


        $this->BeritaModel->update($id, $data);
        return redirect()->to(backend_url() . '/konten-berita');
    }

    public function delete()
    {
        $param['activeMenu'] = $this->activeMenu;
        
        if ($param['activeMenu']['akses_hapus'] == '0')
        {
            return redirect()->to('denied');
        }

        $id = $this->request->getGet('id');
        $this->BeritaModel->delete($id);
        return redirect()->to(backend_url() . '/konten-berita');
    }


    
}