<table class="table table-striped table-hover table-bordered table-sm" style="width: 100%" id="datatable">
    <thead>
        <tr>
            <th>No.</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Kelas Jabatan</th>
            <th>Nominal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($data as $row): ?>
        <tr>
            <td class="tr_no"><?=$no;?></td>
            <td class="tr_nip"><?=$row['NIP'];?></td>
            <td class="tr_nama"><?=$row['NAMA'];?></td>
            <td class="tr_jabatan"><?=$row['JABATAN'];?></td>
            <td ><span id="tr_jc_<?=$no;?>"><?=$row['KELAS'];?></span></td>
            <td ><span id="tr_nominal_<?=$no;?>"><?=($row['PENERIMAAN']<>'')?'Rp. '.rp($row['PENERIMAAN']).',-':'';?></span></td>
            <td>
                <button class="btn btn-outline-danger btn-sm btnSet" data-toggle="modal" data-target="#exampleModalCenter"><i class="mdi mdi-cogs"></i></button>
            </td>
        </tr>
        <?php $no++; endforeach; ?>
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Pengaturan Kelas Jabatan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="row_index">
            <div class="form-row">
                <div class="col form-group">
                    <label for="kodeSimpeg">NIP</label>
                    <input type="text" required maxlength="20" readonly class="form-control form-control-sm" name="nip" id="nip">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label for="nama">Nama</label>
                    <input type="text" required maxlength="255" readonly class="form-control form-control-sm" name="nama" id="nama">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label for="nama">Jabatan</label>
                    <input type="text" required maxlength="255" readonly class="form-control form-control-sm" name="jabatan" id="jabatan">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label for="nama">Jenis Penerimaan</label>
                    <select class="form-control form-control-sm" name="jenis" id="jenis">
                        <option value="primer" >Primer</option>
                        <option value="sekunder" title="Diberikan untuk yang bertugas ganda (PLT)">Sekunder</option>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label for="nama">Pilihan Kelas Jabatan dan Nominal Penerimaan</label>
                    <select class="form-control form-control-sm" name="kelas" id="kelas" onchange="getNominalFix()">
                        <option value="0" selected disabled>-- Pilihan --</option>
                        <?php foreach($kelas as $r_kelas) : ?>
                            <option value="<?=$r_kelas['id'];?>" data-kelas="<?=$r_kelas['kelas'];?>" data-nominal="<?=$r_kelas['nominal'];?>"  title="<?=$r_kelas['keterangan'];?>"><?=$r_kelas['kelas'];?> - Rp. <?=rp($r_kelas['nominal']);?>,- </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label for="nama">Prosentase Penerimaan</label>
                    <input type="number" required  class="form-control form-control-sm" name="prosentase" id="prosentase" value="100" min='0' max="100" onkeyup="getNominalFix()">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label for="nama">Jumlah Nominal Penerimaan</label>
                    <input type="text" required class="form-control form-control-sm" name="penerimaan" id="penerimaan">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary" id="btnSubmit" data-dismiss="modal">Simpan</button>
        </div>
        </div>
    </div>
</div>  


<script>
    $(document).on('keyup', 'input[name=prosentase]', function() {
        var _this = $(this);
        var min = parseInt(_this.attr('min')) || 0; // if min attribute is not defined, 1 is default
        var max = parseInt(_this.attr('max')) || 100; // if max attribute is not defined, 100 is default
        var val = parseInt(_this.val()) || (min - 1); // if input char is not a number the value will be (min - 1) so first condition will be true
        if (val < min)
            _this.val(min);
        if (val > max)
            _this.val(max);
    });

    $(".btnSet").click(function() {
        var nip     = $(this).closest("tr").find(".tr_nip").text();
        var nama    = $(this).closest("tr").find(".tr_nama").text();
        var jabatan = $(this).closest("tr").find(".tr_jabatan").text();
        var no      = $(this).closest("tr").find(".tr_no").text();

        $("#nip").val(nip);
        $("#nama").val(nama);
        $("#jabatan").val(jabatan);
        $("#row_index").val(no);
    });

    function getNominalFix()
    {
        var nominal     = $("#kelas").find(':selected').data('nominal');
        var prosentase  = $("#prosentase").val();
        var penerimaan  = parseFloat(prosentase/100)*parseInt(nominal);
        $("#penerimaan").val(separator(penerimaan));
    }

    function separator(x)
    {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    $("#btnSubmit").click(function() {
        var nip        = $("#nip").val();
        var kelas      = $("#kelas").find(':selected').data('kelas');
        var nominal    = $("#kelas").find(':selected').data('nominal');
        var prosentase = $("#prosentase").val();
        var penerimaan = $("#penerimaan").val();
        var jenis      = $("#jenis").val();
        var row_index  = $("#row_index").val();

        $.ajax(
        {
            "url" : "<?=backend_url();?>/nominatif-penerima/insert",
            "type" : "POST",
            "data" : { 
                "csrf_app"  : $("input[name = 'csrf_app']").val(),
                "nip"       : nip,
                "kelas"     : kelas,
                "nominal"   : nominal,
                "prosentase": prosentase,
                "penerimaan": penerimaan,
                "jenis"     : jenis,
            },
            success: function(data, textStatus, xhr)
            {
                if(data=='true')
                {
                    $("#tr_jc_"+row_index).html(kelas);
                    $("#tr_nominal_"+row_index).html(penerimaan);
                }
                else
                {
                    alert("Proses transaksi simpan tidak berhasil");
                }
            },
            error: function(textStatus,xhr)
            {
                
            }
        });
    });
</script>