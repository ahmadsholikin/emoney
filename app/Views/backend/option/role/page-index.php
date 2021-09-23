<div class="card">
	<div class="card-header bg-transparent">
		<div class="form-row mb-0">
			<div class="col form-group mb-0">
				<label for="">Pilihan Grup yang akan di set hak aksesnya : </label>
				<select class="form-control form-control-sm" id="group_id" name="group_id" onchange="preview()">
					<option value="*" selected disabled>-- Pilihan Group --</option>
					<?php foreach ($GroupsModel as $ag): ?>
						<option value="<?=$ag['group_id'];?>"><?=$ag['group_nama'];?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div id="data-role" class="table-responsive-sm"></div>
	</div>
</div>
<?= csrf_field();?>
<script type="text/javascript">
	function preview()
	{
		if($("select[name='group_id']").val() != '*')
		{
			$("#data-role").html("<center><img src='<?=base_url();?>/public/assets/image/loader.gif' style='padding: 50px'></center>");

			$.ajax(
			{
			  	url 	: '<?= backend_url();?>/role/getRole',
			  	type 	: 'POST',
			  	data 	: { 
			  				"group_id"	: $("select[name='group_id']").val(), 
			  				"csrf_app"	: $("input[name='csrf_app']").val()
			  			},
			  	success: function(data, textStatus, xhr)
			  	{
			  		$("#data-role").html(data);
			  	},
			  	error: function(textStatus,xhr)
			  	{
			    	$.alerify("Uups.. Sepertinya ada kesalahan pada sistem","error");
			  	}
			}); 
		}
	}

	function cek_lihat(group_id,menu_id)
	{
		teks = $("#lihat_"+menu_id).text();

		if(teks=='Tidak')
		{
			$('#lihat_'+menu_id).html("<span class='badge badge-success badge-pill'>Ya</span>");
			setRole(group_id,menu_id,'akses_lihat',1);
		}
		else
		{
			$('#lihat_'+menu_id).html("<span class='badge badge-danger badge-pill'>Tidak</span>");
			setRole(group_id,menu_id,'akses_lihat',0);
		}
	}

	function cek_tambah(group_id,menu_id)
	{
		teks = $("#tambah_"+menu_id).text();

		if(teks=='Tidak')
		{
			$('#tambah_'+menu_id).html("<span class='badge badge-success badge-pill'>Ya</span>");
			setRole(group_id,menu_id,'akses_tambah',1);
		}
		else
		{
			$('#tambah_'+menu_id).html("<span class='badge badge-danger badge-pill'>Tidak</span>");
			setRole(group_id,menu_id,'akses_tambah',0);
		}
	}

	function cek_ubah(group_id,menu_id)
	{
		teks = $("#ubah_"+menu_id).text();

		if(teks=='Tidak')
		{
			$('#ubah_'+menu_id).html("<span class='badge badge-success badge-pill'>Ya</span>");
			setRole(group_id,menu_id,'akses_ubah',1);
		}
		else
		{
			$('#ubah_'+menu_id).html("<span class='badge badge-danger badge-pill'>Tidak</span>");
			setRole(group_id,menu_id,'akses_ubah',0);
		}
	}

	function cek_hapus(group_id,menu_id)
	{
		teks = $("#hapus_"+menu_id).text();

		if(teks=='Tidak')
		{
			$('#hapus_'+menu_id).html("<span class='badge badge-success badge-pill'>Ya</span>");
			setRole(group_id,menu_id,'akses_hapus',1);
		}
		else
		{
			$('#hapus_'+menu_id).html("<span class='badge badge-danger badge-pill'>Tidak</span>");
			setRole(group_id,menu_id,'akses_hapus',0);
		}
	}


	function setRole(group_id,menu_id,akses,value)
	{
		$.ajax(
		{
		  	url 	: '<?= backend_url();?>/role/setRole',
		  	type 	: 'POST',
		  	data 	: { 
		  				"group_id"	: group_id,
		  				"menu_id"	: menu_id, 
		  				"akses"		: akses,
		  				"value"		: value,
		  				"csrf_app"	: $("input[name='csrf_app']").val()
		  			},
		  	success: function(data, textStatus, xhr)
		  	{
				console.log(data);
				$.toast({
							heading : 'Proses sukses', 
							text: 'Horayy.. Data berhasil diperbaharui ;)', 
							icon:'info',
							position: 'bottom-right',
							bgColor: '#444444',
							textColor: 'white'
						});
		  	},
		  	error: function(textStatus,xhr)
		  	{
		    	$.toast({
							heading:'Uuppss Eror', 
							text:"Proses pembaharuan data tidak berhasil, ada kesalahan dalam proses penyimpanan pada sistem ini :(", 
							icon:'error',
							position: 'bottom-right',
							bgColor: '#444444',
    						textColor: 'white'
						});
		  	}
		});
	}
</script>
