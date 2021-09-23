<?php namespace App\Controllers\Backend\Creator;
use App\Controllers\BackendController;

class TableGenerator extends BackendController
{
    public $path_view = 'backend/creator/tablegenerator/';
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
            helper('inflector');

            $table    = entitiestag($this->request->getPost('table'));
            $query    = $this->db->query("DESCRIBE $table");
            $results  = $query->getResult();        
            $thead    = "";
            $tbody    = "";
            $aksi     = "<td>-</td>";

            foreach ($results as $row)
            {
                if(($row->Field<>'created_at')&&($row->Field<>'updated_at')&&($row->Field<>'deleted_at')):
                    $thead .= "\t\t\t\t".'<th>'.humanize($row->Field).'</th>'."\n";
                    $tbody .= "\t\t\t\t".'<td><?=$row["'.$row->Field.'"];?></td>'."\n";
                endif;

                if(($row->Key<>'id'))
                {
                    $aksi = "\t\t\t\t"."<td>\n";
                    $aksi.= "\t\t\t\t\t".'<div class="btn-group" role="group">'."\n";
                    $aksi.= "\t\t\t\t\t\t".'<?=btn_edit("./edit?id=".$row["id"]);?>'."\n";
                    $aksi.= "\t\t\t\t\t\t".'<?=btn_delete("./delete?id=".$row["id"]);?>'."\n";
                    $aksi.= "\t\t\t\t\t".'</div>'."\n";
                    $aksi.= "\t\t\t\t"."</td>\n";
                }
            }

            echo '<div class="table-responsive">'."\n";
            echo "\t".'<table class="table table-striped table-hover table-bordered table-sm" style="width: 100%" id="datatable">'."\n";
            echo "\t\t".'<thead>'."\n";
            echo "\t\t\t".'<tr>'."\n";
            echo "\t\t\t\t"."<th>No.</th>"."\n";
            echo $thead;
            echo "\t\t\t\t"."<th>Aksi</th>"."\n";
            echo "\t\t\t".'</tr>'."\n";
            echo "\t\t".'<thead>'."\n";
            echo "\t\t".'<tbody>'."\n";
            echo "\t\t\t".'<?php $no=1; foreach($data as $row):?>'."\n";
            echo "\t\t\t".'<tr>'."\n";
            echo "\t\t\t\t".'<td><?=$no++;?></td>'."\n";
            echo $tbody;
            echo $aksi;
            echo "\t\t\t".'</tr>'."\n";
            echo "\t\t\t".'<?php endforeach;?>'."\n";
            echo "\t\t".'</tbody>'."\n";
            echo "\t".'</table>'."\n";
            echo '</div>';
        }
        else
        {
            echo "Access Denied";
        }
    }
}