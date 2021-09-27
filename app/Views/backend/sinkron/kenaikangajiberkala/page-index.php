<div class='card'>
    <div class='card-header bg-transparent'>
        Sinkron Data Kenaikan Gaji Berkala
    </div>
    <div class='card-body'>
        <form action="">
            <div class="input-group">
                <input type="text" name="periode" id="periode" class="form-control form-control-sm bulan" value="<?=date('M Y');?>" placeholder="Pilih Periode Data Kenaikan Gaji Berkala" aria-label="Pilih Periode Data Kenaikan Gaji Berkala" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary btn-sm" onclick="get_list()" type="button" id="button-addon2">Tampilkan</button>
                    <button class="btn btn-outline-primary btn-sm" onclick="sinkron()" type="button" id="button-addon2">Sinkronkan</button>
                </div>
            </div>
        </form>
        <hr>
        <div class="target"></div>
        <br>
    </div>
</div>
<script>
    function get_list()
    {
        $(".target").html("<center><div class='lds-roller'><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></center>");
        $.ajax(
        {
            "url" : "<?=backend_url();?>/kenaikan-gaji-berkala/get-list",
            "type" : "POST",
            "data" : { 
                "csrf_app" : $("input[name='csrf_app']").val(),
                "periode"  : $("input[name='periode']").val(), 
            },
            success: function(data, textStatus, xhr)
            {
                if(data=="false")
                {
                    $.alert({
                        icon: 'fa fa-spinner fa-spin',
                        title: 'Uupsss',
                        content: 'Data Kenaikan Gaji Berkala pada periode yang Anda pilih tidak ditemukan',
                    });
                }
                else
                {
                    $(".target").html(data);
                }
            },
            error: function(textStatus,xhr)
            {
                console.log("Uppss... Error by sistem");
            }
        });
    }


    function sinkron()
    {
        $(".target").html("<center><div class='lds-roller'><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></center>");
        $.ajax(
        {
            "url" : "<?=backend_url();?>/kenaikan-gaji-berkala/get-sinkron",
            "type" : "POST",
            "data" : { 
                "csrf_app" : $("input[name='csrf_app']").val(),
                "periode"  : $("input[name='periode']").val(), 
            },
            success: function(data, textStatus, xhr)
            {
                if(data=="false")
                {
                    $.alert({
                        icon: 'fa fa-spinner fa-spin',
                        title: 'Uupsss',
                        content: 'Data Kenaikan Gaji Berkala pada periode yang Anda pilih tidak ditemukan',
                    });
                }
                else
                {
                    get_list();
                }
            },
            error: function(textStatus,xhr)
            {
                console.log("Uppss... Error by sistem");
            }
        });
    }
</script>