<?php
if (isAdmin()) {
    ?>

    <ul class="nav nav-sidebar">
        <li class="">
            <a href="<?php echo site_url('order'); ?>">Order</a>
        </li>
    </ul>
    <ul class="nav nav-sidebar">
        <li class="nav-header">
            <a href="#">Master Data</a>
        </li>
        <li class="">
            <a href="<?php echo site_url('masakan'); ?>">Masakan</a>
        </li>
        <li class="">
            <a href="<?php echo site_url('auth/user_list'); ?>">Manajemen Pengguna</a>
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