<?php namespace App\Controllers\Backend\Sinkron;
use App\Controllers\BackendController;
use App\Models\Sinkron\HistKGBModel;

class KenaikanGajiBerkala extends BackendController
{
    public $path_view = 'backend/sinkron/kenaikangajiberkala/';
    public $theme     = 'pages/theme-backend/render';

    public function __construct()
    {
        $this->HistKGBModel = new HistKGBModel();
        $this->taspen       = db_connect("taspen");
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
        if ($this->request->isAJAX())
        {
            $th     = tanggal_Y(entitiestag($this->request->getPost('periode')));
            $bl     = tanggal_m(entitiestag($this->request->getPost('periode')));
            $rest   = get_api("https://sipgan.magelangkab.go.id/sipgan/api/integrasi/kgb?th=".$th."&bl=".$bl."");
            if($rest->status===true)
            {
                //$data['data'] = $rest->data;
                $data = array();
                foreach ($rest->data as $row) 
                {
                    $dump = array();
                    $dump['nip']             = $row->nip;
                    $dump['nama']            = $row->nama;
                    $dump['jabatan']         = $row->jabatan;
                    $dump['unitkerja']       = $row->unitkerja;
                    $dump['lm_gaji']         = $row->lm_gaji;
                    $dump['lm_mk']           = $row->lm_mk;
                    $dump['lm_gol']          = $row->lm_gol;
                    $dump['lm_tmt']          = $row->lm_tmt;
                    $dump['br_gaji_nominal'] = $row->br_gaji_nominal;
                    $dump['br_gaji']         = $row->br_gaji;
                    $dump['br_gol']          = $row->br_gol;
                    $dump['br_mk']           = $row->br_mk;
                    $dump['br_tmt_format']   = $row->br_tmt_format;
                    $dump['br_tmt']          = $row->br_tmt;
                    $dump['pejabat']         = $row->pejabat;
                    $dump['no_sk']           = $row->no_sk;
                    $dump['tgl_sk']          = $row->tgl_sk;
                    //cek sinkron
                    $db = $this->taspen->query("SELECT * FROM historis_gapok WHERE TMTGAJI='".$th."-".$bl."-01' AND JENIS_SK='1' AND NIP='".$row->nip."'");
                    if($db->getNumRows()>=1)
                    {
                        $dump['sinkron']         = "<span style='color:#2196f3'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-patch-check-fill' viewBox='0 0 16 16'>
                                                        <path d='M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z'></path>
                                                    </svg></span>";
                    }
                    else
                    {
                        $dump['sinkron']         = "" ;
                        //save to history local
                        $save['periode']         = $th."-".$bl."-01";
                        $save['nip']             = $row->nip;
                        $save['nama']            = $row->nama;
                        $save['jabatan']         = $row->jabatan;
                        $save['unit_kerja']      = $row->unitkerja;
                        $save['pangkat']         = $this->konversi_pangkat($row->br_gol);
                        $save['gaji']            = $row->br_gaji;
                        $save['masker']          = $row->br_mk;
                        $save['tmt']             = $row->br_tmt;
                        $save['pejabat']         = $row->pejabat;
                        $save['no_sk']           = $row->no_sk;
                        $save['tgl_sk']          = $row->tgl_sk;
                        $save['flag_update']     = 0;
                        
                        $exist   = $this->HistKGBModel->get([
                            'periode'   => $th."-".$bl."-01",
                            "nip"       =>  $row->nip
                        ]);

                        if(empty($exist))
                        {
                            $this->HistKGBModel->insert($save);
                        }
                        else
                        {
                            $this->HistKGBModel->update($exist[0]['id'],$save);
                        }
                    }
                    //store array
                    array_push($data,$dump);
                }
                $data['data'] = $data;
                echo view($this->path_view . 'page-list', $data);
            }
            else
            {
                echo "false";
            }
        }
        else 
        { 
            echo 'Akses Ditolak';
        }
    }
    

    public function getSinkron()
    {
        if ($this->request->isAJAX())
        {
            $th     = tanggal_Y(entitiestag($this->request->getPost('periode')));
            $bl     = tanggal_m(entitiestag($this->request->getPost('periode')));
            $data   = $this->HistKGBModel->get([
                                                    'periode'       => $th."-".$bl."-01",
                                                    "flag_update"   => "0"
                                                ]);
            //proses sinkron ke taspen
            foreach ($data as $row)
            {
                //proses insert data di tabel historis gapok
                $kueri_insert = "INSERT INTO historis_gapok 
                                    (`TMTGAJI`, `NIP`, `kdstapeg`, `KDPANGKAT`, `GAPOK`, `MASKER`, `PRSNGAPOK`, `TMTTABEL`, `TGLSKEP`, `NOMORSKEP`, 
                                    `PENERBITSKEP`, `tmt`, `JENIS_SK`, `KETERANGAN`, `TGLUPDATE`, `KDDATI1`, `KDDATI2`, `TMTKGB`) 
                                VALUES 
                                    ('".$row['periode']."', '".$row['nip']."', 4, '".$row['pangkat']."', ".$row['gaji'].", ".$row['masker'].", 100, '".$row['tmt']."', '".$row['tgl_sk']."', '".$row['no_sk']."',
                                     '".$row['pejabat']."', '". $row['tmt']."', 1, 'KENAIKAN GAJI BERKALA BY E-BILLING', '". date('Y-m-d H:i:s')."', '11', '16', '0000-00-00');";

                $this->taspen->query($kueri_insert);

                //proses update data di tabel mstpegawai
                $kueri_update = "UPDATE 
                                    mstpegawai peg
                                INNER JOIN
                                    historis_gapok hg
                                    ON peg.NIP = hg.NIP
                                SET
                                    peg.KDPANGKAT = hg.KDPANGKAT,
                                    peg.MKGOLT = hg.MASKER,
                                    peg.GAPOK = hg.GAPOK
                                WHERE 
                                    hg.NIP='".$row['nip']."' AND hg.TMTGAJI='".$row['periode']."'";

                $this->taspen->query($kueri_update);

                //proses update flag
                $flag['flag_update'] = 1;
                $this->HistKGBModel->update($row['id'],$flag);
            }
            echo "Done";
        }
        else 
        { 
            echo 'Akses Ditolak';
        }
    }


    public function konversi_pangkat($key)
    {
        $alpha = array('','A','B','C','D','E');
        $first  = substr($key,0,1);
        $second = substr($key,1,1);

        return $first.''.$alpha[$second];

    }
}