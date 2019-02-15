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
                <label class="control-label col-sm-5">Total Item</label>
                <div class="col-sm-6">
                    <p class="form-control-static h3" style="margin-top: 0">
                        <?php echo $row->totalItem; ?>
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-5">Sub Total</label>
                <div class="col-sm-6">
                    <p class="form-control-static h3" style="margin-top: 0">
                        Rp <?php echo numberFormat($row->totalHarga); ?>
                    </p>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-5">Jumlah Bayar</label>
                <div class="col-sm-6">
                    <input type="numeric" class="form-control" name="jumlah_bayar" id="jumlah_bayar" required="required">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-5">Uang Kembali</label>
                <div class="col-sm-6">
                    <p class="form-control-static h3" id="uang_kembali" style="margin-top: 0">
                        <?php echo 0; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <div class="col-sm-offset-6 col-sm-5">
                    <button type="submit" class="btn btn-warning">Bayar</button>
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
                <th style="width:110px;">Harga</th>
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
                    <td class="text-right">
                        <?php echo numberFormat($item->masakanHarga * $item->orderDetailPorsi); ?>
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

<script type="text/javascript">
    $(document).ready(function () {
        
        var subtotal = <?php echo $row->totalHarga; ?>;

        $("#jumlah_bayar").keyup(function () {
			console.log($(this).val());
            var amount_tendered = parseFloat($(this).val().replace(/[$,]+/g, ''));
			console.log(amount_tendered);
			
            amount_tendered = isNaN(amount_tendered) ? 0 : amount_tendered;
            var change_due = amount_tendered - subtotal;

            // $('#uang_kembali').text(change_due);

            Global.formatNumber("uang_kembali", change_due);


        });
    });
</script>
