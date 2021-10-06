<div class='card'>
    <div class='card-header bg-transparent'>
        Nominatif Penggajian
    </div>
    <div class='card-body'>
        <form action="" class="form-inline">
            <div class="input-group">
                <div class="form-group">
                    <label for="">Pilihan Nomatif Satuan Kerja</label>
                    <select type="text" name="skpd" id="skpd" class="form-control form-control-sm mx-sm-3" aria-describedby="button-addon2">
                        <option value="-" disabled selected>-- Pilihan SKPD --</option>
                        <?php foreach($data as $row):?>
                            <option value="<?=$row->KDSKPD;?>"><?=$row->NMSKPD;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Periode Bulan Gaji</label>
                    <input type="text" name="periode_pengajuan" id="periode_pengajuan" value="<?=date('01 M Y');?>" class="form-control form-control-sm tanggal mx-sm-3">
                </div>
                <div class="form-group">
                    <label for="">Pilihan Bulan Gaji Pembanding</label>
                    <input type="text" name="periode_gajian" id="periode_gajian" value="<?=date('M Y',strtotime("-1 months"));?>" class="form-control form-control-sm tanggal bulan mx-sm-3">
                </div>
                <div class="form-group">
                    <div class="input-group-append">
                        <button class="btn btn-primary btn-sm" onclick="get_list()" type="button" id="button-addon2">Tampilkan</button>
                    </div>
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
                "csrf_app"          : $("input[name='csrf_app']").val(),
                "skpd"              : $("#skpd").val(),
                "periode_pengajuan" : $("#periode_pengajuan").val(),
                "periode_gajian"    : $("#periode_gajian").val(),
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