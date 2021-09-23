<div class="card">
    <div class="card-header">
        Form Entri Data Akun Pengguna
    </div>
    <div class="card-body">
        <form method="POST" action="<?= backend_url(); ?>/users/insert" data-toggle="validator" role="form" >
        <?= csrf_field(); ?>
            <div class="form-row">
                <div class="col form-group">
                    <label>Username</label>
                    <input class="form-control form-control-sm" 
                        name="username" 
                        type="text" 
                        required
                        minlength="3"
                        maxlength="16"
                        >
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col form-group">
                    <label>Email</label>
                    <input class="form-control form-control-sm" name="email" type="email">
                    <div class="help-block with-errors"></div>
                </div>
            </div> 

            <div class="form-row">
                <div class="col form-group">
                    <label>Grup Pengguna</label>
                    <select class="form-control form-control-sm" name="group_id">
                        <?php foreach($app_group as $group)  : ?>
                            <option value="<?=$group['group_id'];?>"><?=$group['group_nama'];?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="col form-group">
                    <label>Password</label>
                    <input class="form-control form-control-sm" name="password"  type="text">
                    <div class="help-block with-errors"></div>
                </div> 
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="window.history.back();">Kembali</button>
        </form>
    </div>
</div>
