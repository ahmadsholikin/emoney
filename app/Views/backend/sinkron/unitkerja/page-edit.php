<div class='card'>
    <div class='card-header bg-transparent'>
        <a href="">Formulir Ubah Data Unit Kerja</a>
    </div>
    <div class='card-body'>
        <form  method="POST" data-toggle="validator" role="form" action="<?=backend_url();?>/unit-kerja/update">
            <input type="hidden" name="id" id="id" value="<?=$data['id'];?>">
            <div class="form-row">
                <div class="col form-group">
                    <label for="kodeSimpeg">Kode Simpeg</label>
                    <input type="text" required maxlength="30" class="form-control form-control-sm" name="kodeSimpeg" id="kodeSimpeg" readonly value="<?=$data['kode_simpeg'];?>">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label for="nama">Nama</label>
                    <input type="text" required maxlength="255" class="form-control form-control-sm" name="nama" id="nama" value="<?=$data['nama'];?>">
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