<div class="card">
	<div class="card-header bg-transparent">
		<a class="" href="<?=backend_url();?>/menu/add" role="button" data-toggle="tooltip" title="klik untuk menambah data baru" ><i class="mdi mdi-plus-circle"></i> Data Baru</a>
	</div>
	<div class="card-body">
		<div id="menu-data" class="table-responsive-sm"></div>
		<?= csrf_field() ?>
		<script>

			$(function(){
				$("#menu-data").html("<center><img src='<?=base_url();?>/public/assets/image/loader.gif' style='padding: 50px'></center>");
				get_list_menu();
			});

			function get_list_menu()
			{
				$("#menu-data").load("<?= backend_url();?>/menu/get_list_menu");
			}

			function sorting(menu_id,urutan)
			{
				$("#menu-data").html("<center><img src='<?=base_url();?>/public/assets/image/loader.gif' style='padding: 50px;' ></center>");
				$.ajax(
				{
					url 	: '<?=backend_url();?>/menu/sorting',
					type 	: 'POST',
					data 	: { 
								"menu_id"	: menu_id,
								"urutan"	: urutan,
								"csrf_app"	: $("input[name='csrf_app']").val()
							},
					success: function(data, textStatus, xhr)
					{
						if(data==1)
						{
							console.log("Hoorayy.. berhasil memperbaharui data");
							//$.notify("Horrayy.. Pengurutan berhasil diatur ulang","success");
							get_list_menu();
						}
						else
						{
							console.log("Uups.. Tidak berhasil memperbaharui data");
							//$.notify("Uups.. Ada kesalahan dalam pengurutan menu :(","error");
							get_list_menu();	
						}
					},
					error: function(textStatus,xhr)
					{
						console.log("Uups.. Sepertinya ada kesalahan pada sistem");
						//$.notify("Uups.. Sepertinya ada kesalahan pada sistem","error");
					}
				});
			}
		</script>
	</div>
</div>

