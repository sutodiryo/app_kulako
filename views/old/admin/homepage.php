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
    <link href="<?php echo base_url()?>assets/vendors/summernote/dist/summernote.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/vendors/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="<?php echo base_url()?>assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
</head>

<body>
    <div class="page-wrapper">
        <!-- START SIDEBAR-->
        <?php $this->load->view('_part/sidebar'); ?>
        <!-- END SIDEBAR-->

        <!-- START CONTENT-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title"><?php echo $page; ?></h1>
                <?php echo $this->session->flashdata('report');?>
            </div>


            <?php foreach ($content as $c) {} ?>

            <form action="<?php echo base_url('admin/set_homepage');?>" method="POST" >
                <input type="hidden" value="1" name="id_homepage">
                <div class="page-content fade-in-up">

                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">
                                <button class="btn btn-gradient-aqua btn-fix" type="submit"><span class="btn-icon"><i class="ti-save"></i>Simpan</span></button>
                                <a class="btn btn-gradient-peach btn-fix" href="<?php echo base_url('admin'); ?>" onclick="return confirm('Anda yakin tidak ingin menyimpan perubahan?');">
                                    <span class="btn-icon"><i class="fa fa-reply"></i>Batal</span>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="ibox">
                                <div class="ibox-head">
                                    <div class="ibox-title">Identitas Utama</div>
                                </div>
                                <div class="ibox-body">
                                    <div class="form-group mb-4">
                                        <label>Web Title</label>
                                        <input class="form-control form-control-air" type="text" name="title" value="<?php echo $c->title; ?>">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Keyword</label>
                                        <input class="form-control form-control-air" type="text" name="keyword" value="<?php echo $c->keyword; ?>">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Email</label>
                                        <input class="form-control form-control-air" type="text" name="email" value="<?php echo $c->email; ?>">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Phone</label>
                                        <input class="form-control form-control-air" type="text" name="phone" value="<?php echo $c->phone; ?>">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Facebook</label>
                                        <input class="form-control form-control-air" type="text" name="facebook" value="<?php echo $c->facebook; ?>">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>Twitter</label>
                                        <input class="form-control form-control-air" type="text" name="twitter" value="<?php echo $c->twitter; ?>">
                                    </div>

                                    <div class="form-group mb-4">
                                        <center>
                                            <label>Logo <font color="red" style="font-size: 80%;">*resolusi 150x60px</font></label><br>
                                            <img src="<?php echo $c->logo;?>">
                                        </center>
                                        <input type="file" class="form-control form-control-air" placeholder="<?php echo $c->logo; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="ibox">
                                <div class="ibox-head">
                                    <div class="ibox-title">Profil</div>
                                </div>
                                <div class="ibox-body">

                                    <div class="form-group mb-4">
                                        <label>Vision</label>
                                        <textarea name="vision" data-provide="markdown" data-iconlibrary="fa" rows="10"><?php echo $c->vision; ?></textarea>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label>Mission</label>
                                        <textarea name="mission" data-provide="markdown" data-iconlibrary="fa" rows="10"><?php echo $c->mission; ?></textarea>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label>Description</label>
                                        <textarea name="description" data-provide="markdown" data-iconlibrary="fa" rows="10"><?php echo $c->description; ?></textarea>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label>Slider Text</label>
                                        <textarea name="slider_text" data-provide="markdown" data-iconlibrary="fa" rows="10"><?php echo $c->slider_text; ?></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">
                                <button class="btn btn-gradient-aqua btn-fix" type="submit"><span class="btn-icon"><i class="ti-save"></i>Simpan</span></button>
                                <a class="btn btn-gradient-peach btn-fix" href="<?php echo base_url('admin'); ?>" onclick="return confirm('Anda yakin tidak ingin menyimpan perubahan?');">
                                    <span class="btn-icon"><i class="fa fa-reply"></i>Batal</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </form>

            <!-- END PAGE CONTENT-->
            <footer class="page-footer">
                <div class="font-13">2019 © <b>efg.co.id</b></div>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>

    </div>

    <!-- START SEARCH PANEL-->
    <form class="search-top-bar" action="#">
        <input class="form-control search-input" type="text" placeholder="Search...">
        <button class="reset input-search-icon"><i class="ti-search"></i></button>
        <button class="reset input-search-close" type="button"><i class="ti-close"></i></button>
    </form>
    <!-- END SEARCH PANEL-->

    <!-- BEGIN THEME CONFIG-->
    <?php $this->load->view('_part/rightpanel'); ?>
    <!-- END THEME CONFIG-->


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
    <script src="<?php echo base_url()?>assets/vendors/summernote/dist/summernote.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/bootstrap-markdown/js/bootstrap-markdown.js"></script>
    <!-- CORE SCRIPTS-->
    <script src="<?php echo base_url()?>assets/js/app.min.js"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script>
        $(function() {
            $('#summernote').summernote();
            $('#summernote_air').summernote({
                airMode: true
            });
        });

        $(function() {
            $('#description').summernote();
            $('#summernote_air').summernote({
                airMode: true
            });
        });
    </script>
</body>



</html>