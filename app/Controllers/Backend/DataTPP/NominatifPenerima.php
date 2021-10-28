<?php namespace App\Controllers\Backend\DataTPP;
use App\Controllers\BackendController;
use App\Models\DataTpp\NominalKelasJabatanModel;
use App\Models\DataTpp\NominatifPenerimaModel;

class NominatifPenerima extends BackendController
{
    public $path_view = 'backend/datatpp/nominatifpenerima/';
    public $theme     = 'pages/theme-backend/render';

    public function __construct()
    {
        $this->sipgan = \Config\Database::connect('sipgan');
        $this->NominalKelasJabatanModel = new NominalKelasJabatanModel();
        $this->NominatifPenerimaModel   = new NominatifPenerimaModel();
    }

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
        $periode    = entitiestag($this->request->getPost('periode'));
        $unit_kerja = entitiestag($this->request->getPost('unit_kerja'));
        $data       = $this->sipgan->query("SELECT 
                                                aa.pns_nip_18 AS NIP,
                                                aa.pns_nm AS NAMA,
                                                IF(gg.skpd_jbt_fk='-',bb.skpd_jbt_st,gg.skpd_jbt_fk) as JABATAN,
                                                bb.skpd_jbt_esl_kd as ESELON_KODE,
                                                COALESCE(jc.kelas,'') as KELAS,
                                                COALESCE(jc.penerimaan,'') as PENERIMAAN
                                            FROM simpeg.db1_pns aa
                                                INNER JOIN simpeg.ts4a_skpd_jbt_st_kd bb ON aa.skpd_jbt_st_kd = bb.skpd_jbt_st_kd
                                                INNER JOIN simpeg.ts1_skpd_kd cc ON bb.skpd_kd = cc.skpd_kd
                                                INNER JOIN simpeg.ts2_skpd_b_b_kd dd ON bb.skpd_b_b_kd = dd.skpd_b_b_kd
                                                INNER JOIN simpeg.ts3_skpd_s_skl_kd ee ON bb.skpd_s_skl_kd = ee.skpd_s_skl_kd
                                                INNER JOIN simpeg.db21_fms09_jbt_skpd ff ON ff.fms_skpd_kd = bb.fms_skpd_kd
                                                INNER JOIN simpeg.t1_skpd_jbt_fk_kd1 gg ON gg.skpd_jbt_fk_kd1 = aa.skpd_jbt_fk_kd1
                                                LEFT JOIN  emoney.tpp_nominatif_penerima jc ON aa.pns_nip_18 = jc.nip AND aa.skpd_kd = jc.skpd_kd
                                            WHERE aa.skpd_kd=".$this->sipgan->escape($unit_kerja)." 
                                                AND aa.sts_kpgw_kd IN ('1','2')
                                            ORDER BY CAST(bb.skpd_jbt_esl_kd AS INT) ASC");
        if (!$data) {
            $error = $this->sipgan->error(); // Has keys 'code' and 'message'
            echo $error;
        }
        else {
            $param['kelas'] = $this->NominalKelasJabatanModel->get();
            $param['data']  = $data->getResultArray();
            echo view($this->path_view . 'page-list',$param);
        }

    }

    public function insert()
    {
        $param['menu']       = $this->menu;
        $param['activeMenu'] = $this->activeMenu;
        if($param['activeMenu']['akses_tambah'] == '0')
        {
            return redirect()->to('denied');
        }

        $data['nip']        = entitiestag($this->request->getPost('nip'));
        $data['kelas']      = entitiestag($this->request->getPost('kelas'));
        $data['nominal']    = entitiestag($this->request->getPost('nominal'));
        $data['prosentase'] = entitiestag($this->request->getPost('prosentase'));
        $data['penerimaan'] = str_replace(".","",entitiestag($this->request->getPost('penerimaan')));
        $data['jenis']      = entitiestag($this->request->getPost('jenis'));

        if(!$this->validate([
            'nip' => [
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
            'prosentase' => [
                'rules'     => 'required',
                'errors'    => [
                    'required' 		=> 'Wajib diisikan',
                ]
            ],
            'penerimaan' => [
                'rules'     => 'required',
                'errors'    => [
                    'required' 		=> 'Wajib diisikan',
                ]
            ],
            'jenis' => [
                'rules'     => 'required',
                'errors'    => [
                    'required' 		=> 'Wajib diisikan',
                ]
            ],
        ]))
        {
            echo "false";
        }

        $exist = $this->NominatifPenerimaModel->get(['nip'=>$data['nip'],'jenis'=>$data['jenis']]);

        if(empty($exist))
        {
            //insert
            $this->NominatifPenerimaModel->insert($data);
        }
        else
        {
            //update
            $id = $exist[0]['id'];
            $this->NominatifPenerimaModel->update($id,$data);
        }
        echo "true";
    }
}