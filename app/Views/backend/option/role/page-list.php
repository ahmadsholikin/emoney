<table class="table table-striped table-hover table-bordered table-sm" style="width: 100%;" id="datatable">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>Deskripsi</th>
			<th>Aktif</th>
			<th>Akses Buka</th>
			<th>Akses Tambah</th>
			<th>Akses Edit</th>
			<th>Akses Hapus</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$no=1; 
			foreach ($role_group as $row): 
				if($row->hirarki==1):
		?>
				<tr>
					<td><?=$no++;?></td>
					<td style="padding-left: <?=$row->hirarki*15;?>px"><?=$row->menu_nama;?></td>
					<td><?=$row->deskripsi;?></td>
					<td><?=yatidak($row->aktif);?></td>
					<td><div id="lihat_<?=$row->menu_id;?>" onclick="cek_lihat('<?=$group_id;?>','<?=$row->menu_id;?>')"><?=yatidak($row->akses_lihat);?></div></td>
					<td><div id="tambah_<?=$row->menu_id;?>" onclick="cek_tambah('<?=$group_id;?>','<?=$row->menu_id;?>')"><?=yatidak($row->akses_tambah);?></td>
					<td><div id="ubah_<?=$row->menu_id;?>" onclick="cek_ubah('<?=$group_id;?>','<?=$row->menu_id;?>')"><?=yatidak($row->akses_ubah);?></td>
					<td><div id="hapus_<?=$row->menu_id;?>" onclick="cek_hapus('<?=$group_id;?>','<?=$row->menu_id;?>')"><?=yatidak($row->akses_hapus);?></td>
				</tr>
					<?php
						foreach ($role_group as $rows):  
							if(($rows->hirarki==2)&&($rows->induk_id==$row->menu_id)):
					?>
							<tr>
								<td><?=$no++;?></td>
								<td style="padding-left: <?=$rows->hirarki*15;?>px"><?=$rows->menu_nama;?></td>
								<td><?=$rows->deskripsi;?></td>
								<td><?=yatidak($rows->aktif);?></td>
								<td><div id="lihat_<?=$rows->menu_id;?>" onclick="cek_lihat('<?=$group_id;?>','<?=$rows->menu_id;?>')"><?=yatidak($rows->akses_lihat);?></div></td>
								<td><div id="tambah_<?=$rows->menu_id;?>" onclick="cek_tambah('<?=$group_id;?>','<?=$rows->menu_id;?>')"><?=yatidak($rows->akses_tambah);?></td>
								<td><div id="ubah_<?=$rows->menu_id;?>" onclick="cek_ubah('<?=$group_id;?>','<?=$rows->menu_id;?>')"><?=yatidak($rows->akses_ubah);?></td>
								<td><div id="hapus_<?=$rows->menu_id;?>" onclick="cek_hapus('<?=$group_id;?>','<?=$rows->menu_id;?>')"><?=yatidak($rows->akses_hapus);?></td>
							</tr>	
		<?php 
							endif;
						endforeach;
					endif; 
			endforeach 
		?>
	</tbody>
</table>