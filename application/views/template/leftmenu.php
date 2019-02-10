<?php
if (isAdmin()) {
    ?>

    <ul class="nav nav-sidebar">
        <li class="nav-header">
            <a href="#">
                <i class="glyphicon glyphicon-folder-open"></i> Main Menu
            </a>
        </li>
        <li class="">
            <a href="<?php echo site_url('transaksi'); ?>">
                <i class="glyphicon glyphicon-th-list"></i> Daftar Transaksi
            </a>
        </li>
        <li class="nav-divider"></li>
        <li class="">
            <a href="<?php echo site_url('order'); ?>">
                <i class="glyphicon glyphicon-th-list"></i> Daftar Order
            </a>
        </li>
        <li class="">
            <a href="<?php echo site_url('order/create'); ?>">
                <i class="glyphicon glyphicon-pencil"></i> Order
            </a>
        </li>
        <li class="nav-header">
            <a href="#">
                <i class="glyphicon glyphicon-folder-open"></i> Master Data
            </a>
        </li>
        <li class="">
            <a href="<?php echo site_url('masakan'); ?>">
                <i class="glyphicon glyphicon-tint"></i> Masakan
            </a>
        </li>
        <li class="">
            <a href="<?php echo site_url('auth/user_list'); ?>">
                <i class="glyphicon glyphicon-cog"></i> Manajemen Pengguna
            </a>
        </li>
    </ul>

    <?php

} else if (isKasir()) {
    ?>
    <ul class="nav nav-sidebar">
        <li class="">
            <a href="<?php echo site_url('order'); ?>">Order</a>
        </li>
    </ul>
    <?php
}