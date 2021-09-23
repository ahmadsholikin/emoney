<div class="card">
    <div class="card-header bg-transparent">
        Form Pengelolaan Konten Berita Pengumuman
    </div>
    <div class="card-body">
        <form method="POST" action="<?=backend_url();?>/konten-berita/update" data-toggle="validator" role="form" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="id" value="<?= $row[0]['id']; ?>">
            <div class="form-row">
                <div class="col form-group">
                    <label>Judul</label>
                    <input class="form-control form-control-sm" 
                            name="judul" 
                            type="text" 
                            value="<?= $row[0]['judul']; ?>"
                            required>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Isi Berita Pengumuman</label>
                    <textarea class="form-control form-control-sm summernote" 
                        name="isi" 
                        required><?= $row[0]['isi']; ?></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Cover</label>
                    <input class="form-control form-control-sm dropify" 
                            data-default-file="<?= base_file($row[0]['cover'], NULL)->url; ?>"
                            name="cover" 
                            type="file" >
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="window.history.back();">Kembali</button>
        </form>
    </div>
</div>