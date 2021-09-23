<div class="card">
	<div class="card-header bg-transparent">
		Pilih salah satu table dan klik generate
	</div>
	<div class="card-body">
        <form data-toggle="validator" role="form">
            <div class="form-row mb-3">
                <div class="col">
                    <select name="table" id="table" class="form-control">
                        <option value="-" disabled selected required>-- Pilihan Nama Tabel --</option>
                        <?php $kolom="Tables_in_".$db; foreach($data as $row):?>
                            <option value="<?=$row->$kolom;?>">table : <?=$row->$kolom;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col">
                    <button type="button" class="btn btn-sm btn-primary" onclick="generate()">Generate</button>
                    <button type="button" class="btn btn-sm btn-default copy" data-clipboard-target="#target" onclick="show()">Copy teks<span id="btn-copy" data-toggle="tooltip" data-delay='{"show":"100", "hide":"50"}' data-placement="top" title="Copied"></span></button>
                </div>
            </div>
            <div class="form-row mb-3">
                <div class="col">
                    <textarea readonly class="form-control" name="target" id="target" rows="25"></textarea>
                </div>
            </div>
        </form>
	</div>
</div>
<script>
    function generate()
    {
        var table = $("#table").val();
        $.ajax(
        {
            "url"  : "<?=backend_url();?>/table-model/generate",
            "type" : "POST",
            "data" : { 
                "csrf_app" : $("input[name='csrf_app']").val(),
                "table" : table
            },
            success: function(data, textStatus, xhr)
            {
                $("#target").html(data);
            },
            error: function(textStatus,xhr)
            {
                console.log(textStatus);
            }
        });
    }

    function show()
    {
        $('#btn-copy').tooltip('show');
    }

    $(function () {
        $(document).on('shown.bs.tooltip', function (e) {
            setTimeout(function () {
                $("#btn-copy").tooltip('hide');
            }, 500);
        });
    });
</script>
