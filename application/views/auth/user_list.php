<div class="">
    <div class="table-before">
        <a class="btn btn-success pull-right" href="<?php echo site_url('auth/user_form'); ?>">
            <i class="glyphicon glyphicon-plus"></i> Tambah
        </a>
        <div class="clearfix"></div>
    </div>
    <table class="table table-bordered table-responsive">
        <thead>
        <tr>
            <th style="width:45px;">No</th>
            <th>Username</th>
            <th>Nama Lengkap</th>
            <th>Level</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $iCtr = 1;
        foreach ($data->result() as $row) {
            ?>
            <tr>
                <td class="text-center"><?php echo $iCtr; ?></td>
                <td><?php echo $row->userLogin; ?></td>
                <td><?php echo $row->userName; ?></td>
                <td><?php echo $row->levelNama; ?></td>
                <td class="text-center">
                    <a class="btn btn-xs btn-warning" href="<?php echo site_url('auth/user_form/' . $row->userId); ?>"
                       title="Edit">
                        <i class="glyphicon glyphicon-pencil"></i>
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