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

    <script src="<?php echo ADMIN_ASSETS ?>js/jquery-1.11.3.min.js"></script>

</head>

<body class="page-body">

    <div class="page-container">

        <?php $this->load->view('_part/sidebar'); ?>

        <div class="main-content">

            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-primary" data-collapsed="0">

                        <div class="panel-heading">
                            <div class="panel-title">
                                <h3>
                                    <?php foreach ($transaksi as $t) {
                                        
                                    } ?>
                                    <?php echo $title; echo " <font color='red'>Invoice #532033$t->id_transaksi</font>"; ?>
                                </h3>
                            </div>

                            <div class="panel-options">
                                <a href="<?php echo base_url('member/transaksi/beli') ?>"><i class="entypo-reply"></i>Kembali</a>
                            </div>
                        </div>

                        <div class="panel-body">
                            <?php echo form_open_multipart('member/up_bukti/'); ?>
                            
                            <input type="hidden" name="id_transaksi" value="<?php echo $t->id_transaksi?>">

                            <div class="col-sm-12 text-center">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 300px; height: 400px;" data-trigger="fileinput">
                                        <img src="<?php echo ADMIN_ASSETS ?>images/bukti_trans2.png" alt="Foto atau screenshot bukti transfer">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 400px; max-height: 800px"></div>
                                    <div>
                                        <span class="btn btn-white btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="bukti_transfer" accept="image/*" required>
                                        </span>
                                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="button" class="btn btn-danger"><i class="entypo-reply"></i> Batal</button>
                                    <button type="submit" class="btn btn-success">Upload Bukti <i class="entypo-upload"></i></button>
                                </div>

                            </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>

            <?php echo FOOTER ?>
        </div>
    </div>

    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>js/dropzone/dropzone.css">

    <script src="<?php echo ADMIN_ASSETS ?>js/gsap/TweenMax.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/bootstrap.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/joinable.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/resizeable.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/neon-api.js"></script>

    <script src="<?php echo ADMIN_ASSETS ?>js/fileinput.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/dropzone/dropzone.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/neon-chat.js"></script>

    <script src="<?php echo ADMIN_ASSETS ?>js/neon-custom.js"></script>

    <script src="<?php echo ADMIN_ASSETS ?>js/neon-demo.js"></script>

</body>

</html>