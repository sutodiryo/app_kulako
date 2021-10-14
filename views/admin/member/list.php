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
                                <a data-toggle="modal" href="#modal-filter-member"><i class="fa fa-filter"></i> Filter</a>
                                <a data-toggle="modal" href="#modal-tambah-member"><i class="fa fa-plus-square"></i> Tambah Member</a>
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
                                        <th width="1%"></th>
                                        <th width="20%">Nama</th>
                                        <th width="15%">No Hanphone</th>
                                        <th width="15%">Kota</th>
                                        <th width="25%">Alamat</th>
                                        <th width="10%" class='text-center'>Page</th>
                                        <th width="19%" class='text-center'>Action</th>
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
                                            <td><a href='" . base_url('admin/member_detail/') . "$m->id_member' title='Lihat Detail'>$m->nama</a></td>";
                                            echo "<td>
                                                <a class='btn btn-sm btn-success' href='https://api.whatsapp.com/send/?phone=62$m->no_hp&text' title='Follow Up'><i class='fa fa-whatsapp'></i> $m->no_hp</a>
                                            </td>";
                                            echo "<td>$m->kota_kab</td>";
                                            echo "<td>
                                                <textarea cols='30' rows='3' disabled>$m->alamat</textarea>
                                                </td>";
                                            echo "<td>$m->id_page</td>";
                                            echo "<td class='text-center'>
                                            <a class='btn btn-xs btn-info' href='#' title='Edit Member'><i class='entypo-pencil'></i></a>
                                            <a class='btn btn-xs btn-orange' href='" . base_url('admin/act/resetpassword/') . "$m->id_member' title='Reset Password Member' onclick=\"return confirm('Anda yakin ingin mereset password akun ini?')\"><i class='entypo-lock'></i></a>
                                            <a class='btn btn-xs btn-danger' href='" . base_url() . "admin/del/member/$m->id_member' onclick=\"return confirm('Anda yakin ingin menghapus data ini?')\" title=\"Hapus\"><i class='entypo-trash'></i></a>
                                            </td></tr>";
                                        }
                                    }
                                    ?>
                                </tbody>

                                <tfoot>
                                    <tr class="replace-inputs">
                                        <th width="1%"></th>
                                        <th width="20%">Nama</th>
                                        <th width="15%">No Hanphone</th>
                                        <th width="15%">Kota</th>
                                        <th width="25%">Alamat</th>
                                        <th width="10%" class='text-center'>Page</th>
                                        <th width="19%" class='text-center'>Action</th>
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


    <div class="modal fade" id="modal-filter-member" style="display: none;">
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

    <div class="modal fade" id="modal-tambah-member" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Tambah Member Baru</h4>
                </div>

                <form action="<?php echo base_url('admin/act/add_member') ?>" method="POST">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nama_member" placeholder="Nama Kota/Kabupaten" required="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="kode_member" placeholder="Kode member" required="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="admin" placeholder="Username Admin" required="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password Admin" required="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="alamat_kantor" placeholder="Alamat lengkap kantor cabang" required="">
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="latitude" placeholder="Latitude">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="longitude" placeholder="Longitude">
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