<?php namespace App\Controllers\Backend\Option;
use App\Controllers\BackendController;
use App\Models\Option\GroupsModel;

class Groups extends BackendController
{
    public $path_view = "backend/option/groups/";
    public $theme     = "pages/theme-backend/render";

    public function __construct()
    {
        $this->GroupsModel = new GroupsModel();
    }

    public function index()
    {
        $data['data']        = $this->GroupsModel->get();
        $param['menu']       = $this->menu;
        $param['activeMenu'] = $this->activeMenu;

        if ($param['activeMenu']['akses_lihat'] == '0')
        {
            return redirect()->to('denied');
        }

        $param['page'] = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
    }

    // load halaman add
    public function add()
    {
        $param['menu']       = $this->menu;
        $param['activeMenu'] = $this->activeMenu;
        
        if ($param['activeMenu']['akses_tambah'] == '0')
        {
            return redirect()->to('denied');
        }

        $param['page'] = view($this->path_view . 'page-add');
        return view($this->theme, $param);
    }

    // load halaman edit
    public function edit()
    {
        $data['row'] = $this->GroupsModel->get($this->request->getGet('id'));
        
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

        $param['page'] = view($this->path_view . 'page-edit',$data);
        return view($this->theme, $param);
    }

    // deklarasi
    private function _variabel()
    {
        $param['group_nama'] = strip_tags($this->request->getPost('group_nama'));
        $param['deskripsi'] = strip_tags($this->request->getPost('deskripsi'));
        return $param;
    }

    // Proses menambahkan group baru
    public function insert()
    {
        $param               = $this->_variabel();
        $param['created_at'] = date('Y-m-d H: i: s');
        $this->GroupsModel->insert($param);
        return redirect()->to(backend_url() . '/groups');
    }

    // Proses mengedit group
    public function update()
    {
        $param               = $this->_variabel();
        $param['updated_at'] = date('Y-m-d H: i: s');
        $this->GroupsModel->update(strip_tags($this->request->getPost('group_id')), $param);
        return redirect()->to(backend_url() . '/groups');
    }

    //hapus group
    public function delete()
    {
        $param['activeMenu'] = $this->activeMenu;
        if ($param['activeMenu']['akses_hapus'] == '0')
        {
            return redirect()->to('denied');
        }

        $pk = $this->request->getGet('id');
        $this->GroupsModel->where('group_id', $pk)->delete();
        return redirect()->to(backend_url() . '/groups');
    }

}
