<div class="card">
    <div class="card-header">
        Form Edit Data Grup
    </div>
    <div class="card-body">
        <form method="POST" action="<?= backend_url('/groups/update');?>"  data-toggle="validator" role="form">
            <?= csrf_field() ?>
            <div class="form-row">
                <div class="col form-group">
                    <label>ID group</label>
                    <input class="form-control form-control-sm" 
                            name="group_id" 
                            id="group_id" 
                            type="text"
                            readonly 
                            value="<?=$row['group_id'];?>" 
                            required>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Nama group</label>
                    <input class="form-control form-control-sm" 
                            name="group_nama" 
                            id="group_nama" 
                            type="text"
                            required
                            value="<?=$row['group_nama'];?>" >
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Deskripsi</label>
                    <input class="form-control form-control-sm" name="deskripsi" type="text" value="<?=$row['deskripsi'];?>" >
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="window.history.back();">Kembali</button>
        </form>
    </div>
</div>
