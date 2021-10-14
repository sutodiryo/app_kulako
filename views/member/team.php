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

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h3>
                                    <?php echo $title; ?>
                                </h3>
                            </div>

                            <div class="panel-options">
                                <a data-toggle="modal" href="#modal-filter-stats"><i class="fa fa-filter"></i> Filter</a>
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

                            <table class="table table-bordered datatable" id="table-4">

                                <?php echo $this->session->flashdata('report'); ?>

                                <thead>
                                    <tr class="replace-inputs">
                                        <th width="5%">No</th>
                                        <th width="30%">Nama Affiliate</th>
                                        <th width="15%" class='text-center'>Total Penjualan</th>
                                        <th width="50%" class='text-center'>Kontak</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if (empty($team)) {
                                        echo "<tr class='odd gradeX'><td>Kosong...</td><td></td><td></td><td></td><td></td><td></td></tr>";
                                    } else {
                                        $no = 0;
                                        foreach ($team as $m) {
                                            $no++;
                                            echo "<tr class='odd gradeX'>
                                            <td class='text-center'>$no</td>
                                            <td>$m->nama</td>
                                            <td class='text-center'><font color='red'>$m->penjualan</font></td>
                                            <td class='text-center'>
                                            <a class='btn btn-sm btn-success' href='https://api.whatsapp.com/send?phone=62$m->no_hp'>$m->no_hp <i class='fa fa-whatsapp'></i></a>
                                            </td></tr>";
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


    <div class="modal fade" id="modal-filter-stats" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Filter Member</h4>
                </div>

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <a class="btn btn-info" href="<?php echo base_url('admin/member/list') ?>"><i class="fa fa-list"></i> Semua</a>
                                <a class="btn btn-success" href="<?php echo base_url('admin/member/aktif') ?>"><i class="fa fa-check"></i> Aktif</a>
                                <a class="btn btn-warning" href="<?php echo base_url('admin/member/pending') ?>"><i class="fa fa-refresh"></i> Pending</a>
                                <a class="btn btn-danger" href="<?php echo base_url('admin/member/banned') ?>"><i class="fa fa-close"></i> Banned</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>