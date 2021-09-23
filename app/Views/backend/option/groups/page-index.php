<div class="card">
	<div class="card-header bg-transparent">
		<a class="" href="<?=backend_url();?>/groups/add" role="button" data-toggle="tooltip" title="klik untuk menambah data baru" ><i class="mdi mdi-plus-circle"></i> Data Baru</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered table-sm" style="width: 100%" id="datatable">
				<thead>
					<tr>
						<th>ID group</th>
						<th>Nama group</th>
						<th>Deskripsi</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $row): ?>
					<tr>
						<td><?=$row['group_id'];?></td>
						<td><?=$row['group_nama'];?></td>
						<td><?=$row['deskripsi'];?></td>
						<td>
							<div class="btn-group" role="group">
								<?=btn_edit('./groups/edit?id='.$row['group_id']);?>
								<?php if($row['group_id']<>'1'){ ?>
								<?=btn_delete('./groups/delete?id='.$row['group_id']);?>
								<?php } ?>
							</div>
						</td>
					</tr>	
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
