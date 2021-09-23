<table class="table table-striped table-hover table-bordered" style="width: 100%">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>Deskripsi</th>
			<th>Ikon</th>
			<th>Link</th>
			<th>Aktif</th>
			<th>Urut</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($MenuModel as $row): ?>
			<?php if(($row['hirarki']==1)&&($row['sub']==0)):?>

			<tr>
				<td><?=$no++;?></td>
				<td style="padding-left: <?=$row['hirarki']*15;?>px"><b><?=entitiestag($row['menu_nama']);?></b></td>
				<td><?=$row['deskripsi'];?></td>
				<td><?=$row['ikon'];?></td>
				<td><?=$row['link'];?></td>
				<td data-toggle="tooltip" title="klik untuk mengubah statusnya"><?=yatidak($row['aktif']);?></td>
				<td>
					<div class="btn-group" role="group">
						<button class="btn btn-sm btn-outline-secondary" onclick="sorting('<?=$row['menu_id'];?>','<?=($row['urutan']-1);?>')"><i class="fas fa-chevron-up"></i></button>
						<button class="btn btn-sm btn-outline-secondary" onclick="sorting('<?=$row['menu_id'];?>','<?=($row['urutan']+1);?>')"><i class="fas fa-chevron-down"></i></button>
					</div>
				</td>
				<td>
					<div class="btn-group" role="group">
						<a data-toggle="tooltip" title="klik untuk mengubah" 
                                                   href="<?= backend_url();?>/menu/edit?menu_id=<?=$row['menu_id'];?>" 
		                    class="btn btn-outline-secondary btn-sm"><i class="fas fa-edit"></i></a>

						<a data-toggle="tooltip" title="klik untuk menghapus"
							href="<?=backend_url();?>/menu/delete?menu_id=<?=$row['menu_id'];?>" 
							onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ??');" 
		                    class="btn btn-outline-secondary btn-sm"><i class="fas fa-trash"></i></a>       
		            </div>
				</td>
			</tr>
			<?php elseif(($row['hirarki']==1)&&($row['sub']==1)): ?>
			<tr>
				<td><?=$no++;?></td>
				<td style="padding-left: <?=$row['hirarki']*15;?>px"><b><?=entitiestag($row['menu_nama']);?></b></td>
				<td><?=$row['deskripsi'];?></td>
				<td><?=$row['ikon'];?></td>
				<td><?=$row['link'];?></td>
				<td data-toggle="tooltip" title="klik untuk mengubah statusnya"><?=yatidak($row['aktif']);?></td>
				<td>
					<div class="btn-group" role="group">
						<button class="btn btn-sm btn-outline-secondary" onclick="sorting('<?=$row['menu_id'];?>','<?=($row['urutan']-1);?>')">
							<i class="fas fa-chevron-up"></i>
						</button>
						<button class="btn btn-sm btn-outline-secondary" onclick="sorting('<?=$row['menu_id'];?>','<?=($row['urutan']+1);?>')">
							<i class="fas fa-chevron-down"></i>
						</button>
					</div>
				</td>
				<td>
					<div class="btn-group" role="group">
						<a data-toggle="tooltip" title="klik untuk mengubah" 
							href="<?=backend_url();?>/menu/edit?menu_id=<?=$row['menu_id'];?>" 
		                    class="btn btn-outline-secondary btn-sm"><i class="fas fa-edit"></i></a>

						<a data-toggle="tooltip" title="klik untuk menghapus"
							href="<?=backend_url();?>/menu/delete?menu_id=<?=$row['menu_id'];?>" 
							onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ??');" 
		                    class="btn btn-outline-secondary btn-sm"><i class="fas fa-trash"></i></a>       
		            </div>
				</td>
			</tr>
				<?php foreach($MenuModel as $row_child):?>
					<?php if(($row_child['hirarki']==2)&&($row_child['induk_id']==$row['menu_id'])):?>
						<tr>
							<td><?=$no++;?></td>
							<td style="padding-left: <?=$row_child['hirarki']*15;?>px"><b><?=$row_child['menu_nama'];?></b></td>
							<td><?=$row_child['deskripsi'];?></td>
							<td><?=$row_child['ikon'];?></td>
							<td><?=$row_child['link'];?></td>
							<td data-toggle="tooltip" title="klik untuk mengubah statusnya"><?=yatidak($row_child['aktif']);?></td>
							<td>
								<div class="btn-group" role="group">
									<button class="btn btn-sm btn-outline-secondary" onclick="sorting('<?=$row_child['menu_id'];?>','<?=($row_child['urutan']-1);?>')">
										<i class="fas fa-chevron-up"></i>
									</button>
									<button class="btn btn-sm btn-outline-secondary" onclick="sorting('<?=$row_child['menu_id'];?>','<?=($row_child['urutan']+1);?>')">
										<i class="fas fa-chevron-down"></i>
									</button>
								</div>
							</td>
							<td>
								<div class="btn-group" role="group">
									<a data-toggle="tooltip" title="klik untuk mengubah" 
										href="<?=backend_url();?>/menu/edit?menu_id=<?=$row_child['menu_id'];?>" 
					                    class="btn btn-outline-secondary btn-sm"><i class="fas fa-edit"></i></a>

									<a data-toggle="tooltip" title="klik untuk menghapus"
										href="<?=backend_url();?>/menu/delete?menu_id=<?=$row_child['menu_id'];?>" 
										onclick="return confirm('Apakah Anda yakin ingin menghapus data ini ??');" 
					                    class="btn btn-outline-secondary btn-sm"><i class="fas fa-trash"></i></a>       
					            </div>
							</td>
						</tr>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endif;?>
		<?php endforeach; ?>
	</tbody>
</table>