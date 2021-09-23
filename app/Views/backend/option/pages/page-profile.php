<div class="card">
    <div class="card-header bg-transparent">
        Pengaturan Informasi Akun
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <p>Formulir pengaturan informasi website.</p>
                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
                        <strong>Informasi</strong>
                        <br><br>
                        <?php echo session()->getFlashdata('error'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </hr />
                <?php endif; ?>
                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                        <strong>Update Berhasil. Silakan melakukan login ulang untuk perubahan datanya</strong>
                        <br><br>
                        <?php echo session()->getFlashdata('success'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </hr />
                <?php endif; ?>
                <form action="<?=backend_url();?>/profile/update" data-toggle="validator" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col form-group">
                            <label for="username">Nama Pengguna</label>
                            <input type="text" required class="form-control form-control-sm" name="username" id="username" value="<?=$data->username;?>">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label for="email">Email</label>
                            <input type="email" required class="form-control form-control-sm" name="email" id="email" value="<?=$data->email;?>">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label for="kontak">Kontak</label>
                            <input type="text" class="form-control form-control-sm" name="kontak" id="kontak" value="<?=$data->kontak;?>">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="dropify form-control form-control-sm" name="foto" id="foto" data-default-file="<?=base_url();?>/writable/uploads/<?=$data->foto;?>">
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
    </div>
</div>