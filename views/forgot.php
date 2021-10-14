<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <link rel="icon" href="<?php echo ADMIN_ASSETS ?>images/favicon.ico">

    <title>Forgot Password - MBC Sukses</title>

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

<body class="page-body login-page login-form-fall" data-url="http://neon.dev">

    <script type="text/javascript">
        var baseurl = '';
    </script>

    <div class="login-container">

        <div class="login-content">
            <a href="<?php echo base_url() ?>index.html" class="logo">
                <img src="<?php echo ADMIN_ASSETS ?>images/logo@2x.png" width="120" alt="" />
            </a>
        </div>

        <div class="login-form">

            <div class="login-content">

                <form method="post" role="form" id="form_forgot_password">

                    <div class="form-forgotpassword-success">
                        <i class="entypo-check"></i>
                        <h3>Reset email has been sent.</h3>
                        <p>Please check your email, reset password link will expire in 24 hours.</p>
                    </div>

                    <div class="form-steps">

                        <div class="step current" id="step-1">

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="entypo-mail"></i>
                                    </div>

                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" data-mask="email" autocomplete="off" />
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-block btn-login">
                                    Send Link Reset
                                    <i class="entypo-right-open-mini"></i>
                                </button>
                            </div>

                        </div>

                    </div>

                </form>


                <div class="login-bottom-links">
                    <a href="<?php echo base_url() ?>" class="link">
                        <i class="entypo-lock"></i>
                        Return to Login Page
                    </a>
                    <br />
                    <a href="#">ToS</a> - <a href="#">Privacy Policy</a>
                </div>

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

    <script src="<?php echo ADMIN_ASSETS ?>js/neon-custom.js"></script>

    <script src="<?php echo ADMIN_ASSETS ?>js/neon-demo.js"></script>

</body>

</html>