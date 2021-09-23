<?php namespace App\Controllers\Backend\Creator;
use App\Controllers\BackendController;

class CRUDGenerator extends BackendController
{
    public $path_view = 'backend/creator/crudgenerator/';
    public $theme     = 'pages/theme-backend/render';

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $query   = $this->db->query("show tables");
        $results = $query->getResult(); 

        $param['menu']       = $this->menu;
        $param['activeMenu'] = $this->activeMenu;
        if ($param['activeMenu']['akses_lihat'] == '0')
        {
            return redirect()->to('denied');
        }
        $data['data']   = $results;
        $data['db']     = $this->db->getDatabase();
        $param['page']  = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
    }

    public function generate()
    {
        if ($this->request->isAJAX())
        {
            $table    = entitiestag($this->request->getPost('table'));
            $query    = $this->db->query("DESCRIBE $table");
            $results  = $query->getResult();        
            $response = "";
            $insert   = "";
            $update   = "";
            $delete   = "";
            $validate = "";
            $require  = "";

            foreach ($results as $row)
            {
                if(($row->Field<>'created_at')&&($row->Field<>'updated_at')&&($row->Field<>'deleted_at')&&($row->Field<>'id')):
                    $response .= "\t\$data['".$row->Field."'] = entitiestag(\$this->request->getPost('".camelize($row->Field)."'));"."\n";
                    //validation rules
                    if($row->Null=='NO')
                    {
                        $require .= "\t\t'".camelize($row->Field)."' => ["."\n";
                        $require .= "\t\t\t'rules'     => 'required',"."\n";
                        $require .= "\t\t\t'errors'    => ["."\n";
                        $require .= "\t\t\t\t'required' 		=> 'Wajib diisikan',"."\n";
                        $require .= "\t\t\t]"."\n";
                        $require .= "\t\t],"."\n";
                    }
                endif;
            }

            //validasi
            $validate.="\tif(!\$this->validate(["."\n";
            $validate.=$require."\n";
            $validate.="\t]))"."\n";
            $validate.="\t{"."\n";
            $validate.="\t\t\$validation = \Config\Services::validation();"."\n";
            $validate.="\t\treturn redirect()->back()->withInput()->with('validation',\$validation);"."\n";
            $validate.="\t}"."\n";
            

            //insert function
            $insert.="public function insert()"."\n";
            $insert.="{"."\n";
            $insert.="\t\$param['menu']       = \$this->menu;"."\n";
            $insert.="\t\$param['activeMenu']       = \$this->activeMenu;"."\n";
            $insert.="\tif(\$param['activeMenu']['akses_tambah'] == '0')"."\n";
            $insert.="\t{"."\n";
            $insert.="\t\treturn redirect()->to('denied');"."\n";
            $insert.="\t}"."\n"."\n";
            $insert.=$response."\n";
            $insert.=$validate."\n";
            $insert.="\t\$this->".pascalize($table)."Model->insert(\$data);"."\n";
            $insert.="\treturn redirect()->to(backend_url() . '/');"."\n";
            $insert.="}"."\n"."\n";
            $return['insert'] = $insert;

            //update function
            $update.="public function update()"."\n";
            $update.="{"."\n";
            $update.="\t\$param['menu']       = \$this->menu;"."\n";
            $update.="\t\$param['activeMenu']       = \$this->activeMenu;"."\n";
            $update.="\tif(\$param['activeMenu']['akses_ubah'] == '0')"."\n";
            $update.="\t{"."\n";
            $update.="\t\treturn redirect()->to('denied');"."\n";
            $update.="\t}"."\n"."\n";
            $update.=$response."\n";
            $update.=$validate."\n";
            $update.="\t\$id =  entitiestag(\$this->request->getPost('id'));"."\n";
            $update.="\t\$this->".pascalize($table)."Model->update(\$id,\$data);"."\n";
            $update.="\treturn redirect()->to(backend_url() . '/');"."\n";
            $update.="}"."\n"."\n";
            $return['update'] = $update;

            //delete function
            $delete.="public function delete()"."\n";
            $delete.="{"."\n";
            $delete.="\t\$param['menu']       = \$this->menu;"."\n";
            $delete.="\t\$param['activeMenu']       = \$this->activeMenu;"."\n";
            $delete.="\tif(\$param['activeMenu']['akses_hapus'] == '0')"."\n";
            $delete.="\t{"."\n";
            $delete.="\t\treturn redirect()->to('denied');"."\n";
            $delete.="\t}"."\n"."\n";
            $delete.="\t\$id =  entitiestag(\$this->request->getGet('id'));"."\n";
            $delete.="\t\$this->".pascalize($table)."Model->delete(\$id);"."\n";
            $delete.="\treturn redirect()->to(backend_url() . '/');"."\n";
            $delete.="}"."\n"."\n";
            $return['delete'] = $delete;

            echo json_encode($return);
        }
        else
        {
            echo "Access Denied";
        }
    }
}