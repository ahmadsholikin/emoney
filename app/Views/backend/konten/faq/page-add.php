<div class="card">
    <div class="card-header bg-transparent">
        Form Pengelolaan Konten FAQ
    </div>
    <div class="card-body">
        <form method="POST" action="<?=backend_url();?>/konten-faq/insert" data-toggle="validator" role="form">
            <?= csrf_field() ?>
            <div class="form-row">
                <div class="col form-group">
                    <label>Pertanyaan</label>
                    <input class="form-control form-control-sm" 
                            name="pertanyaan" 
                            type="text" 
                            required>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label>Jawaban</label>
                    <input class="form-control form-control-sm" 
                        name="jawaban" 
                        type="text" 
                        required>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="window.history.back();">Kembali</button>
        </form>
    </div>
</div>