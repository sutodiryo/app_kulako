<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="description" content="<?php echo MAIN_DESC ?>">
    <meta name="author" content="" />

    <link rel="icon" href="<?php echo ADMIN_ASSETS ?>images/favicon.ico">

    <title><?php echo MAIN_TITLE ?></title>

    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>css/neon-core.css">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>css/neon-theme.css">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>css/neon-forms.css">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>css/custom.css">

    <script src="<?php echo base_url() ?>/assets/js/jquery-1.11.3.min.js"></script>
</head>

<body class="page-body boxed-layout">

    <div class="page-container">

        <div class="main-content">

            <div class="invoice">

                <div class="row">

                    <div class="col-sm-12 text-center">

                        <a href="#">
                            <img src="<?php echo ADMIN_ASSETS ?>images/logo-mbc-fix.png" width="300" alt="" />
                        </a>

                    </div>

                    <!-- <div class="col-sm-6 invoice-right"> -->
                        <div>
                        <?php
                        $nama       = $this->input->post('nama');
                        $email      = $this->input->post('email');
                        $id_bundle  = $this->input->post('id_produk_bundle');
                        $total      = $this->input->post('total');
                        $cek        = $this->db->query("SELECT * FROM member WHERE nama='$nama' AND email='$email'")->num_rows();

                        $member     = $this->db->query("SELECT * FROM member WHERE nama='$nama' AND email='$email'")->result();
                        foreach ($member as $m) {
                            $id_member = $m->id_member;
                        }
                        $transaksi  = $this->db->query("SELECT  id_transaksi,id_produk,id_affiliate,id_member,id_produk_bundle,bundle,total,tgl_checkout,bukti_transfer,tgl_bayar,status,
                                                                (SELECT no_hp FROM member WHERE id_member=transaksi.id_affiliate) as no_hp
                                                                FROM transaksi WHERE id_member='$id_member' AND id_produk_bundle='$id_bundle'")->result();

                        foreach ($transaksi as $t) { }

                        ?>
                        <!-- <h3>INVOICE NO. #532033<?php echo "$t->id_transaksi"; ?></h3> -->
                        <!-- <span><?php echo $t->tgl_checkout; ?></span><br>
                        <span><?php echo $m->nama; ?></span> -->
                    </div>

                </div>


                <hr class="margin" />

                <div class="row">

                    <div class="col-sm-12">
                        <ul class="list-unstyled text-center">
                        <h3>Pembayaran <font color="green">#532033<?php echo "$t->id_transaksi"; ?></font> bisa dilakukan melalui bank BNI di bawah ini : </h3>
                            <li>
                                <img src="<?php echo ADMIN_ASSETS ?>images/bni.png" height="70" alt="">
                            </li>
                            <li>
                                <h2><strong>0144396485</strong></h2>
                            </li>
                            <li>
                                <h3><strong>Atas Nama : Fitra Jaya Saleh</strong></h3>
                            </li>
                            <li>
                                <h3>
                                    Transfer Sejumlah:
                                    <strong><?php echo "<strong><font color='red'>Rp " . number_format($total, 0, ",", ".") . "</font></strong>"; ?></strong>
                                </h3>
                            </li>
                            <li>
                                <h3><strong>Batas waktu transfer : <font color="blue">30 Menit</font></strong></h3>
                            </li>
                            <a  target="_blank" href="https://api.whatsapp.com/send?phone=62<?php echo $t->no_hp ?>&text=Assalamualaikum%0ASaya%20sudah%20transfer%20sebesar%20<?php echo "Rp " . number_format($total, 0, ",", ".") . ""; ?>%2C%20dari%20rekening%20saya%20atas%20nama%20rekening%20pengirim%20%3A%0ATerima%20kasih%2C%20mohon%20panduan%20selanjutnya" class="btn btn-lg btn-success btn-icon">
                                Konfirmasi Pembayaran Lewat WA
                                <i class="fa fa-whatsapp"></i>
                            </a>
                        </ul>
                        <br />

                    </div>

                </div>

            </div>

        </div>
    </div>

    <!-- Bottom scripts (common) -->
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>css/font-icons/font-awesome/css/font-awesome.min.css">
    <script src="<?php echo base_url() ?>/assets/js/gsap/TweenMax.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/joinable.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/resizeable.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/neon-api.js"></script>

    <!-- Imported scripts on this page -->
    <script src="<?php echo base_url() ?>/assets/js/neon-chat.js"></script>

    <!-- JavaScripts initializations and stuff -->
    <script src="<?php echo base_url() ?>/assets/js/neon-custom.js"></script>

    <!-- Demo Settings -->
    <script src="<?php echo base_url() ?>/assets/js/neon-demo.js"></script>


    <div class="modal fade" id="modal-login-invoice" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Login MBC Sukses</h4>
                </div>

                <form action="<?php echo base_url('auth/login'); ?>" method="POST">
                    <input name="login" type="hidden" value="invoice">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="username" class="control-label">Email/Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Email/Username" id="username" autocomplete="off" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password" class="control-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>