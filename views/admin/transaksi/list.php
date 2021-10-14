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
                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                            </div>
                        </div>

                        <?php echo $this->session->flashdata('report'); ?>

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
                                        <!-- <th width="20%">Produk</th> -->
                                        <th width="25%">Pembeli</th>
                                        <th width="25%">Affiliate</th>
                                        <!-- <th width="10%">Total</th> -->
                                        <th width="10%">Status</th>
                                        <th width="35%" class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($transaksi as $t) {
                                        $no++;
                                        echo "<tr class='odd gradeX'>
                                        <td class='text-center'>$no</td>";
                                        // <td>$t->produk $t->produk_bundle</td>
                                        echo "<td>$t->member<br>$t->email</td>
                                        <td>";
                                        if (empty($t->aff)){
                                            echo "<font color='red'>Official</font>";
                                        } else{
                                            echo $t->aff;
                                        } echo "</td>";
                                        // <td>Rp " . number_format($t->total, 0, ",", ".") . "</td>";

                                        echo "<td>";
                                        if ($t->status == 0) {
                                            echo "<span class='badge badge-danger'>Belum Transfer<i class='entypo-arrows-ccw'></i></span>";
                                        } elseif ($t->status == 1) {
                                            echo "<span class='badge badge-primary'>Bukti diupload<i class='entypo-arrows-ccw'></i></span>";
                                        } elseif ($t->status == 2) {
                                            echo "<span class='badge badge-info'>Approved<i class='entypo-check'></i></span>";
                                        } elseif ($t->status == 3) {
                                            echo "<span class='badge badge-danger'>Dibatalkan<i class='entypo-cancel'></i></span>";
                                        }
                                        echo "</td>";

                                        echo "<td><a class='btn btn-xs btn-info' href='" . base_url('admin/set/transaksi/2/') . "$t->id_transaksi'>Approve <i class='fa fa-check'></i></a>
                                        <a class='btn btn-xs btn-danger' href='" . base_url('admin/set/transaksi/0/') . "$t->id_transaksi''>Batal <i class='fa fa-close'></i></a>
                                        <a class='btn btn-xs btn-success' href='https://api.whatsapp.com/send?phone=62$t->no_hp'>WA <i class='fa fa-whatsapp'></i></a>
                                        <a class='btn btn-xs btn-black' href='" . base_url('admin/del/transaksi/') . "$t->id_transaksi''  onclick=\"return confirm('Data yang dihapus tidak bisa dikembalikan, anda yakin ingin menghapus data ini ?');\">Hapus <i class='fa fa-trash'></i></a>";

                                        // if ($t->status == 0) {
                                        //     echo "<a class='btn btn-xs btn-danger' href='" . base_url('admin/set/transaksi/') . "'>Batal <i class='fa fa-close'></i></a>";
                                        // } elseif ($t->status == 1) {
                                        //     echo "  <a class='btn btn-xs btn-primary' href='" . base_url('assets/upload/') . "'>Lihat Bukti <i class='fa fa-eye'></i></a> 
                                        //             <a class='btn btn-xs btn-success' href='https://api.whatsapp.com/send?phone=62$t->no_hp'>Konfirmasi <i class='fa fa-whatsapp'></i></a>
                                        //             <a class='btn btn-xs btn-danger' href='" . base_url('admin/set/transaksi/') . "'>Batal <i class='fa fa-close'></i></a>";
                                        // } elseif ($t->status == 2) {
                                        //     echo "";
                                        // } elseif ($t->status == 3) {
                                        //     echo "<a class='btn btn-xs btn-warning' href='" . base_url('admin/set/transaksi/') . "'>Belum dibayar<i class='fa fa-refresh'></i></a>";
                                        // }

                                        // echo "<a class='btn btn-xs btn-danger' href='" . base_url() . "admin/del/transaksi/$t->id_transaksi' onclick=\"return confirm('Anda yakin ingin menghapus data ini?')\" title=\"Hapus\"><i class='fa fa-trash'></i></a>";

                                        echo "</td></tr>";
                                    } ?>
                                </tbody>

                                <tfoot>
                                        <th width="5%" class="text-center"></th>
                                        <!-- <th width="20%">Produk</th> -->
                                        <th width="25%">Pembeli</th>
                                        <th width="25%">Affiliate</th>
                                        <!-- <th width="10%">Total</th> -->
                                        <th width="10%">Status</th>
                                        <th width="35%" class="text-center">Action</th>
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

</body>

</html>