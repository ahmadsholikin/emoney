<div class='card'>
    <div class='card-header bg-transparent'>
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <p class="tx-12 tx-color-03">Pembaharuan data nominatif penerima TPP sudah otomatis terintegrasi dari data kepegawaian</p>
            </div>
            <div class="col-sm-12 col-md-7 mg-t-15 mg-sm-t-0 pt-1">
                <div class="d-flex">
                    <select class="custom-select custom-select-sm tx-12 mr-2" id="unit_kerja">
                        <option selected="-" disabled>Pilihan Unit Kerja</option>
                        <option value="123">Badan Kepegawaian Pendidikan dan Pelatihan Daerah</option>
                    </select>
                    <select class="custom-select custom-select-sm tx-12" id="unit_kerja">
                        <option selected="">Pilihan Periode Pengajuan</option>
                        <option value="<?=date('Y');?>-01-01">Januari <?=date('Y');?></option>
                        <option value="<?=date('Y');?>-02-01">Februari <?=date('Y');?></option>
                        <option value="<?=date('Y');?>-03-01">Maret <?=date('Y');?></option>
                        <option value="<?=date('Y');?>-04-01">April <?=date('Y');?></option>
                        <option value="<?=date('Y');?>-05-01">Mei <?=date('Y');?></option>
                        <option value="<?=date('Y');?>-06-01">Juni <?=date('Y');?></option>
                        <option value="<?=date('Y');?>-07-01">Juli <?=date('Y');?></option>
                        <option value="<?=date('Y');?>-08-01">Agustus <?=date('Y');?></option>
                        <option value="<?=date('Y');?>-09-01">September <?=date('Y');?></option>
                        <option value="<?=date('Y');?>-10-01">Oktober <?=date('Y');?></option>
                        <option value="<?=date('Y');?>-11-01">November <?=date('Y');?></option>
                        <option value="<?=date('Y');?>-12-01">Desember <?=date('Y');?></option>
                    </select>
                    <button class="btn btn-secondary btn-xs btn-icon pd-y-0 mg-l-5 flex-shrink-0" id="btnPreviewPenerimaTPP">
                        <i data-feather="search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class='card-body'>
        <div class="table-responsive">
            <div id="target"></div>
        </div>
    </div>
</div>
<script>
    $( "#btnPreviewPenerimaTPP" ).click(function() {
        var unit_kerja  = $("#unit_kerja").val();
        var periode     = $("#periode").val();

        $.ajax(
        {
            "url" : "<?=backend_url();?>/nominatif-penerima/get-list",
            "type" : "POST",
            "data" : { 
                "csrf_app"      : $("input[name='csrf_app']").val(),
                "unit_kerja"    : unit_kerja,
                "periode"       : periode,
            },
            success: function(data, textStatus, xhr)
            {
                $("#target").html(data);
            },
            error: function(textStatus,xhr)
            {
                
            }
        });
    });
</script>