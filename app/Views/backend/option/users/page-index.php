<span class="text-danger"><?= session('flash_message'); ?></span>
<div class="card">
	<div class="card-header bg-transparent">
		<a class="" href="<?=backend_url();?>/users/add" role="button" data-toggle="tooltip" title="klik untuk menambah data baru" ><i class="mdi mdi-plus-circle"></i> Data Baru</a>
	</div>
	<div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered table-sm" style="width: 100%" id="datatable">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aktif ?</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($app_users as $row):
                        ?>
                        <tr>
                            <td><?= $row->username; ?></td>
                            <td><?= $row->email; ?></td>
                            <td><?= $row->group_nama; ?></td>
                            <td><a href='<?= backend_url() . '/users/is_active?email=' . $row->email . '&is_active=' . $row->is_active; ?>'><?= yatidak($row->is_active); ?></a></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <?= btn_edit('./users/edit?id=' . $row->email); ?>
                                    <?= btn_delete('./users/delete?id=' . $row->email); ?>
                                </div>
                            </td>
                        </tr>   
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>