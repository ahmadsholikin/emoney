<div class='card'>
    <div class='card-header bg-transparent'>
    <a class="" href="<?=backend_url();?>/nominal-kelas-jabatan/add" role="button" data-toggle="tooltip" title="klik untuk menambah data baru" ><i class="mdi mdi-plus-circle"></i> Data Baru</a>
    </div>
    <div class='card-body'>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-sm" style="width: 100%" id="datatable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Induk</th>
                        <th>Kelas</th>
                        <th>Keterangan</th>
                        <th>Nominal</th>
                        <th>Tahun Berlaku</th>
                        <th>Aksi</th>
                    </tr>
                <thead>
                <tbody>
                    <?php $no=1; foreach($data as $row):?>
                    <tr>
                        <td><?=$no++;?></td>
                        <td><?=$row["induk_kelas"];?></td>
                        <td><?=$row["kelas"];?></td>
                        <td><?=$row["keterangan"];?></td>
                        <td class="text-right">Rp. <?=rp($row["nominal"]);?>,-</td>
                        <td><?=$row["tahun_berlaku"];?></td>
                        <td>
                            <div class="btn-group">
                                <?=btn_edit("./nominal-kelas-jabatan/edit?id=".$row["id"]);?>
                                <?=btn_delete("./nominal-kelas-jabatan/delete?id=".$row["id"]);?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>