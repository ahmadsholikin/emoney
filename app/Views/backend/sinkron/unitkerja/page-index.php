<div class='card'>
    <div class='card-header bg-transparent'>
        <a href="">Sinkron Data Unit Kerja</a>
    </div>
    <div class='card-body'>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-sm" style="width: 100%" id="datatable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th>Kode Simpeg</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                <thead>
                <tbody>
                    <?php $no=1; foreach($data as $row):?>
                    <tr>
                        <td><?=$no++;?></td>
                        <td><?=$row["id"];?></td>
                        <td><?=$row["kode_simpeg"];?></td>
                        <td><?=$row["nama"];?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <?=btn_edit("./edit?id=".$row["id"]);?>
                                <?=btn_delete("./delete?id=".$row["id"]);?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>