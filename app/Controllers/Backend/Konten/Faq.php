<?php namespace App\Controllers\Backend\Konten;
use App\Controllers\BackendController;
use App\Models\Konten\FaqModel;

class Faq extends BackendController
{
    public $path_view = "backend/konten/faq/";
    public $theme     = "pages/theme-backend/render";

    public function __construct()
    {
        $this->FaqModel = new FaqModel();
    }

    public function index()
    {
        $data['data']        = $this->FaqModel->get();
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
        $data['row'] = $this->FaqModel->get(['id' => $id]);
        
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
        $data['pertanyaan'] = entitiestag($this->request->getPost('pertanyaan'));
        $data['jawaban']    = entitiestag($this->request->getPost('jawaban'));

        //proses validasi
        if(!$this->validate([
			'pertanyaan' => [
			    'rules'     => 'required',
			    'errors'    => [
	                'required' 		=> 'Wajib diisikan',
			    ]
			],
            'jawaban' => [
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

        $this->FaqModel->insert($data);
        return redirect()->to(backend_url() . '/konten-faq');
    }

    public function update()
    {
        $id = entitiestag($this->request->getPost('id'));

        $data['pertanyaan'] = entitiestag($this->request->getPost('pertanyaan'));
        $data['jawaban']    = entitiestag($this->request->getPost('jawaban'));

        //proses validasi
        if(!$this->validate([
			'pertanyaan' => [
			    'rules'     => 'required',
			    'errors'    => [
	                'required' 		=> 'Wajib diisikan',
			    ]
			],
            'jawaban' => [
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


        $this->FaqModel->update($id, $data);
        return redirect()->to(backend_url() . '/konten-faq');
    }

    public function delete()
    {
        $param['activeMenu'] = $this->activeMenu;
        
        if ($param['activeMenu']['akses_hapus'] == '0')
        {
            return redirect()->to('denied');
        }

        $id = $this->request->getGet('id');
        $this->FaqModel->delete($id);
        return redirect()->to(backend_url() . '/konten-faq');
    }


    
}