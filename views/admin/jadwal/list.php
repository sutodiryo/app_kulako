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

            <h3><?php echo $title; ?></h3>
            <br />

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

            <table class="table table-bordered datatable" id="table-3">

                <thead>
                    <tr class="replace-inputs">
                        <th width="5%" class="text-center">Kode</th>
                        <th width="30%">Nama Area</th>
                        <th width="60%" class="text-center">Jadwal</th>
                        <th width="5%" class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($jadwal as $j) {
                        echo "<tr class='odd gradeX'>
                        <td class='text-center'>$j->id_area</td>
                        <td>$j->nama_area</td>";	

                        echo "  <td class='text-center'>
                                    <a type='button' class='btn btn-info btn-icon'>$j->jadwal0 Diagendakan<i class='fa fa-refresh'></i></a>
                                    <a type='button' class='btn btn-orange btn-icon'>$j->jadwal1 Pending<i class='fa fa-pause'></i></a>
                                    <a type='button' class='btn btn-red btn-icon'>$j->jadwal2 Dibatalkan<i class='fa fa-close'></i></a>
                                    <a type='button' class='btn btn-green btn-icon'>$j->jadwal3 Sesuai Jadwal<i class='fa fa-check'></i></a>
                                </td>";

                        echo "<td class='text-center'>
                                    <a class='btn btn-info' href='".base_url('admin/jadwal/')."$j->id_area'><i class='fa fa-eye'></i></a>
                                </td>";
                        echo "</tr>";
                    } ?>
                </tbody>

                <tfoot>
                    <tr>
                        <th width="5%" class="text-center">Kode Area</th>
                        <th width="25%">Nama Area</th>
                        <th width="65%" class="text-center">Jadwal</th>
                        <th width="5%" class="text-center">Action</th>
                    </tr>
                </tfoot>

            </table>

            <br />

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