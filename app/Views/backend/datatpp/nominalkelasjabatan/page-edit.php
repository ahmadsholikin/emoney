<div class='card'>
    <div class='card-header bg-transparent'>
        <a href="">Formulir Edit Data Baru Nominal Kelas Jabatan</a>
    </div>
    <div class='card-body'>
        <form  method="POST" data-toggle="validator" role="form" action="<?=backend_url();?>/nominal-kelas-jabatan/update">
            <?=csrf_field();?>
            <input type="hidden" name="id" value="<?=$data['id'];?>">
            <div class="form-row">
                <div class="col form-group">
                    <label for="kelas">Induk Kelas</label>
                    <select required class="form-control form-control-sm" name="induk_kelas" id="induk_kelas">
                        <?php for ($i=15; $i > 0; $i--) : ?>
                        <option value="<?=$i;?>">Kelas <?=$i;?></option>
                        <?php endfor;?>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" required maxlength="50" class="form-control form-control-sm" name="kelas" id="kelas" value="<?=$data['kelas'];?>">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label for="nominal">Nominal</label>
                    <input type="text" required  class="form-control form-control-sm" name="nominal" id="nominal" value="<?=$data['nominal'];?>">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label for="tahunBerlaku">Tahun Berlaku</label>
                    <input type="text" required  class="form-control form-control-sm tahun" name="tahunBerlaku" id="tahunBerlaku" value="<?=$data['tahun_berlaku'];?>">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea   class="form-control form-control-sm" name="keterangan" id="keterangan"><?=$data['keterangan'];?></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>