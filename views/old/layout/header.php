<header class="header">

    <ul class="nav navbar-toolbar">
        <li>
            <a class="nav-link sidebar-toggler js-sidebar-toggler" href="javascript:;">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
        </li>
        <li class="dropdown mega-menu">
            <a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>" target="_blank">ICONI - Information Center Of Nurul Ilmi</a>
        </li>
    </ul>

    <!--
    <a class="page-brand" href="<?php echo base_url('admin') ?>">
        <font style="font-size:60%;"><i class="fa fa-home"></i> </font>
    </a>
    -->

    <ul class="nav navbar-toolbar">
        <li class="dropdown dropdown-user">
            <a class="nav-link dropdown-toggle link">
                <div class="admin-avatar">
                    <img src="<?php echo ADMIN_ASSETS ?>img/users/admin-image.png" alt="image" />
                </div>
                <span><?php echo $this->session->userdata('log_name'); ?></span>
            </a>

        </li>

        <li>
            <a class="nav-link" title="Logout" href="<?php echo base_url('auth/logout') ?>" onclick="return confirm('Anda yakin ingin keluar ?');">
                <span class="ti-power-off"></span>
            </a>
        </li>

    </ul>

</header>