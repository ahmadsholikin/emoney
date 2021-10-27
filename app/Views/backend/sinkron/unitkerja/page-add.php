<div class='card'>
    <div class='card-header bg-transparent'>
        <a href="">Formulir Tambah Data Unit Kerja Baru</a>
    </div>
    <div class='card-body'>
        <form  method="POST" data-toggle="validator" role="form" action="<?=backend_url();?>/unit-kerja/insert">
            <div class="form-row">
                <div class="col form-group">
                    <label for="kodeSimpeg">Kode Simpeg</label>
                    <input type="text" required maxlength="30" class="form-control form-control-sm" name="kodeSimpeg" id="kodeSimpeg">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label for="nama">Nama</label>
                    <input type="text" required maxlength="255" class="form-control form-control-sm" name="nama" id="nama">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>