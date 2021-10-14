<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <meta name="description" content="<?php echo MAIN_DESC ?>">
    <title><?php echo MAIN_TITLE ?></title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="<?php echo base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/vendors/line-awesome/css/line-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/vendors/animate.css/animate.min.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/vendors/toastr/toastr.min.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="<?php echo base_url()?>assets/vendors/dataTables/datatables.min.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="<?php echo base_url()?>assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
</head>

<body>
    <div class="page-wrapper">

        <!-- START SIDEBAR-->
        <?php $this->load->view('_part/sidebar'); ?>
        <!-- END SIDEBAR-->

        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Datatables</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="la la-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item">Datatables</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-body">
                        <h5 class="font-strong mb-4">DATATABLE</h5>
                        <div class="flexbox mb-4">
                            <div class="flexbox">
                                <label class="mb-0 mr-2">Type:</label>
                                <select class="selectpicker show-tick form-control" id="type-filter" title="Please select" data-style="btn-solid" data-width="150px">
                                    <option value="">All</option>
                                    <option>Active</option>
                                    <option>Completed</option>
                                    <option>Pending</option>
                                    <option>Canceled</option>
                                </select>
                            </div>
                            <div class="input-group-icon input-group-icon-left mr-3">
                                <span class="input-icon input-icon-right font-16"><i class="ti-search"></i></span>
                                <input class="form-control form-control-rounded form-control-solid" id="key-search" type="text" placeholder="Search ...">
                            </div>
                        </div>
                        <div class="table-responsive row">
                            <table class="table table-bordered table-hover" id="datatable">
                                <thead class="thead-default thead-lg">
                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>Customer</th>
                                        <th>Status</th>
                                        <th class="no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($content as $c)
                                    {
                                        echo "<tr>
                                            <td><a href='javascript:;'>$c->id_value</a></td>
                                            <td>$c->icon</td>
                                            <td>$c->value</td>
                                            <td>
                                                <span class='badge badge-success badge-pill'>Active</span>
                                            </td>
                                            <td>
                                                <a class='text-muted font-16' href='javascript:;'><i class='ti-trash'></i></a>
                                            </td>
                                        </tr>";
                                    } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
            <footer class="page-footer">
                <div class="font-13">2018 © <b>Adminca</b> - Save your time, choose the best</div>
                <div>
                    <a class="px-3 pl-4" href="http://themeforest.net/item/adminca-responsive-bootstrap-4-3-angular-4-admin-dashboard-template/20912589" target="_blank">Purchase</a>
                    <a class="px-3" href="http://admincast.com/adminca/documentation.html" target="_blank">Docs</a>
                </div>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>

    </div>

    <!-- START SEARCH PANEL-->
    <form class="search-top-bar" action="http://admincast.com/adminca/preview/admin_2/html/search.html">
        <input class="form-control search-input" type="text" placeholder="Search...">
        <button class="reset input-search-icon"><i class="ti-search"></i></button>
        <button class="reset input-search-close" type="button"><i class="ti-close"></i></button>
    </form>
    <!-- END SEARCH PANEL-->

    <!-- BEGIN THEME CONFIG-->
    <?php $this->load->view('_part/rightpanel'); ?>
    <!-- END THEME CONFIG-->

    <!-- New question dialog-->
    <div class="modal fade" id="session-dialog">
        <div class="modal-dialog" style="width:400px;" role="document">
            <div class="modal-content timeout-modal">
                <div class="modal-body">
                    <button class="close" data-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mt-3 mb-4"><i class="ti-lock timeout-icon"></i></div>
                    <div class="text-center h4 mb-3">Set Auto Logout</div>
                    <p class="text-center mb-4">You are about to be signed out due to inactivity.<br>Select after how many minutes of inactivity you log out of the system.</p>
                    <div id="timeout-reset-box" style="display:none;">
                        <div class="form-group text-center">
                            <button class="btn btn-danger btn-fix btn-air" id="timeout-reset">Deactivate</button>
                        </div>
                    </div>
                    <div id="timeout-activate-box">
                        <form id="timeout-form" action="javascript:;">
                            <div class="form-group pl-3 pr-3 mb-4">
                                <input class="form-control form-control-line" type="text" name="timeout_count" placeholder="Minutes" id="timeout-count">
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary btn-fix btn-air" id="timeout-activate">Activate</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End New question dialog-->

    <script src="<?php echo base_url()?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/metisMenu/dist/metisMenu.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/jquery-idletimer/dist/idle-timer.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/toastr/toastr.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="<?php echo base_url()?>assets/vendors/dataTables/datatables.min.js"></script>
    <!-- CORE SCRIPTS-->
    <script src="<?php echo base_url()?>assets/js/app.min.js"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script>
        $(function() {
            $('#datatable').DataTable({
                pageLength: 10,
                fixedHeader: true,
                responsive: true,
                "sDom": 'rtip',
                columnDefs: [{
                    targets: 'no-sort',
                    orderable: false
                }]
            });

            var table = $('#datatable').DataTable();
            $('#key-search').on('keyup', function() {
                table.search(this.value).draw();
            });
            $('#type-filter').on('change', function() {
                table.column(4).search($(this).val()).draw();
            });
        });
    </script>

</body>

</html>