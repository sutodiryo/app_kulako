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

    <style>
        table.dataTable tbody td {
            vertical-align: middle;
        }
    </style>
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
                                <a class="bg" style="background-color: green;" href="#" onclick="link_aff('<?php echo $this->session->userdata('log_id') ?>')">
                                    <font color="white"><i class="entypo-flow-tree"></i> Copy link calon team</font>
                                </a>
                                <input style="position:absolute; left:-9999px" type="text" id="aff_link" value="<?php echo "" . base_url('reg/affiliate/') . "" . $this->session->userdata('log_id') . ""; ?>">
                                <!-- <i href="#" data-rel="collapse"><i class="entypo-down-open"></i></a> -->

                            </div>
                        </div>

                        <div class="panel-body with-table">

                            <script type="text/javascript">
                                jQuery(document).ready(function($) {
                                    var $table1 = jQuery('#table-1');

                                    // Initialize DataTable
                                    $table1.DataTable({
                                        "aLengthMenu": [
                                            [10, 25, 50, -1],
                                            [10, 25, 50, "All"]
                                        ],
                                        "bStateSave": true
                                    });
                                    // Initalize Select Dropdown after DataTables is created
                                    $table1.closest('.dataTables_wrapper').find('select').select2({
                                        minimumResultsForSearch: -1
                                    });
                                });
                            </script>

                            <table class="table table-bordered responsive datatable" id="table-1">

                                <thead>
                                    <tr class="replace-inputs">
                                        <th width="5%"></th>
                                        <th width="50%" class="text-center">Link</th>
                                        <th width="30%">Nama</th>
                                        <th width="15%">Harga</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if (empty($produk)) {
                                        echo "<tr class='odd gradeX'><td>Kosong...</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
                                    } else {
                                        $no = 0;
                                        foreach ($produk as $p) {
                                            $no++;
                                            echo "<tr class='odd gradeX'>
                                            <td class='text-center'>$no</td>

                                            <td valign='middle' class='text-center'>
                                            <div class='input-group'><input type='text' class='form-control' id='link_" . $p->id_produk_bundle . "' value='" . base_url('ref/p/') . "" . $this->session->userdata('log_id') . "/$p->id_produk_bundle'><span class='input-group-btn'>
                                            <button class='btn btn-danger' type='button' onclick=\"copy('" . $p->id_produk_bundle . "')\">Copy Link untuk calon pembeli</button></span></div>
                                            </td>
                                            
                                            <td><img src='" . base_url('assets/upload/produk/') . "" . $p->cover . "' height='100'>$p->nama_bundle</td>
                                            

                                            <td valign='middle'>Rp <strike>" . number_format($p->harga_) . "</strike><br><font color='red'>Rp " . number_format($p->harga) . "</font></td>                                            
                                            </tr>";
                                        }
                                    }
                                    ?>

                                </tbody>

                                <tfoot>
                                </tfoot>

                            </table>

                            <script type="text/javascript">
                                function copy(id) {
                                    var copyText = document.getElementById("link_" + id);
                                    copyText.select();
                                    document.execCommand("copy");
                                    alert("Link sudah tercopy: " + copyText.value);
                                }

                                function link_aff(id) {
                                    var copyText = document.getElementById("aff_link");
                                    copyText.select();
                                    document.execCommand("copy");
                                    alert("Link affiliate sudah tercopy: " + copyText.value);
                                }
                            </script>

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