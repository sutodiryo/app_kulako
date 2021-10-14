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

<body class="page-body">

    <div class="page-container">

        <?php $this->load->view('_part/sidebar'); ?>

        <div class="main-content">
            <?php $this->load->view('_part/header'); ?>

            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h3>
                                    <?php foreach ($produk as $p) { } ?>
                                    <?php echo "$p->nama_bundle"; ?>
                                </h3>
                            </div>

                            <div class="panel-options">
                                <a href="<?php echo base_url('member/ruang_kelas') ?>"><i class="entypo-reply"></i>Kembali</a>
                            </div>
                        </div>

                        <div class="panel-body with-table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td width="10%" class="text-center">No</td>
                                        <th width="60%">Materi</th>
                                        <th width="30%" class="text-center">Download</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($link as $l) {
                                        $no++;
                                        echo "<tr>
                                        <td class='text-center' valign=\"middle\">$no</td>
                                        <td valign=\"middle\">$l->nama_link</td>
                                        <td class='text-center'>
                                        <a type='button' class='btn btn-green' href='$l->link' target='_blank'><i class='entypo-download'></i></a>
                                        </td>
                                        </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>

            <?php echo FOOTER ?>

        </div>
    </div>

    <!-- Bottom scripts (common) -->
    <script src="<?php echo base_url() ?>/assets/js/gsap/TweenMax.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/joinable.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/resizeable.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/neon-api.js"></script>

    <!-- Imported scripts on this page -->
    <script src="<?php echo base_url() ?>/assets/js/neon-chat.js"></script>

    <!-- JavaScripts initializations and stuff -->
    <script src="<?php echo base_url() ?>/assets/js/neon-custom.js"></script>

    <!-- Demo Settings -->
    <script src="<?php echo base_url() ?>/assets/js/neon-demo.js"></script>

</body>

</html>