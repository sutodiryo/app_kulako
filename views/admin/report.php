<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="description" content="<?php echo MAIN_DESC ?>">
    <meta name="author" content="" />

    <link rel="icon" href="<?php echo ADMIN_ASSETS ?>images/favicon.ico">

    <title>Laporan Penjualan Affiliate <?php if (empty($tgl_1) && empty($tgl_2)) {
                                            echo "Sepanjang Waktu";
                                        } else {
                                            echo "$tgl_1 - $tgl_2";
                                        }
                                        ?></title>

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

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h3>
                                    <?php echo $title; ?>
                                </h3>
                            </div>

                            <div class="panel-options">
                                <a data-toggle="modal" href="#modal-filter-report"><i class="fa fa-filter"></i> Filter</a>
                            </div>

                        </div>

                        <div class="panel-body with-table">

                            <script type="text/javascript">
                                jQuery(document).ready(function($) {
                                    var $table4 = jQuery("#table-4");

                                    $table4.DataTable({
                                        dom: 'Bfrtip',
                                        buttons: [
                                            'copyHtml5',
                                            'excelHtml5',
                                            'pdfHtml5'
                                        ]
                                    });
                                });
                            </script>

                            <table class="table table-bordered responsive datatable" id="table-4">

                                <?php echo $this->session->flashdata('report'); ?>

                                <thead>
                                    <tr class="replace-inputs">
                                        <th width="5%">No</th>
                                        <th width="25%">
                                            <font color='black'>Nama Affiliate</font>
                                        </th>
                                        <th width="10%" class="text-center">
                                            <font color="green">Penjualan Pribadi</font>
                                        </th>
                                        <th width="20%">
                                            <font color="red">Komisi</font>
                                        </th>

                                        <th width="10%" class="text-center">
                                            <font color="black">Jumlah Team</font>
                                        </th>
                                        <th width="10%" class="text-center">
                                            <font color="blue">Penjualan Team</font>
                                        </th>
                                        <th width="20%">
                                            <font color="red">Fee</font>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if (empty($member)) {
                                        echo "<tr class='odd gradeX'><td>Kosong...</td><td></td><td></td><td></td><td></td><td></td></tr>";
                                    } else {
                                        $no = 0;
                                        foreach ($member as $m) {
                                            $no++;
                                            echo "<tr class='odd gradeX'>
                                            <td class='text-center'>$no</td>
                                            <td><font color='black'>$m->nama</font></td>

                                            <td class='text-center'><font color='green'>$m->penjualan</font></td>
                                            <td><font color='red'>Rp " . number_format(($m->penjualan * 100000), 0, ",", ".") . "</font></td>

                                            <td class='text-center'><font color='black'>$m->team</font></td>
                                            <td class='text-center'><font color='blue'>$m->penjualan_team</font></td>
                                            <td><font color='red'>Rp " . number_format(($m->penjualan_team * 30000), 0, ",", ".") . "</font></td>
                                            </tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
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

    <script src="<?php echo ADMIN_ASSETS ?>js/gsap/TweenMax.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/bootstrap.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/joinable.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/resizeable.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/neon-api.js"></script>

    <script src="<?php echo ADMIN_ASSETS ?>js/datatables/datatables.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/select2/select2.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/neon-chat.js"></script>

    <script src="<?php echo ADMIN_ASSETS ?>js/neon-custom.js"></script>

    <script src="<?php echo ADMIN_ASSETS ?>js/neon-demo.js"></script>


    <div class="modal fade" id="modal-filter-report" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Filter Report</h4>
                </div>

                <form action="<?php echo base_url('admin/report') ?>" method="POST">
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

</body>

</html>