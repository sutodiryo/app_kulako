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

            <?php echo $this->session->flashdata('report'); ?>
            <?php $this->session->set_userdata('referred_invoice', current_url()); ?>

            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h3>
                                    <?php echo $title; ?>
                                </h3>
                            </div>

                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                            </div>
                        </div>

                        <div class="panel-body with-table">

                            <script type="text/javascript">
                                jQuery(document).ready(function($) {
                                    var $table3 = jQuery("#table-3");

                                    var table3 = $table3.DataTable({
                                        "aLengthMenu": [
                                            [10, 25, 50, -1],
                                            [10, 25, 50, "All"]
                                        ]
                                    });

                                    $table3.closest('.dataTables_wrapper').find('select').select2({
                                        minimumResultsForSearch: -1
                                    });

                                    $('#table-3 tfoot th').each(function() {
                                        var title = $('#table-3 thead th').eq($(this).index()).text();
                                        $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
                                    });

                                    table3.columns().every(function() {
                                        var that = this;

                                        $('input', this.footer()).on('keyup change', function() {
                                            if (that.search() !== this.value) {
                                                that
                                                    .search(this.value)
                                                    .draw();
                                            }
                                        });
                                    });
                                });
                            </script>

                            <table class="table table-bordered responsive datatable" id="table-3">

                                <thead>
                                    <tr class="replace-inputs">
                                        <th width="5%" class="text-center"></th>
                                        <th width="40%">Produk</th>
                                        <th width="20%" class="text-center">Status</th>
                                        <th width="15%">Total</th>
                                        <th width="20%" class="text-center">Tanggal Checkout</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($beli as $b) {
                                        $no++;
                                        echo "<tr class='odd gradeX'>
                                        <td class='text-center' style=\"vertical-align: middle; \">$no</td>
                                        <td style=\"vertical-align: middle; \">$b->produk $b->produk_bundle</td>";
                                        echo "<td style=\"vertical-align: middle; \">";

                                        if ($b->status == 0) {
                                            echo "<a href='" . base_url() . "member/konfirmasi/$b->id_transaksi' type='button' class='btn btn-red btn-icon icon-left'>Upload Bukti Transfer<i class='fa fa-upload'></i></a>
                                            <a href='https://api.whatsapp.com/send?phone=6285220007411&text#532033$b->id_transaksi' class='btn btn-green btn-icon icon-left'>Konfirmasi Lewat WA<i class='fa fa-whatsapp'></i></a>";
                                        } elseif ($b->status == 1) {
                                            echo "<a href='" . base_url() . "assets/upload/bukti/$b->bukti_transfer' target='_blank' type='button' class='btn btn-green btn-icon icon-left'>Bukti Sudah Diupload<i class='fa fa-check'></i></a>";
                                        } elseif ($b->status == 2) {
                                            echo "<a href='" . base_url() . "member/invoice/$b->id_transaksi' type='button' class='btn btn-green btn-icon icon-left'>Pembayaran Diterima ( $b->tgl_bayar )<i class='fa fa-check'></i></a>";
                                        } elseif ($b->status == 3) {
                                            echo "<a type='button' class='btn btn-red btn-icon icon-left'>Dibatalkan<i class='fa fa-close'></i></a>";
                                        }

                                        echo "</td>
                                        <td style=\"vertical-align: middle; \">Rp $b->total</td>
                                        <td class='text-center' style=\"vertical-align: middle; \"><a class='btn btn-default btn-icon icon-left'><i class='fa fa-calendar-check-o'></i>$b->tgl_checkout</a></td>";
                                        // echo "<td class='center'>$b->member</td>";

                                        echo "</tr>";
                                    } ?>
                                </tbody>

                                <tfoot>
                                    <tr>
                                    </tr>
                                </tfoot>

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

</body>

</html>