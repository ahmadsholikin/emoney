<div class='card'>
    <div class='card-header bg-transparent'>
        Nominatif Penggajian
    </div>
    <div class='card-body'>
        <form action="">
            <div class="input-group">
                <select type="text" name="skpd" id="skpd" class="form-control form-control-sm" aria-describedby="button-addon2">
                    <option value="-" disabled selected>-- Pilihan SKPD --</option>
                    <?php foreach($data as $row):?>
                        <option value="<?=$row->KDSKPD;?>"><?=$row->NMSKPD;?></option>
                    <?php endforeach;?>
                </select>
                <div class="input-group-append">
                    <button class="btn btn-primary btn-sm" onclick="get_list()" type="button" id="button-addon2">Tampilkan</button>
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
            "url" : "<?=backend_url();?>/penggajian/get-list",
            "type" : "POST",
            "data" : { 
                "csrf_app"  : $("input[name='csrf_app']").val(),
                "skpd"      : $("#skpd").val()
            },
            success: function(data, textStatus, xhr)
            {
                $(".target").html(data);
            },
            error: function(textStatus,xhr)
            {
                
            }
        });
    }
</script>