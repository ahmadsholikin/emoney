<div class="card">
    <div class="card-header">
        Form Edit Data Akun Pengguna
    </div>
    <div class="card-body">
        <form method="POST" action="<?= backend_url(); ?>/users/update" data-toggle="validator" role="form">
        <?= csrf_field(); ?>
            <div class="form-row">
                <div class="col form-group">
                    <label>Email</label>
                    <input class="form-control form-control-sm" 
                            name="email" 
                            type="email" 
                            readonly
                            value="<?=$row->email;?>"
                            >
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="form-row">
                <div class="col form-group">
                    <label>Username</label>
                    <input class="form-control form-control-sm" 
                        name="username" 
                        type="text" 
                        value="<?= $row->username; ?>"
                        >
                    <div class="help-block with-errors"></div>
                </div>
            </div>

            <div class="form-row">
                <div class="col form-group">
                    <label>Grup Pengguna</label>
                    <select class="form-control form-control-sm" name="group_id">
                        <?php foreach($app_group as $group)  : ?>
                            <option value="<?=$group['group_id'];?>" <?php if($row->group_id==$group['group_id']){ echo "selected"; } ?> ><?=$group['group_nama'];?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="col form-group">
                    <label>Kata Sandi</label>
                    <input class="form-control form-control-sm" name="password" type="password">
                    <div class="help-block with-errors"></div>
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah kata sandi user</small>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Ubah Data</button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="window.history.back();">Kembali</button>
        </form>
    </div>
</div>
