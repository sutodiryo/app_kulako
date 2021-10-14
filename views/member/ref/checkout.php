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

            <?php $this->session->set_userdata('referred_checkout', current_url()); ?>

            <div class="invoice">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <a href="#">
                            <img src="<?php echo ADMIN_ASSETS ?>images/path33822.webp" width="80" alt="" />
                        </a>
                    </div>
                </div>

                <div class="margin"></div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%"></th>
                            <th width="65%">Pesanan Anda</th>
                            <th width="30%" class="text-right">Harga</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no=0;
                        foreach ($produk as $p) {
                            $no++;
                            echo "<tr>
                            <td class='text-center' style=\"display: table-cell; vertical-align: middle; \">$no</td>
                            <td><img src='" . base_url('assets/upload/produk/') . "" . $p->img_1 . "' height='80'> $p->nama_produk</td>
                            <td class='text-right' style=\"display: table-cell; vertical-align: middle; \"><strong>Rp " . number_format($p->harga, 0, ",", ".") . "</strong></td>
                            </tr>";
                        }

                        echo "<tr class='list-unstyled'>
                        <td class='text-right' style=\"display: table-cell; vertical-align: middle; \" colspan='2'><font color='orange'>Diskon</font></td>
                        <td class='text-right'><font color='orange'><strong>- Rp " . number_format(00, 0, ",", ".") . "</strong></font></td>
                        </tr>
                        
                        <tr class='list-unstyled'>
                        <td class='text-right' style=\"display: table-cell; vertical-align: middle; \" colspan='2'><font color='black'>TOTAL</font></td>
                        <td class='text-right' style=\"display: table-cell; vertical-align: middle; \"><h4><strong><font color='red'>Rp " . number_format($p->harga, 0, ",", ".") . "</font></strong></h4></td>
                        </tr>";
                        ?>

                    </tbody>
                </table>

                <div class="margin"></div>
                <div class="row">
                    <div class="col-sm-12">

                        <div>
                            <br />

                            <?php if ($this->session->userdata('log_valid') == TRUE) { ?>

                            <div class="col-sm-6 col-xs-6">
                                <div class="text-left">
                                    Metode Pembayaran :
                                    <br>
                                    <br>
                                    <div class="radio radio-replace  color-primary neon-cb-replacement checked">
                                        <label class="cb-wrapper"><input type="radio" id="rd-2" name="radio1">
                                            <div class="checked" checked="checked"></div>
                                        </label>
                                        <label><img src="<?php echo ADMIN_ASSETS ?>images/bni.png" height="50" alt=""></label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-xs-6">
                                <div class="text-right">
                                    Anda login sebagai :
                                    <br>
                                    <font color="black"><?php echo $this->session->userdata('log_name'); ?></font>
                                    <br>
                                    <font color="black"><?php echo $this->session->userdata('log_email'); ?></font>
                                    <br />
                                    <br />
                                    <form action="<?php echo base_url('ref/process') ?>" method="POST">
                                        <input name="id_produk" type="hidden" value="<?php echo $p->id_produk ?>">
                                        <input name="id_member" type="hidden" value="<?php echo $this->session->userdata('log_id'); ?>">
                                        <input name="id_affiliate" type="hidden" value="<?php echo $id_aff ?>">
                                        <input name="total" type="hidden" value="<?php echo $p->harga ?>">
                                        <button type="submit" name="submit" value="checkout" class="btn btn-success btn-icon icon-right">Beli Sekarang<i class="entypo-right"></i></button>
                                    </form>
                                </div>
                            </div>

                            <?php
                            } else { ?>

                            <h4>
                                <small><strong>Jika anda sudah mempunyai akun, </strong></small>
                                <a data-toggle="modal" href="#modal-login-checkout">
                                    <font color="red">Login disini</font>
                                </a>
                            </h4>
                            <div class="panel panel-primary">

                                <div class="panel-heading">
                                    <div class="panel-title">
                                        <h4>Identitas anda</h4>
                                    </div>
                                    <div class="panel-options">
                                        <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <form action="<?php echo base_url('ref/checkout') ?>" role="form" method="POST" class="validate" novalidate="novalidate">
                                        <input name="id_produk" type="hidden" value="<?php echo $p->id_produk ?>">

                                        <div class="form-group">
                                            <label class="control-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama" data-validate="required,minlength[3]" placeholder="Nama Lengkap">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <input type="text" class="form-control" name="email" data-validate="required,email" placeholder="Email">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Nomor Handphone (WA)</label>
                                            <input type="text" class="form-control" name="no_hp" data-validate="required,number,minlength[8]" placeholder="Nomor HP (WA)">
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Password</label>
                                            <input type="password" class="form-control" name="password" data-validate="required,minlength[4]" placeholder="Password">
                                        </div>

                                        <div class="form-group">
                                            <button type="submit"  name="submit" value="guest_checkout" class="btn btn-lg btn-success btn-icon icon-right">Beli Sekarang<i class="entypo-right-open"></i></button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <?php
                            } ?>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url() ?>/assets/js/gsap/TweenMax.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/joinable.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/resizeable.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/neon-api.js"></script>


    <script src="<?php echo ADMIN_ASSETS ?>js/jquery.validate.min.js"></script>

    <script src="<?php echo base_url() ?>/assets/js/neon-custom.js"></script>

    <script src="<?php echo base_url() ?>/assets/js/neon-demo.js"></script>


    <div class="modal fade" id="modal-login-checkout" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Login MBC Sukses</h4>
                </div>

                <form action="<?php echo base_url('auth/login'); ?>" method="POST">
                    <input name="login" type="hidden" value="checkout">
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