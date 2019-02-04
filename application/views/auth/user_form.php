<?php
$row = FALSE;
if ($data->num_rows() > 0) {
    $row = $data->row();
}
?>

<div>
    <?php echo form_open(current_url(), array('name' => 'adminForm', 'id' => 'adminForm', 'class' => 'form-horizontal')); ?>

    <div class="form-group">
        <label for="nama" class="col-sm-3 control-label">Nama Lengkap</label>

        <div class="col-sm-8">
            <?php
            echo form_input(array('name' => 'nama',
                'id' => 'nama',
                'maxlength' => '45',
                'class' => 'medium form-control',
                'required' => 'required',
                'value' => set_value('nama', $row ? $row->userName : '')));
            echo form_hidden('clogin', $row ? $row->userLogin : '');
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
                'required' => 'required',
                'value' => set_value('username', $row ? $row->userLogin : '')));
            ?>
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="col-sm-3 control-label">Password</label></dt>
        <div class="col-sm-8">
            <?php
            echo form_password(array('name' => 'password',
                'id' => 'password',
                'maxlength' => '45',
                'class' => ' form-control medium ' . ($row ? '' : 'required')));
            ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Level</label>
        <div class="col-sm-8">
            <?php
            echo form_dropdown('level', $dataLevelCombo, ($row ? $row->userLevelId : ''), 'class="form-control"');
            ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-8">
            <button class="btn btn-success" type="submit">Simpan</button>
            <a class="btn btn-danger" href="<?php echo site_url('auth/user_list'); ?>">
                Batal
            </a>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>