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

    <style>
        table.dataTable tbody td {
            vertical-align: middle;
        }
    </style>

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
                            <center>
                                <div class="panel-title">
                                    <h3>
                                        <?php echo $title; ?>
                                    </h3>
                                </div>
                            </center>
                        </div>




                        <?php

                        if ($trans == 0) {
                            echo "<form action='" . base_url('ref/checkout') . "' role='form' method='POST' class='validate' novalidate='novalidate'>
                            <input type='hidden' value='" . $this->session->userdata('log_id') . "' name='id_member'>
                            <input type='hidden' value='1' name='id_produk_bundle'>
                            <input type='hidden' value='495999' name='total'>
                            <button type='submit' name='submit' value='checkout' class='btn btn-lg btn-red btn-block'>KLIK DISINI UNTUK MEMBELI PAKET</button>
                            </form>";
                        } elseif ($trans == 1) { } ?>

                        <div class="panel-body with-table">

                            <script type="text/javascript">
                                jQuery(document).ready(function($) {
                                    var $table1 = jQuery('#table-1');
                                    $table1.DataTable({
                                        "aLengthMenu": [
                                            [10, 25, 50, -1],
                                            [10, 25, 50, "All"]
                                        ],
                                        "bStateSave": true
                                    });
                                    $table1.closest('.dataTables_wrapper').find('select').select2({
                                        minimumResultsForSearch: -1
                                    });
                                });
                            </script>

                            <table class="table table-bordered responsive datatable" id="table-1">

                                <thead>
                                    <tr class="replace-inputs">
                                        <th width="1%">No</th>
                                        <th width="50%">Nama Kelas</th>
                                        <th width="49%" class="text-center">100 Video</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($produk as $p) {
                                        $no++;
                                        echo "<tr class='odd gradeX'>
                                            <td class='text-center'>$no</td>
                                            <td><img src='" . base_url('assets/upload/produk/') . "" . $p->img_1 . "' height='100'><font color='black'>$p->nama_produk</font></td>
                                            <td valign='middle' class='text-center'>";

                                        if ($p->status_2 == 0) {
                                            echo "<a class='btn btn-lg btn-danger' href='#' disabled><i class='entypo-basket'></i> Anda belum membeli paket</a>";
                                        } elseif ($p->status_2 == 1) {
                                            echo "<a class='btn btn-lg btn-warning' href='#' disabled><i class='entypo-hourglass'></i> Belum Dikonfirmasi</a>";
                                        } elseif ($p->status_2 == 2) {
                                            echo "<a class='btn btn-lg btn-danger' href='" . base_url('member/kelas/') . "$p->id_produk'>Tonton Video <i class='entypo-video'></i></a>";
                                        }

                                        echo "<br><br><font color='black'>$p->total_video Video</font>";
                                        echo "</td></tr>";
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

    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>css/font-icons/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>js/datatables/datatables.css">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>js/select2/select2.css">

    <script src="<?php echo base_url() ?>/assets/js/gsap/TweenMax.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/joinable.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/resizeable.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/neon-api.js"></script>

    <script src="<?php echo base_url() ?>/assets/js/datatables/datatables.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/select2/select2.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/neon-chat.js"></script>

    <script src="<?php echo base_url() ?>/assets/js/neon-custom.js"></script>

    <script src="<?php echo base_url() ?>/assets/js/neon-demo.js"></script>


    <div class="modal fade" id="modal-filter-produk" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Filter Produk</h4>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <!-- <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button> -->
                                <a class="btn btn-success" href="<?php echo base_url('member/produk/d') ?>"><i class="fa fa-check"></i> Dibeli</a>
                                <a class="btn btn-warning" href="<?php echo base_url('member/produk/b') ?>"><i class="fa fa-close"></i> Belum dibeli</a>
                                <a class="btn btn-info" href="<?php echo base_url('member/produk/g') ?>"><i class="fa fa-cart-arrow-down"></i> Gratis</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>