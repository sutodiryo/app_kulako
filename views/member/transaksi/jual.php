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

            <?php echo $this->session->flashdata('report'); ?>

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
                                        <th width="5%" class="text-center">No</th>
                                        <th width="20%">Pembeli</th>
                                        <th width="15%" class="text-center">Kontak</th>
                                        <th width="20%">Produk</th>
                                        <th width="10%" class="text-center">Tanggal Beli</th>
                                        <th width="30%" class="text-center">Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($jual as $j) {
                                        $no++;
                                        echo "<tr class='odd gradeX'>
                                        <td class='text-center'>$no</td>
                                        <td>$j->member</td>
                                        <td class='text-center'><a type='button' class='btn btn-xs btn-green btn-icon icon-left' href='https://api.whatsapp.com/send?phone=62$j->kontak&text='>$j->kontak<i class='fa fa-whatsapp'></i></a></td>
                                        <td>$j->produk $j->produk_bundle <font color='blue'>(Rp " . number_format($j->total, 0, ",", ".") . ")</font></td>
                                        <td class='text-center'><a class='btn btn-xs btn-primary'>$j->tgl_checkout</a></td>";

                                        echo "<td class='text-center'>";
                                        if ($j->status == 0) {
                                            echo "<a type='button' class='btn btn-xs btn-orange btn-icon icon-left'>Belum dibayar<i class='fa fa-refresh'></i></a>";
                                        } elseif ($j->status == 1) {
                                            echo "<a type='button' class='btn btn-xs btn-orange btn-icon icon-left'>Belum dibayar<i class='fa fa-refresh'></i></a>";
                                            // echo "<a type='button' class='btn btn-xs btn-green btn-icon icon-left'>Sudah dibayar ( $j->tgl_bayar )<i class='fa fa-check'></i></a>";
                                        } elseif ($j->status == 2) {
                                            echo "<a type='button' class='btn btn-xs btn-green btn-icon icon-left'>Dikonfirmasi<i class='fa fa-check'></i></a>";
                                        }
                                        echo "</td>
                                        </tr>";
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