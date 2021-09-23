<?php namespace App\Controllers\Backend\Option;
use App\Controllers\BackendController;
use App\Models\Option\RoleModel;
use App\Models\Option\GroupsModel;

class Role extends BackendController
{
    public $path_view = "backend/option/role/";
	public $theme        = "pages/theme-backend/render";
	
	public function __construct()
	{
		$this->RoleModel	= new RoleModel();
		$this->GroupsModel	= new GroupsModel();
	}

	public function index()
	{
		$data['GroupsModel']	= $this->GroupsModel->get();
		$param['menu']			= $this->menu;
		$param['activeMenu']	= $this->activeMenu;

		if($param['activeMenu']['akses_lihat']=='0')
		{
			return redirect()->to('denied');	
		}

		$param['page'] = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
	}

	public function getRole()
	{
		$group_id     		 = entitiestag($this->request->getPost('group_id'));
		$param['role_group'] = $this->RoleModel->roleGroups($group_id);
		$param['group_id']   = $group_id;
		return view('backend/option/role/page-list',$param);
	}

	public function setRole()
	{
		if ($this->request->isAJAX())
        {
			$group_id	= entitiestag($this->request->getPost('group_id'));
			$menu_id	= entitiestag($this->request->getPost('menu_id'));
			$akses		= entitiestag($this->request->getPost('akses'));
			$value		= entitiestag($this->request->getPost('value'));
			echo json_encode($this->RoleModel->setRole($group_id,$menu_id,$akses,$value));
		} 
        else
        {
            echo "No access permits";
        }
	}


}