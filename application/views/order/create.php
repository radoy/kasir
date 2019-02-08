<?php
?>

<div>
    <div class="row">
        <?php echo form_open(current_url(), array('name' => 'adminForm', 'class' => 'form-horizontal')); ?>
        <div class="col-sm-5">
            <div class="form-group">
                <label class="control-label col-sm-5">Tanggal Order</label>
                <div class="col-sm-6">
                    <?php
                    echo form_input(array('name' => 'tanggal',
                        'class' => 'form-control'), date('Y-m-d'), 'readonly="readonly"');
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-5">Pelanggan</label>
                <div class="col-sm-6">
                    <?php
                    echo form_dropdown('user', $dataUserCombo, '', 'class="form-control"');
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-5">No Meja</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="meja" required="required">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-5">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
