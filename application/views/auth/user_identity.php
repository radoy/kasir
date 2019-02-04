<?php
$row = FALSE;
if ($data->num_rows() > 0) {
    $row = $data->row();
} else {
    exit;
}
?>

<?php echo form_open(current_url(), array('name' => 'adminForm', 'id' => 'adminForm', 'class' => 'form-horizontal')); ?>

<div class="form-group">
    <div class="form-group">
        <label for="nama" class="col-sm-3 control-label">Nama Lengkap</label>
        <div class="col-sm-8">
            <?php
            echo form_input(array('name' => 'nama',
                'id' => 'nama',
                'maxlength' => '45',
                'class' => 'medium required form-control',
                'value' => set_value('nama', $row->userName)));
            ?>
        </div>
    </div>

    <div class="form-group">
        <label for="username" class="col-sm-3 control-label">Username</label>
        <div class="col-sm-8">
            <?php
            echo form_input(array('name' => 'username',
                'id' => 'username',
                'maxlength' => '45',
                'class' => 'medium form-control',
                'disabled' => 'disabled',
                'value' => set_value('username', $row->userLogin)));
            ?>
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="col-sm-3 control-label">Password</label>
        <div class="col-sm-8">
            <?php
            echo form_password(array('name' => 'password',
                'id' => 'password',
                'maxlength' => '45',
                'class' => 'medium form-control',
                'value' => set_value('password')));
            ?>
        </div>
    </div>


    <div class="form-group">
        <label for="cpassword" class="col-sm-3 control-label">Konfirmasi Password</label>
        <div class="col-sm-8">
            <?php
            echo form_password(array('name' => 'cpassword',
                'id' => 'cpassword',
                'maxlength' => '45',
                'class' => 'medium form-control',
                'value' => set_value('cpassword')));
            ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-8">
            <button class="btn btn-success" type="submit">Simpan</button>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
