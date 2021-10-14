<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <link rel="icon" href="<?php echo ADMIN_ASSETS ?>images/favicon.ico">

    <title>Daftar MBC Sukses</title>

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

        <div class="login-content">
            <a href="<?php echo base_url() ?>index.html" class="logo">
                <img src="<?php echo ADMIN_ASSETS ?>images/logo@2x.png" width="120" alt="" />
            </a>
        </div>

        <div class="login-form">

            <div class="login-content">

                <form method="post" role="form" id="form_register" action="<?php echo base_url('reg/member') ?>">

                    <div class="form-register-success">
                        <i class="entypo-check"></i>
                        <h3>You have been successfully registered.</h3>
                        <p>We have emailed you the confirmation link for your account.</p>
                    </div>

                    <div class="form-steps">

                        <div class="step current" id="step-1">

                            <div class="form-group">
                                <div id="Info"></div>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="entypo-user"></i>
                                    </div>
                                    <input type="text" class="form-control" name="username" id="username" onchange="return check_username();" placeholder="Username" autocomplete="off" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="entypo-phone"></i>
                                    </div>
                                    <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor HP (85725800XXX)" autocomplete="off" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="entypo-mail"></i>
                                    </div>
                                    <input type="text" class="form-control" name="email" id="email" data-mask="email" placeholder="E-mail" autocomplete="off" />
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="button" data-step="step-2" class="btn btn-primary btn-block btn-login">
                                    <i class="entypo-right-open-mini"></i>
                                    Next Step
                                </button>
                            </div>

                            <div class="form-group">
                                Step 1 of 2
                            </div>

                        </div>

                        <div class="step" id="step-2">

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="entypo-user"></i>
                                    </div>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" autocomplete="off" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="entypo-lock"></i>
                                    </div>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Choose Password" autocomplete="off" required />
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="entypo-lock"></i>
                                    </div>
                                    <input type="password" class="form-control" name="password_2" id="password_2" data-validate="required,equalTo[#password]" data-message-equal-to="Passwords doesn't match." placeholder="Confirm Password" autocomplete="off" />
                                </div>
                            </div> -->

                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block btn-login">
                                    <i class="entypo-right-open-mini"></i>
                                    Complete Registration
                                </button>
                            </div>

                            <div class="form-group">
                                Step 2 of 2
                            </div>

                        </div>
                    </div>

                </form>


                <div class="login-bottom-links">

                    <a href="<?php echo base_url('auth'); ?>" class="link">
                        <i class="entypo-lock"></i>
                        Return to Login Page
                    </a>
                    <br />
                    <a href="#">ToS</a> - <a href="#">Privacy Policy</a>

                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        function check_username() {

            var username = $("#username").val();
            if (username.length > 2) {
                $.post("<?php echo base_url(); ?>reg/check_username_availablity", {
                    username: $('#username').val(),
                }, function(response) {
                    $('#Info').fadeOut();
                    setTimeout("finishAjax('Info', '" + escape(response) + "')", 450);
                });
                return false;
            }
        }

        function finishAjax(id, response) {

            $('#' + id).html(unescape(response));
            $('#' + id).fadeIn(1000);
        }
    </script>

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