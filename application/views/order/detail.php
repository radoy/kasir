<?php
$row = FALSE;
if ($dataOrder->num_rows() > 0) {
    $row = $dataOrder->row();
} else {
    exit;
}
?>

<div>
    <div class="row">
        <?php echo form_open(current_url(), array('name' => 'adminForm', 'class' => 'form-horizontal')); ?>
        <div class="col-sm-5">
            <div class="form-group">
                <label class="control-label col-sm-5">Tanggal Pesanan</label>
                <div class="col-sm-6">
                    <p class="form-control-static">
                        <?php echo $row->orderTanggal; ?>
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-5">Pelanggan</label>
                <div class="col-sm-6">
                    <p class="form-control-static">
                        <?php echo $row->userName; ?>
                    </p>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-5">No Meja</label>
                <div class="col-sm-2">
                    <p class="form-control-static">
                        <?php echo $row->orderNoMeja; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="form-group">
                <label class="control-label col-sm-5">Pilih Makanan / Minuman</label>
                <div class="col-sm-6">
                    <?php
                    echo form_dropdown('masakan', $dataMasakan, '', 'class="form-control"');
                    ?>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-5">Porsi yang dipesan</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="jumlah_masakan" required="required">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-5">Keterangan Tambahan</label>
                <div class="col-sm-7">
                    <textarea rows="6" name="keterangan_detail" class="form-control"></textarea>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-5">
                    <button type="submit" class="btn btn-primary">Tambah Pesanan</button>
                </div>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div style="margin-top: 45px">
        <table class="display table table-bordered" style="width:100%" id="table-masakan">
            <thead>
            <tr>
                <th style="width:45px;">#</th>
                <th>Nama</th>
                <th style="width:125px;">Jenis Masakan</th>
                <th style="width:125px;">Porsi</th>
                <th style="width:145px;">Status</th>
                <th>Keterangan</th>
                <th style="width:175px;">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $iCtr = 1;
            foreach ($dataOrderDetail->result() as $item) {
                ?>
                <tr>
                    <td class="text-center"><?php echo $iCtr; ?></td>
                    <td><?php echo $item->masakanNama; ?></td>
                    <td class="text-center">
                        <?php if ($item->masakanTipe == 2) {
                            echo '<button class="btn btn-xs btn-primary"> Minuman </button>';
                        } else if ($item->masakanTipe == 1) {
                            echo '<button class="btn btn-xs"> Makanan </button>';
                        }
                        ?>
                    </td>
                    <td class="text-right"><?php echo $item->orderDetailPorsi; ?></td>
                    <td class="text-center">
                        <?php if ($item->orderDetailStatus == 'o') {
                            echo '<button class="btn btn-xs btn-primary"> Order </button>';
                        } else if ($item->orderDetailStatus == 'c') {
                            echo '<button class="btn btn-xs btn-danger"> Cancel </button>';
                        }
                        ?>
                    </td>
                    <td><?php echo $item->orderDetailKeterangan; ?></td>
                    <td class="text-center">
                        <?php
                        if ($item->orderDetailStatus == 'o') {
                            ?>
                            <a class="btn btn-xs btn-warning"
                               href="<?php echo site_url('order/cancel/' . $item->orderDetailId); ?>"
                               title="Cancel Pesanan">
                                <i class="glyphicon glyphicon-minus"></i>
                            </a>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <?php
                $iCtr++;
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
