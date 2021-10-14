<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <link rel="icon" href="<?php echo ADMIN_ASSETS ?>images/favicon.ico">

    <title>Daftar Reseller Kulako</title>

    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>css/neon-core.css">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>css/neon-theme.css">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>css/neon-forms.css">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>css/custom.css">

    <script src="<?php echo ADMIN_ASSETS ?>js/jquery-1.11.3.min.js"></script>

</head>

<body class="page-body login-page login-form-fall">

    <script type="text/javascript">
        var baseurl = '';
    </script>

    <div class="login-container">

        <div class="login-form">

            <div class="login-content">

                <a href="<?php echo base_url() ?>" class="logo">
                    <img src="<?php echo ADMIN_ASSETS ?>images/logo-mbc-fix.png" width="300" alt="" />
                </a>


                <?php echo form_open('reg/reseller'); ?>

                <div class="form-steps">
                    <div class="step current" id="step-1">

                        <div class="login-bottom-links">
                            <a href="<?php echo base_url('auth'); ?>" class="link">
                                <h1>
                                    <font color="white">Daftar Reseller Kulako</font>
                                </h1>
                            </a>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-user"></i>
                                </div>
                                <input type="hidden" name="id_page" value="<?php if (empty($id)) {
                                                                                    echo 0;
                                                                                } else {
                                                                                    echo $id;
                                                                                } ?>" />
                                
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" value="<?php echo set_value('nama'); ?>" autocomplete="off" required />
                                <?php echo form_error('nama', '<small class="text-danger pl-4">', '</small>') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-phone"></i>
                                </div>
                                <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor HP (85725800XXX)" value="<?php echo set_value('no_hp'); ?>" autocomplete="off" required />
                                <?php echo form_error('no_hp', '<small class="text-danger pl-4">', '</small>') ?>
                            </div>
                        </div>

                        <div class="form-group" id="div_email">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-mail"></i>
                                </div>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo set_value('email'); ?>" autocomplete="off"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-location"></i>
                                </div>
                                <input type="text" class="form-control" name="kota_kab" id="kota_kab" placeholder="Kota/Kabupaten" value="<?php echo set_value('kota_kab'); ?>" autocomplete="off" required />
                                <?php echo form_error('kota_kab', '<small class="text-danger pl-4">', '</small>') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="entypo-location"></i>
                                </div>
                                <textarea  class="form-control" name="alamat" id="alamat" placeholder="Alamat Lengkap" autocomplete="off" required ><?php echo set_value('alamat'); ?></textarea>
                                <?php echo form_error('alamat', '<small class="text-danger pl-4">', '</small>') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <!-- <button type="submit" class="btn btn-success btn-block btn-login" id="submit_reg" disabled onclick="return check_input();"> -->
                            <button type="submit" class="btn btn-success btn-block btn-login" id="submit" value="Submit">
                                <i class="entypo-right"></i>
                                DAFTAR SEKARANG
                            </button>
                        </div>

                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <script src="<?php echo ADMIN_ASSETS ?>js/gsap/TweenMax.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/bootstrap.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/joinable.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/resizeable.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/neon-api.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/jquery.validate.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/neon-register.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/jquery.inputmask.bundle.js"></script>

    <!-- JavaScripts initializations and stuff -->
    <script src="<?php echo ADMIN_ASSETS ?>js/neon-custom.js"></script>

    <!-- Demo Settings -->
    <script src="<?php echo ADMIN_ASSETS ?>js/neon-demo.js"></script>

</body>

</html>