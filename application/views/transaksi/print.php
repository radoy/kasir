<h3>Laporan Transaksi</h3>
<table border="1" cellspacing="1" cellpadding="2">
    <thead>
    <tr style="background-color: #ccc;">
        <th style="width:45px; text-align: center;">#</th>
        <th style="width:105px; text-align: center;">Tanggal Pesan</th>
        <th style="width: 180px; text-align: center;">Nama Pelanggan</th>
        <th style="width:75px;text-align: center;">No. Meja</th>
        <th style="width:125px;text-align: center;">Status Bayar</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $iCtr = 1;
    foreach ($dataOrder->result() as $item) {
        ?>
        <tr>
            <td style="width:45px; text-align: center;"><?php echo $iCtr; ?></td>
            <td style="width:105px;"><?php echo $item->orderTanggal; ?></td>
            <td style="width: 180px; "><?php echo $item->userName; ?></td>
            <td style="width:75px; text-align: center;"><?php echo $item->orderNoMeja; ?></td>
            <td style="width:125px;">
                <?php
                if ($item->orderStatus == 'p') {
                    echo 'Sudah';
                } else {
                    echo 'Belum';
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