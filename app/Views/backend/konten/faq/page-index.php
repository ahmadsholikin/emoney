<div class="card">
	<div class="card-header bg-transparent">
		<a class="text-success" href="<?=backend_url();?>/konten-faq/add" role="button" data-toggle="tooltip" title="klik untuk menambah data baru" ><i class="mdi mdi-plus-circle"></i> Data Baru</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered table-sm" style="width: 100%" id="datatable">
				<thead>
					<tr>
						<th>No.</th>
						<th>Pertanyaan</th>
						<th>Jawaban</th>
                        <th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach ($data as $row): ?>
					<tr>
						<td><?=$no++;?></td>
						<td><?=$row['pertanyaan'];?></td>
						<td><?=$row['jawaban'];?></td>
						<td>
							<div class="btn-group" role="group">
								<?=btn_edit("./konten-faq/edit?id=".$row["id"]);?>
								<?=btn_delete("./konten-faq/delete?id=".$row["id"]);?>
							</div>
						</td>
					</tr>	
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
