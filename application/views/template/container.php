<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="pragma" content="no-cache"/>
    <title><?php echo (isset($header) ? ($header . ' -') : ''); ?> Aplikasi Kasir</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/bootstrap.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/data-tables.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/custom.css'); ?>" />

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
        <div id="navbar" class="navbar-collapse collapse">
            <?php $this->load->view('template/topmenu'); ?>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <?php $this->load->view('template/leftmenu'); ?>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h3 class="page-header">
                <?php echo(isset($header) ? $header : ''); ?>
            </h3>
            <div class="row placeholders">
                <?php if ($this->session->flashdata('success_message')) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success_message'); ?>
                    </div>
                    <?php
                }
                if ($this->session->flashdata('error_message')) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('error_message'); ?>
                    </div>
                    <?php
                }
                if (function_exists('validation_errors') && validation_errors() != '') {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors(); ?>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($page)) {
                    $this->load->view($page);
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Hapus Data
            </div>
            <div class="modal-body">
                Apakah anda yakin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // Bind click to OK button within popup
    $('#confirm-delete').on('click', '.btn-ok', function (e) {

        var $modalDiv = $(e.delegateTarget);
        var id = $(this).data('recordId');

        var url = $(this).data('href');
        var url = $(this).attr('href');
        alert(url);

        $modalDiv.addClass('loading');
        $.post(url).then(function () {
            $modalDiv.modal('hide').removeClass('loading');
        });
    });

    // Bind to modal opening to set necessary data properties to be used to make request
    $('#confirm-delete').on('show.bs.modal', function (e) {
        var data = $(e.relatedTarget).data();
        $('.title', this).text(data.recordTitle);
        $('.btn-ok', this).data('recordId', data.recordId);

    });
</script>

</body>
</html>