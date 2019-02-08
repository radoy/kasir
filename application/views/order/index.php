<div>
    <div style="margin-top: 45px">
        <table class="display table table-bordered" style="width:100%" id="table-masakan">
            <thead>
            <tr>
                <th style="width:45px;">#</th>
                <th style="width:205px;">Tanggal Pesan</th>
                <th>Nama Pelanggan</th>
                <th style="width:125px;">No. Meja</th>
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
                    <td><?php echo $item->orderNoMeja; ?></td>
                    <td class="text-center">
                        <a class="btn btn-xs btn-info"
                           href="<?php echo site_url('order/detail/' . $item->orderId); ?>"
                           title="Lihat Detail">
                            <i class="glyphicon glyphicon-chevron-up"></i>
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
</div>
