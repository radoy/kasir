<?php //if (!isValidUser()) exit;                                      ?>


<ul class="nav navbar-nav navbar-right">
    <li>
        <a href="<?php echo site_url('auth/user_identity'); ?>">
            <i class="glyphicon glyphicon-user"></i> My Profile
        </a>
    </li>
    <li>
        <a href="<?php echo site_url('auth/logout'); ?>">Logout</a>
    </li>
</ul>