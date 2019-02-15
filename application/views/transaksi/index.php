<div>
    <div class="table-before">
        <a class="btn btn-primary pull-right" href="<?php echo site_url('transaksi/print_transaksi'); ?>">
            <i class="glyphicon glyphicon-print"></i> Print
        </a>
        <div class="clearfix"></div>
    </div>
    <div style="margin-top: 15px">
        <table class="display table table-bordered" style="width:100%" id="table-masakan">
            <thead>
            <tr>
                <th style="width:45px;">#</th>
                <th style="width:205px;">Tanggal Pesan</th>
                <th>Nama Pelanggan</th>
                <th style="width:125px;">No. Meja</th>
                <th style="width:125px;">Status</th>
                <th style="width:105px;">Aksi</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $iCtr = 1;
            foreach ($dataOrder->result() as $item) {
                ?>
                <tr>
                    <td class="text-center"><?php echo $iCtr; ?></td>
                    <td><?php echo $item->orderTanggal; ?></td>
                    <td><?php echo $item->userName; ?></td>
                    <td class="text-center"><?php echo $item->orderNoMeja; ?></td>
                    <td class="text-center">
                        <?php
                        if ($item->orderStatus == 'p') {
                            echo '<button class="btn btn-xs btn-success"> Sudah dibayar </button>';
                        } else {
                            echo '<button class="btn btn-xs btn-danger"> Belum dibayar </button>';
                        }
                        ?>
                    </td>
                    <td class="text-center">
                        <?php
                        if ($item->orderStatus == 'o') {
                            ?>
                            <a class="btn btn-xs btn-warning"
                               href="<?php echo site_url('transaksi/bayar/' . $item->orderId); ?>"
                               title="Lihat Detail">
                                <i class="glyphicon glyphicon-shopping-cart"></i>
                            </a>
                            <?php
                        } else if ($item->orderStatus == 'p') {
                            ?>
                            <a class="btn btn-xs btn-info"
                               href="<?php echo site_url('transaksi/detail/' . $item->orderId); ?>"
                               title="Lihat Detail">
                                <i class="glyphicon glyphicon-eye-open"></i>
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
