<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover" id="datatb">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Gapok</th>
                <th>TJ. Psgn</th>
                <th>TJ. ANAK</th>
                <th>TJ. Fung</th>
                <th>TJ. Esl</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no=1;
                foreach ($data as $row) : 
                    $JF = '0';
                    if((trim($row->KDFUNGSI)==='00000')&&(trim($row->KDESELON)==='00'))
                    {
                        $JF='175000';
                        $e = substr($row->KDPANGKAT,0,1);
                        switch ($e)
                        {
                            case '1':
                                $JF='175000';
                                break;
                            case '2':
                                $JF='180000';
                                break;
                            case '3':
                                $JF='185000';
                                break;
                            default:

                                $JF='190000';
                            break;
                        }
                    }
                    else
                    {
                        $JF = $row->TJFUNGSI;
                    }

                    $JE = "0";
                    if((trim($row->KDESELON)<>'00'))
                    {
                        //Tunjangan struktural / eselon
                        $JE = $row->TJESELON;
                    }

                    $JPSG = 0;
                    if($row->JISTRI==1)
                    {
                        $JPSG = round($row->GAPOK*0.1);
                    }

                    $JANAK = 0;
                    if($row->JANAK<>0)
                    {
                        $JANAK = round($row->GAPOK*0.02*$row->JANAK);
                    }
            ?>
            <tr>
                <td><?=$no++;?></td>
                <td><?=$row->NIP;?></td>
                <td><?=$row->NAMA;?></td>
                <td><?=rp($row->GAPOK);?></td>
                <td><?=rp($JPSG);?></td>
                <td><?=rp($JANAK);?></td>
                <td><?=rp($JF);?></td>
                <td><?=rp($JE);?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>