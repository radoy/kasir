<?php
$row = FALSE;
if ($dataMasakan->num_rows() > 0) {
    $row = $dataMasakan->row();
} else {
    exit;
}

echo form_open(current_url(), array('name' => 'adminForm', 'id' => 'adminForm', 'class' => 'form-horizontal')); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label">Nama Masakan</label>
        <div class="col-sm-10">
            <?php
            echo form_input(array('name' => 'nama',
                'id' => 'nama',
                'maxlength' => '45',
                'class' => 'form-control',
                'required' => 'required ',
                'value' => $row->masakanNama));
            ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Harga</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" step="1" max="500000" name="harga" value="<?php echo $row->masakanHarga; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">Tipe Masakan</label>
        <div class=" col-sm-10">
            <?php
            echo form_dropdown('tipe', $dataMasakanCombo, $row->masakanTipe, 'class="form-control"');
            ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="status" value="1" <?php echo $row->masakanStatus ? 'checked' : null; ?>> Tersedia
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="submit" class="btn btn-danger">Batal</button>
        </div>
    </div>
<?php echo form_close(); ?>