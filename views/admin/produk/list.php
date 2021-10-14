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
                                <a data-toggle="modal" href="#modal-tambah-produk"><i class="fa fa-plus-square"></i> Tambah Produk</a>
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

                                <?php echo $this->session->flashdata('report'); ?>

                                <thead>
                                    <tr class="replace-inputs">
                                        <th width="5%"></th>
                                        <th width="40%">Nama</th>
                                        <th width="15%">harga</th>
                                        <th width="10%" class="text-center">Status</th>
                                        <th width="35%" class="text-center">Edit</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($produk as $p) {
                                        $no++;
                                        echo "<tr class='odd gradeX'>
                                            <td class='text-center'>$no</td>
                                            <td><img src='" . base_url('assets/upload/produk/') . "" . $p->img_1 . "' height='50'>$p->nama_produk</td>
                                            <td>Rp <strike>" . number_format($p->harga_) . "</strike><br><font color='red'>Rp " . number_format($p->harga) . "</font></td>";
                                        echo "<td class='text-center'>";
                                        if ($p->status == 0) {
                                            echo "<a type='button' class='btn btn-xs btn-orange btn-icon'>Pending<i class='fa fa-refresh'></i></a>";
                                        } elseif ($p->status == 1) {
                                            echo "<a type='button' class='btn btn-xs btn-green btn-icon'>Aktif<i class='fa fa-check'></i></a>";
                                        } elseif ($p->status == 2) {
                                            echo "<a type='button' class='btn btn-xs btn-red btn-icon'>Tidak Aktif<i class='fa fa-close'></i></a>";
                                        }
                                        echo "</td>";
                                        // <td class='center'>$p->status</td>
                                        echo "<td class='text-center'>

                                            <a class='btn btn-xs btn-danger' href='" . base_url('admin/edit/produk_video/') . "$p->id_produk'>Video <i class='fa fa-play-circle'></i></a> 
                                            <a class='btn btn-xs btn-info' href='" . base_url('admin/edit/produk_link/') . "$p->id_produk'>Materi <i class='fa fa-link'></i></a>
                                            <a class='btn btn-xs btn-success' href='" . base_url('admin/edit/produk/') . "$p->id_produk'>Produk <i class='fa fa-tag'></i></a> ";
                                            
                                            // <a class='btn btn-xs btn-info' href='" . base_url('admin/produk_detail/') . "" . $p->id_produk . "'><i class='entypo-eye'></i></a>
                                            echo "<a class='btn btn-xs btn-danger' href='" . base_url() . "admin/del/produk/$p->id_produk' onclick=\"return confirm('Anda yakin ingin menghapus produk ini?')\" title=\"Hapus\"'>Hapus <i class='entypo-trash'></i></a>
                                            </td>
                                            </tr>";
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

    <div class="modal fade" id="modal-tambah-produk" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Tambah Produk Baru</h4>
                </div>

                <!-- <form action="<?php echo base_url('admin/add/produk') ?>" method="POST"> -->
                <?php echo form_open_multipart('admin/produk/act_add'); ?>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk" required="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="img_1" class="control-label">Foto Produk</label>
                                <input type="file" class="form-control" name="img_1" placeholder="Kode produk" required="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="harga" placeholder="Harga">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="harga_" placeholder="Harga Coret">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" name="keterangan" placeholder="Keterangan produk" required=""></textarea>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>