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
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>css/font-icons/font-awesome/css/font-awesome.min.css">
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
                            <h1>
                                <font color="white">Terima Kasih</font>
                            </h1>

                            <h3>
                                <font color="white">Data Anda telah terkirim, tunggu CS kami menghubungi Anda!</font>
                            </h3>
                            <h4>
                                <font color="orange">Atau jika ingin segera menghubungi CS kami, klik link di bawah ini</font>
                            </h4>

                            <button class="btn btn-success btn-block btn-lg" onclick="window.open('https://api.whatsapp.com/send?phone=628112735515&text=');">
                                <i class="fa fa-whatsapp"></i>
                                Hubungi CS
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