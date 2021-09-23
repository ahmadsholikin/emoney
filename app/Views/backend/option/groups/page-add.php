<div class="card">
    <div class="card-header">
        Form Entri Grup Hak Akses
    </div>
    <div class="card-body">
        <form method="POST" action="<?=backend_url();?>/groups/insert" data-toggle="validator" role="form">
            <?= csrf_field() ?>
            <div class="form-row">
                <div class="col form-group">
                    <label>Nama group</label>
                    <input class="form-control form-control-sm" 
                            name="group_nama" 
                            id="group_nama" 
                            type="text"
                            required
                            pattern="^[A-z0-9\s/@]{1,}$"
                            data-error="Maaf, entrian hanya berupa huruf dan angka | Wajib diisikan"
                            >
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Deskripsi</label>
                    <input class="form-control form-control-sm" name="deskripsi" type="text">
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="window.history.back();">Kembali</button>
        </form>
    </div>
</div>
