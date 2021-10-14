<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <link rel="icon" href="<?php echo ADMIN_ASSETS ?>images/favicon.ico">

    <title>Kulako ID</title>

    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
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

        <div class="login-content">
            <a href="<?php echo base_url() ?>" class="logo">
                <img src="<?php echo ADMIN_ASSETS ?>images/logo-mbc-fix.png" width="300" alt="" />
            </a>
        </div>

        <div class="login-form">

            <div class="login-content">
                <?php echo $this->session->flashdata('report'); ?>

                <form action="<?php echo base_url('auth/login'); ?>" method="POST">

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="entypo-mail"></i>
                            </div>
                            <input type="text" class="form-control" name="username" placeholder="Email/Username" id="username" autocomplete="off" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="entypo-key"></i>
                            </div>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-login">
                            <i class="entypo-login"></i>
                            Login In
                        </button>
                    </div>

                    <div class="form-group">
                    </div>

                    <div class="form-group">
                        <button onclick="goBack()" type="button" class="btn btn-default btn-lg btn-block btn-icon google-button">
                            Beli Sekarang
                            <i class="entypo-right"></i>
                        </button>
                    </div>

                    <!-- <div class="form-group">
                        <a href="<?php echo base_url('auth/forgot_password'); ?>" type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left google-button">
                            Lupa password?
                            <i class="entypo-key"></i>
                        </a>
                    </div> -->

                </form>

            </div>
        </div>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <script src="<?php echo ADMIN_ASSETS ?>js/gsap/TweenMax.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/bootstrap.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/joinable.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/resizeable.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/neon-api.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/jquery.validate.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/neon-login.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/neon-custom.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/neon-demo.js"></script>
</body>

</html>