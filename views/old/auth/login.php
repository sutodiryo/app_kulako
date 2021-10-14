<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <meta name="description" content="<?php echo MAIN_DESC ?>">
    <title><?php echo MAIN_TITLE ?></title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="<?php echo base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/vendors/line-awesome/css/line-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/vendors/animate.css/animate.min.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/vendors/toastr/toastr.min.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->

    <!-- THEME STYLES-->
    <link href="<?php echo base_url()?>assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <style>
        body
        {
            background-color: #4a5ab9;
        }

        .login-content
        {
            max-width: 900px;
            margin: 100px auto 50px;
        }

        .auth-head-icon
        {
            position: relative;
            height: 60px;
            width: 60px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            background-color: #fff;
            color: #5c6bc0;
            box-shadow: 0 5px 20px #d6dee4;
            border-radius: 50%;
            transform: translateY(-50%);
            z-index: 2;
        }
    </style>
</head>

<body>
    <div class="row login-content">
        <div class="col-6 bg-white">
            <div class="text-center">
                <span class="auth-head-icon"><i class="la la-user"></i></span>
            </div>
            <div class="ibox m-0" style="box-shadow: none;">
                
                <?php echo $this->session->flashdata('report');?>

                <form class="ibox-body" id="login-form" action="<?php echo base_url('auth/login'); ?>" method="POST">
                    <h4 class="font-strong text-center mb-5">LOG IN</h4>
                    <div class="form-group mb-4">
                        <input class="form-control form-control-air" type="text" name="email" placeholder="Email">
                    </div>
                    <div class="form-group mb-4">
                        <input class="form-control form-control-air" type="password" name="password" placeholder="Password">
                    </div>
                    <div class="flexbox mb-5">
                        <span>
                            <label class="ui-switch switch-icon mr-2 mb-0">
                                <input type="checkbox" checked="">
                                <span></span>
                            </label>Remember</span>
                        <a class="text-primary" href="<?php echo base_url()?>assets/forgot_password.html">Forgot password?</a>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary btn-rounded btn-block btn-air">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-6 d-inline-flex align-items-center text-white py-4 px-5">
            <div>
                <div class="h2 mb-4">Not a member?</div>
                <div class="mb-4 pt-3">
                    <button class="btn btn-outline btn-icon-only btn-circle mr-3"><i class="fa fa-facebook"></i></button>
                    <button class="btn btn-outline btn-icon-only btn-circle mr-3"><i class="fa fa-twitter"></i></button>
                    <button class="btn btn-outline btn-icon-only btn-circle mr-3"><i class="fa fa-pinterest-p"></i></button>
                </div>
                <p>Register and get the following benefits.<br>Minim dolor in amet nulla laboris enim dolore.</p>
                <div class="flexbox-b mb-3"><i class="ti-check mr-3 text-success"></i>Lorem Ipsum dolar set.</div>
                <div class="flexbox-b mb-3"><i class="ti-check mr-3 text-success"></i>Lorem Ipsum dolar set.</div>
                <div class="flexbox-b mb-5"><i class="ti-check mr-3 text-success"></i>Lorem Ipsum dolar set.</div>
                <button class="btn btn-outline btn-rounded btn-fix">Register</button>
            </div>
        </div>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- CORE PLUGINS-->
    <script src="<?php echo base_url()?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/metisMenu/dist/metisMenu.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/jquery-idletimer/dist/idle-timer.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/toastr/toastr.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <!-- CORE SCRIPTS-->
    <script src="<?php echo base_url()?>assets/js/app.min.js"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script>
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
</body>

</html>