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

            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h3>
                                    <?php echo $title; ?> <?php if (empty($tgl_1) && empty($tgl_2)) {
                                                                echo "";
                                                            } else {
                                                                echo "Tanggal $tgl_1 - $tgl_2";
                                                            }
                                                            ?>
                                </h3>
                            </div>

                            <div class="panel-options">
                                <!-- <i href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> -->
                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                                <!-- <a data-toggle="modal" href="#modal-filter-komisi"><i class="fa fa-filter"></i> Filter</a> -->
                            </div>

                        </div>

                        <div>
                            <form action="<?php echo base_url('member/transaksi/komisi') ?>" method="POST">
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="field-1" class="control-label">Tanggal Awal</label>
                                                <input type="date" class="form-control" id="field-1" name="tgl_1" required>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="field-2" class="control-label">Tanggal Akhir</label>
                                                <input type="date" class="form-control" id="field-2" name="tgl_2" required>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="field-2" class="control-label">Filter</label>
                                                <button type="submit" class="form-control btn btn-info"><i class="fa fa-filter"></i> Filter</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="panel-body with-table">
                            <a class="btn btn-block btn-red btn-icon icon-left">Total Komisi + Fee : <?php $total = (($totalk * 100000) + ($totalf * 30000));
                                                                                                        echo "Rp " . number_format($total, 0, ",", ".") . ""; ?></a>

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
                                        <th width="2%" class="text-center">No</th>
                                        <th width="48%">Pembeli</th>
                                        <th width="25%">Komisi</th>
                                        <th width="25%">Fee</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($komisi as $k) {
                                        $no++;
                                        echo "<tr class='odd gradeX'>
                                        <td class='text-center'>$no</td>";

                                        if ($k->id_affiliate == $this->session->userdata('log_id')) {
                                            echo "
                                            <td class='center'>$k->member<br>(Penjualan Pribadi)</td>
                                            <td>Rp " . number_format(100000, 0, ",", ".") . "</td>
                                            <td>-</td>";
                                        } else {
                                            echo "
                                            <td class='center'>$k->member<br>($k->aff)</td>
                                            <td>-</td>
                                            <td>Rp " . number_format(30000, 0, ",", ".") . "</td>";
                                        }


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



    <div class="modal fade" id="modal-filter-komisi" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Filter Komisi</h4>
                </div>

                <form action="<?php echo base_url('member/transaksi/komisi') ?>" method="POST">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-1" class="control-label">Tanggal Awal</label>
                                    <input type="date" class="form-control" id="field-1" name="tgl_1">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Tanggal Akhir</label>
                                    <input type="date" class="form-control" id="field-2" name="tgl_2">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
                    </div>

                </form>
            </div>
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