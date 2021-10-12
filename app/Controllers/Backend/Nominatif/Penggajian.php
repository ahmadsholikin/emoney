<?php namespace App\Controllers\Backend\Nominatif;
use App\Controllers\BackendController;
use App\Models\Nominatif\PengajuanGajiModel;

class Penggajian extends BackendController
{
    public $path_view = 'backend/nominatif/penggajian/';
    public $theme     = 'pages/theme-backend/render';

    public function __construct()
    {
        $this->taspen = db_connect("taspen");
        $this->PengajuanGajiModel =  new PengajuanGajiModel();
    }

    public function index()
    {
        $param['menu']       = $this->menu;
        $param['activeMenu'] = $this->activeMenu;
        if ($param['activeMenu']['akses_lihat'] == '0')
        {
            return redirect()->to('denied');
        }
        $data['data']   = $this->taspen->query("SELECT KDSKPD,NMSKPD FROM skpd_tbl")->getResult();
        $param['page']  = view($this->path_view . 'page-index',$data);
        return view($this->theme, $param);
    }

    public function getList()
    {
        if ($this->request->isAJAX())
        {
            $skpd               = entitiestag($this->request->getPost('skpd')); 
            $periode_gajian     = tanggal_Ymd(entitiestag('01 '.$this->request->getPost('periode_gajian')));
            $periode_pengajuan  = tanggal_Ymd(entitiestag($this->request->getPost('periode_pengajuan')));
            $db                 = $this->taspen->query("SELECT 
                                                    MP.NIP,
                                                    MP.NAMA,
                                                    MP.KDESELON,
                                                    MP.KDFUNGSI,
                                                    MP.KDPANGKAT,
                                                    MP.TJFUNGSI,
                                                    MP.TJESELON,
                                                    MP.GAPOK,
                                                    COALESCE(HJ.JISTRI,MP.JISTRI) as JISTRI,
                                                    COALESCE(HJ.JANAK,MP.JANAK) as JANAK
                                                FROM mstpegawai MP
                                                LEFT JOIN 
                                                    (SELECT TMTGAJI,NIP,JANAK,JISTRI 
                                                        FROM historis_jiwa 
                                                        ORDER BY TMTGAJI DESC ) as HJ
                                                ON MP.NIP = HJ.NIP
                                                WHERE MP.KDSKPD='".$skpd."' 
                                                    AND MP.KDSTAPEG IN ('3','4','12') AND (MP.TMTSTOP>='".$periode_pengajuan."' OR MP.TMTSTOP IS NULL) 
                                                GROUP BY MP.NIP ORDER BY HJ.TMTGAJI,GAPOK DESC")->getResultArray();
            
            $gaji       = $this->taspen->query("SELECT * 
                                                    FROM fgaji 
                                                    WHERE TGLGAJI='".$periode_gajian."'")->getResultArray();
            $dummy      = array();

            $blank['NIP']       = "";
            $blank['NAMA']      = "";
            $blank['KDESELON']  = "";
            $blank['KDFUNGSI']  = "";
            $blank['KDPANGKAT'] = "";
            $blank['TJFUNGSI']  = "";
            $blank['TJESELON']  = "";
            $blank['GAPOK']     = "";
            $blank['JISTRI']    = "";
            $blank['JANAK']     = "";
            $blank['TJISTRI']   = "";
            $blank['TJANAK']    = "";
           
            foreach($gaji as $item):
                $dummy[$item['NIP']] = $item;
            endforeach;
            
            $data = array();
            foreach ($db as $row) : 
                $dump['NIP']            = $row['NIP'];
                $dump['NAMA']           = $row['NAMA'];
                $dump['KDFUNGSI']       = $row['KDFUNGSI'];
                $dump['KDESELON']       = $row['KDESELON'];
                $dump['KDPANGKAT']      = $row['KDPANGKAT'];
                $dump['TJFUNGSI']       = $row['TJFUNGSI'];
                $dump['TJESELON']       = $row['TJESELON'];
                $dump['GAPOK']          = $row['GAPOK'];
                $dump['JISTRI']         = $row['JISTRI'];
                $dump['JANAK']          = $row['JANAK'];
                //periode pilihan
                $dump['PERIODE']        = '01 '.entitiestag($this->request->getPost('periode_gajian'));
                $dump['GAJI']           = isset($dummy[$row['NIP']])?$dummy[$row['NIP']]:$blank;
                $dump['VALID']          = 0;

                $pg = $this->PengajuanGajiModel->get([
                    'periode'   => $periode_pengajuan,
                    'nip'       => $row['NIP'],
                ]);

                if(!empty($pg))
                {
                    $dump['VALID']          = 1;
                }

                array_push($data,$dump);
            endforeach;

            $data['data']       = $data;
            $data['pengajuan']  = entitiestag($this->request->getPost('periode_pengajuan'));
            echo view($this->path_view . 'page-list', $data);
        } 
        else
        { 
            echo 'Akses Ditolak';
        }
    }

    public function setCheckList()
    {
        if ($this->request->isAJAX())
        {
            $periode    = tanggal_Ymd(entitiestag($this->request->getPost('periode')));
            $nip        = entitiestag($this->request->getPost('id'));
            $skpd       = entitiestag($this->request->getPost('skpd'));
            $status     = entitiestag($this->request->getPost('status'));

            $data['periode'] = $periode;
            $data['nip']     = $nip;
            $data['skpd']    = $skpd;
            $data['valid']   = $status;

            $pg = $this->PengajuanGajiModel->get([
                                                    'periode'   => $periode,
                                                    'nip'       => $nip,
                                                    'skpd'      => $skpd,
                                                ]);
            if(empty($pg))
            {
                $this->PengajuanGajiModel->insert($data);
            }
            else
            {
                $id = $pg[0]['id'];
                $this->PengajuanGajiModel->update($id,$data);
            }
            echo "done";
        } 
        else
        { 
            echo 'Akses Ditolak';
        }
    }

}