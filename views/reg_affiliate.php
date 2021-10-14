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

        <div class="login-form">

            <div class="login-content">

                <a href="<?php echo base_url() ?>" class="logo">
                    <img src="<?php echo ADMIN_ASSETS ?>images/logo-mbc-fix.png" width="300" alt="" />
                </a>
                <form id="daftar_affiliate" method="post" role="form" id="form_register" action="<?php echo base_url('reg/add_affiliate') ?>" autocomplete="off">


                    <div class="form-steps">
                        <div class="step current" id="step-1">

                            <div class="login-bottom-links">
                                <a href="<?php echo base_url('auth'); ?>" class="link">
                                    <h1>
                                        <font color="white">Form daftar affiliate</font>
                                    </h1>
                                </a>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="entypo-user"></i>
                                    </div>
                                    <input type="hidden" name="id_upline" value="<?php echo $id_aff ?>" />
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" autocomplete="off" required />
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

                            <div class="form-group" id="div_email">
                                <font color="red">
                                    <div id="Info"></div>
                                </font>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="entypo-mail"></i>
                                    </div>
                                    <input type="email" class="form-control" name="email" id="email" onchange="return check_email();" placeholder="Email" autocomplete="off" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="entypo-lock"></i>
                                    </div>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" required />
                                </div>
                            </div>

                            <div class="form-group">
                                <!-- <button type="submit" class="btn btn-success btn-block btn-login" id="submit_reg" disabled onclick="return check_input();"> -->
                                <button type="submit" class="btn btn-success btn-block btn-login" id="submit_reg" onclick="check_input()">
                                    <i class="entypo-right"></i>
                                    DAFTAR SEKARANG
                                </button>
                            </div>

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // function check_email() {

        //     var email = $("#email").val();
        //     if (email.length > 2) {
        //         $.post("<?php echo base_url(); ?>reg/check_email_availablity", {
        //             email: $('#email').val(),
        //         }, function(response) {
        //             $('#Info').fadeOut();
        //             setTimeout("finishAjax('Info', '" + escape(response) + "')", 450);
        //             // var x = document.getElementById("div_email"); 
        //             // x.border.color = "red";
        //         });
        //         return false;
        //     }
        // }

        // function finishAjax(id, response) {

        //     $('#' + id).html(unescape(response));
        //     $('#' + id).fadeIn(1000);
        // }

        function check_input() {
            var dataString = $("#daftar_affiliate").serialize();
            var url = "reg/add_affiliate"
            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>" + url,
                data: dataString,
                success: function(data) {
                    alert(data);
                }
            });
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