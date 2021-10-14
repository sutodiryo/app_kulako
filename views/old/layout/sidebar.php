<!-- START SIDEBAR-->
<nav class="page-sidebar">
    <ul class="side-menu metismenu scroller">
        <li <?php if (empty($page)) {
                echo "";
            } elseif ($page == 'Beranda') {
                echo "class=\"active\"";
            } ?>>
            <a href="<?php echo base_url('admin') ?>"><i class="sidebar-item-icon fa fa-home"></i>
                <span class="nav-label">Beranda</span>
            </a>
        </li>

        <!-- <li class="heading">MASTER</li> -->
        <li <?php if (empty($page)) {
                echo "";
            } elseif ($page == 'Data Pendidik Pusat') {
                echo "class=\"active\"";
            } ?>>
            <a href="<?php echo base_url('admin/pendidik/pusat') ?>"><i class="sidebar-item-icon fa fa-user-circle"></i>
                <span class="nav-label">Pendidik</span>
            </a>
        </li>
        <li <?php if (empty($page)) {
                echo "";
            } elseif ($page == 'Data Peserta Didik Pusat') {
                echo "class=\"active\"";
            } ?>>
            <a href="<?php echo base_url('admin/peserta_didik/pusat') ?>"><i class="sidebar-item-icon fa fa-users"></i>
                <span class="nav-label">Peserta Didik</span>
            </a>
        </li>
        <li <?php if (empty($page)) {
                echo "";
            } elseif ($page == 'Data Area') {
                echo "class=\"active\"";
            } ?>>
            <a href="<?php echo base_url('admin/area') ?>"><i class="sidebar-item-icon fa fa-globe"></i>
                <span class="nav-label">Area</span>
            </a>
        </li>

        <!-- <li class="heading">MONITORING</li> -->
        <li>
            <a href="<?php echo base_url('admin/partner') ?>"><i class="sidebar-item-icon fa fa-calendar"></i>
                <span class="nav-label">Jadwal</span>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url('admin/partner') ?>"><i class="sidebar-item-icon fa fa-file"></i>
                <span class="nav-label">Laporan AB
                    <!--laporan aktivitas belajar--></span>
            </a>
        </li>

    </ul>
</nav>
<!-- END SIDEBAR-->