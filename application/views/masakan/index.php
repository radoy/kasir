<?php

?>

<div class="table-responsive">
    <div class="table-before">
        <a class="btn btn-success pull-right" href="<?php echo site_url('masakan/create'); ?>">
            <i class="glyphicon glyphicon-plus"></i> Tambah
        </a>
        <div class="clearfix"></div>
    </div>
    <table class="display table table-bordered" style="width:100%" id="table-masakan">
        <thead>
        <tr>
            <th style="width:45px;">#</th>
            <th>Nama</th>
            <th style="width:125px;">Harga</th>
            <th style="width:145px;">Status</th>
            <th style="width:145px;">Tipe</th>
            <th style="width:175px;">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $iCtr = 1;
        foreach ($data->result() as $row) {
            ?>
            <tr>
                <td class="text-center">
                    <?php echo $iCtr; ?>
                </td>
                <td><?php echo $row->masakanNama; ?></td>
                <td class="text-right">
                    <?php echo numberFormat($row->masakanHarga, 0); ?>
                </td>
                <td class="text-center">
                    <?php if ($row->masakanStatus == 1) {
                        echo '<button class="btn btn-xs btn-success"> Tersedia </button>';
                    } else {
                        echo '<button class="btn btn-xs btn-danger"> Tidak Tersedia </button>';
                    }
                    ?>
                </td>
                <td class="text-center">
                    <?php if ($row->masakanTipe == 2) {
                        echo '<button class="btn btn-xs btn-primary"> Minuman </button>';
                    } else if ($row->masakanTipe == 1) {
                        echo '<button class="btn btn-xs"> Makanan </button>';
                    }
                    ?>
                </td>
                <td class="text-center">
                    <a class="btn btn-xs btn-info" href="<?php echo site_url('masakan/view/' . $row->masakanId); ?>" title="Detail">
                        <i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                    <a class="btn btn-xs btn-warning" href="<?php echo site_url('masakan/update/' . $row->masakanId); ?>"
                       title="Edit">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    <a href="#" class="btn btn-xs btn-danger delete-data"
                       data-href="<?php echo site_url('masakan/delete/' . 1); ?>" data-toggle="modal"
                       data-target="confirm-delete">
                        <i class="glyphicon glyphicon-trash"></i>
                    </a>

                </td>
            </tr>
            <?php
            $iCtr++;
        }
        ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#table-masakan').DataTable({
            "lengthMenu": [5, 10, 15, 20, 50, 100],
            "pageLength": 20
        });
    });
</script>


