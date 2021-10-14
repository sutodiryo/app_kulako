<div class="sidebar-menu">
    <div class="sidebar-menu-inner">
        <header class="logo-env">

            <!-- logo -->
            <div class="logo">
                <a href="<?php echo base_url() ?>">
                    <img src="<?php echo ADMIN_ASSETS ?>images/logo_line.png" width="120" alt="" />
                </a>
            </div>

            <div class="sidebar-collapse">
                <a href="<?php echo base_url() ?>#" class="sidebar-collapse-icon">
                    <i class="entypo-menu"></i>
                </a>
            </div>

            <div class="sidebar-mobile-menu visible-xs">
                <a href="<?php echo base_url() ?>#" class="with-animation">
                    <i class="entypo-menu"></i>
                </a>
            </div>
        </header>

        <ul id="main-menu" class="main-menu">

            <?php if ($this->session->userdata('log_admin') == TRUE) { ?>

                <li <?php if (empty($page)) {
                            echo "";
                        } elseif ($page == 'Dashboard') {
                            echo "class=\"active\"";
                        } ?>>
                    <a href="<?php echo base_url('admin') ?>">
                        <i class="entypo-gauge"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li <?php if (empty($page)) {
                            echo "";
                        } elseif ($page == 'member') {
                            echo "class=\"active\"";
                        } ?>>
                    <a href="<?php echo base_url('admin/member/list') ?>">
                        <i class="entypo-users"></i>
                        <span class="title">Member</span>
                    </a>
                </li>

                <li <?php if (empty($page)) {
                            echo "";
                        } elseif ($page == 'produk') {
                            echo "class=\"active\"";
                        } ?>>
                    <a href="#">
                        <i class="entypo-tag"></i>
                        <span class="title">Produk</span>
                    </a>
                </li>

                <li <?php if (empty($page)) {
                            echo "";
                        } elseif ($page == 'Transaksi') {
                            echo "class=\"active\"";
                        } ?>>
                    <a href="#">
                        <i class="entypo-basket"></i>
                        <span class="title">Transaksi</span>
                    </a>
                </li>


                <li <?php if (empty($page)) {
                            echo "";
                        } elseif ($page == 'report') {
                            echo "class=\"active\"";
                        } ?>>
                    <a href="#">
                        <i class="entypo-docs"></i>
                        <span class="title">Report</span>
                    </a>
                </li>


            <?php
            } else { ?>

                <!-- <li <?php if (empty($page)) {
                                    echo "";
                                } elseif ($page == 'Dashboard') {
                                    echo "class=\"active\"";
                                } ?>>
                <a href="<?php echo base_url('member') ?>">
                    <i class="entypo-gauge"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li> -->

                <?php
                    if ($this->session->userdata('log_level') == 1) { ?>



                    <li <?php if (empty($page)) {
                                    echo "";
                                } elseif ($page == 'link') {
                                    echo "class=\"active\"";
                                } ?>>
                        <a href="<?php echo base_url('member/link/') ?>">
                            <i class="entypo-link"></i>
                            <span class="title">Link Afiliasi</span>
                        </a>
                    </li>

                    <li <?php if (empty($page)) {
                                    echo "";
                                } elseif ($page == 'komisi') {
                                    echo "class=\"active\"";
                                } ?>>
                        <a href="<?php echo base_url('member/transaksi/komisi') ?>">
                            <i class="entypo-credit-card"></i>
                            <span class="title">Dompet Komisi & Fee</span>
                        </a>
                    </li>

                    <li <?php if (empty($page)) {
                                    echo "";
                                } elseif ($page == 'jual') {
                                    echo "class=\"active\"";
                                } ?>>
                        <a href="<?php echo base_url('member/transaksi/jual') ?>">
                            <i class="entypo-bag"></i>
                            <span class="title">Penjualan Sendiri</span>
                        </a>
                    </li>

                    <li <?php if (empty($page)) {
                                    echo "";
                                } elseif ($page == 'team') {
                                    echo "class=\"active\"";
                                } ?>>
                        <a href="<?php echo base_url('member/team/') ?><?php echo $this->session->userdata('log_id') ?>">
                            <i class="entypo-flow-tree"></i>
                            <span class="title">Penjualan Team</span>
                        </a>
                    </li>

                    <li <?php if (empty($page)) {
                                    echo "";
                                } elseif ($page == 'kelas') {
                                    echo "class=\"active\"";
                                } ?>>
                        <a href="<?php echo base_url('member/ruang_kelas') ?>">
                            <i class="entypo-graduation-cap"></i>
                            <span class="title">Ruang Kelas</span>
                        </a>
                    </li>

                <?php  } else { ?>

                    <li <?php if (empty($page)) {
                                    echo "";
                                } elseif ($page == 'kelas') {
                                    echo "class=\"active\"";
                                } ?>>
                        <a href="<?php echo base_url('member/index') ?>">
                            <i class="entypo-graduation-cap"></i>
                            <span class="title">Ruang Kelas</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url('member/affiliate') ?>" onclick="return confirm('Klik OK jika anda ingin mulai menjadi affiliate ?');">
                            <i class="entypo-flow-tree"></i>
                            <span class="title">Menjadi Affiliate ?</span>
                        </a>
                    </li>


                    <?php
                            $pb     = $this->db->query("SELECT id_produk_bundle,nama_bundle FROM produk_bundle WHERE status=1");
                            $tpb    = $pb->num_rows();
                            $bundle = $pb->result();

                            ?>


                <?php } ?>

                <!--
            <li <?php if (empty($page)) {
                        echo "";
                    } elseif ($page == 'profile') {
                        echo "class=\"active\"";
                    } ?>>
                <a href="<?php echo base_url('member/profile/') ?>">
                    <i class="entypo-user"></i>
                    <span class="title">Profile</span> -->
                <!-- <span class="badge badge-secondary badge-roundless">Lengkapi Data diri anda</span> -->
                <!-- </a>
            </li>
            
            <li <?php if (empty($page)) {
                        echo "";
                    } elseif ($page == 'link') {
                        echo "class=\"active\"";
                    } ?>>
                <a href="<?php echo base_url('member/link') ?>">
                    <i class="entypo-link"></i>
                    <span class="title">Link Afiliasi</span>
                </a>
            </li>
            
            <li <?php if (empty($page)) {
                        echo "";
                    } elseif ($page == 'beli') {
                        echo "class=\"active\"";
                    } ?>>
                <a href="<?php echo base_url('member/transaksi/beli') ?>">
                    <i class="entypo-archive"></i>
                    <span class="title">Pembelian</span>
                </a>
            </li>

            <li <?php if (empty($page)) {
                        echo "";
                    } elseif ($page == 'komisi') {
                        echo "class=\"active\"";
                    } ?>>
                <a href="<?php echo base_url('member/transaksi/komisi') ?>">
                    <i class="entypo-credit-card"></i>
                    <span class="title">Komisi</span>
                </a>
            </li>
            -->

            <?php
            }
            ?>

            <li>
                <a title="Log Out (<?php echo $this->session->userdata('log_user') ?>)" href="<?php echo base_url('auth/logout') ?>" onclick="return confirm('Anda yakin ingin keluar ?');">
                    <i class="entypo-logout right"></i>
                    <span class="title">Log Out (<?php echo $this->session->userdata('log_user') ?>)</span>
                </a>
            </li>
        </ul>

    </div>

</div>