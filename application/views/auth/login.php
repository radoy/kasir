<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache"/>
    <title><?php echo(isset($header) ? ($header . ' -') : ''); ?> Aplikasi Kasir</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/bootstrap.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/data-tables.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/custom.css'); ?>"/>

    <script src="<?php echo base_url('public/js/jquery.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('public/js/bootstrap.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('public/js/jquery.data-tables.js'); ?>" type="text/javascript"></script>

    <script type="text/javascript">var hostname = "<?php echo base_url(); ?>"</script>

</head>
<body>
<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>">Aplikasi Kasir SMK Telkom Medan</a>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="login_box">
        <h2 class="text-center">Login</h2>
        <div>
            <?php
            if ($this->session->flashdata('system_message')) {
                echo '<div class="text-danger text-center">' . $this->session->flashdata('system_message') . '</div>';
            }

            echo validation_errors('<div class="text-danger text-center">', '</div>');
            ?>
            <br/>
            <?php echo form_open(current_url(), array('name' => 'adminForm', 'id' => 'adminForm')); ?>

            <div class="form-group">
                <label for="username">Username</label>
                <?php echo form_input(array('name' => 'username', 'id' => 'username', 'class' => 'form-control')); ?>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <?php echo form_password(array('name' => 'password', 'id' => 'password', 'class' => 'form-control')); ?>
            </div>

            <button type="submit" class="btn btn-primary btn-flat btn-block" id="loginbtn">Login</button>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>
</body>
</html>
