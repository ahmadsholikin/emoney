$(document).ready(function () {
	$("#datatable").DataTable({
		pageLength: 25,
	});

	var clipboard = new ClipboardJS('.copy');

	feather.replace();

	$('[data-toggle="tooltip"]').tooltip();

	$("#dt25").DataTable({
		pageLength: 25,
	});

	$(".dt10").DataTable({
		pageLength: 10,
	});

	$("#dt50").DataTable({
		pageLength: 50,
	});

	$(".autosearch").select2({
		theme: "bootstrap",
	});

	$(".dropify").dropify();

	$(".tanggal").datepicker({
		format: "dd M yyyy",
		autoclose: "true"
	});

	$(".tanggal_entri").datepicker({
		format: "dd M yyyy",
		autoclose: "true",
		endDate: new Date(),
	});

	$(".bulan").datepicker({
		format: "M yyyy",
		viewMode: "months",
		minViewMode: "months",
		autoclose: "true",
	});

	$(".tahun").datepicker({
		format: "yyyy",
		viewMode: "years",
		minViewMode: "years",
		autoclose: "true",
	});


	$('.clock').clockpicker({
		placement: 'top',
		align: 'left',
		autoclose: true,
		'default': 'now',
		donetext: 'Pilih'
	});

	$('.summernote').summernote({
        placeholder: '',
        tabsize: 2,
		height: 250,
		toolbar: [
			// [groupName, [list of button]]
			['style', ['bold', 'italic', 'underline', 'clear']],
			['font', ['strikethrough', 'superscript', 'subscript']],
			['fontsize', ['fontsize']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
			['height', ['height']]
		  ]
    });

	$(".count").each(function () {
		$(this)
			.prop("Counter", 0)
			.animate(
				{
					Counter: $(this).text(),
				},
				{
					duration: 4000,
					easing: "swing",
					step: function (now) {
						$(this).text(Math.ceil(now));
					},
				}
			);
	});



	// AOS.init();


	// setInterval(function () {
	// 	get_logs_app();
	// }, 2000);

	// get_logs_app();

	// function get_logs_app() {
	// 	$.ajax({
	// 		url: base_url + "/notifikasi/get_logs_app",
	// 		type: "POST",
	// 		data: {
	// 			csrf_app: $("input[name='csrf_app']").val(),
	// 		},
	// 		success: function (data) {
	// 			if (data >= 1) {
	// 				$("#title_notifikasi").html(
	// 					"Terdapat " + data + " notifikasi"
	// 				);
	// 				$(".logs_app_count").html(
	// 					'<span class="count-notif animate__animated animate__heartBeat animate__infinite	infinite"></span>'
	// 				);
	// 				get_logs_app_list();
	// 			} else {
	// 				$("#title_notifikasi").html("Tidak ada notifikasi");
	// 			}
	// 		},
	// 		error: function (textStatus, xhr) {
	// 			//alert("Uups.. Sepertinya ada kesalahan pada sistem #gla");
	// 		},
	// 	});
	// }

	// function get_logs_app_list() {
	// 	$.ajax({
	// 		url: base_url + "/notifikasi/get_logs_app_list",
	// 		type: "POST",
	// 		data: {
	// 			csrf_app: $("input[name='csrf_app']").val(),
	// 		},
	// 		success: function (data) {
	// 			$(".logs_app_list").html(data);
	// 		},
	// 		error: function (textStatus, xhr) {
	// 			//alert("Uups.. Sepertinya ada kesalahan pada sistem #lal");
	// 		},
	// 	});
	// }
});

function remove_read(id, link) {
	$.ajax({
		url: base_url + "/notifikasi/remove_status_read",
		type: "POST",
		data: {
			csrf_app: $("input[name='csrf_app']").val(),
			id: id,
		},
		success: function (data) {
			//get_logs_app();
			//console.log(data);
			window.location.href = link;
		},
		error: function (textStatus, xhr) {
			//alert("Uups.. Sepertinya ada kesalahan pada sistem #lal");
		},
	});
}

function konfirmasi(link) {
	var exec = false;
	$.confirm({
		title: "Konfirmasi Hapus Data",
		content: "Apakah anda yakin ingin menghapus data ini ??",
		buttons: {
			confirm: function () {
				window.location.href = link;
			},
			cancel: function () {
				$.alert("Dibatalkan!");
			},
		},
	});
	return exec;
}