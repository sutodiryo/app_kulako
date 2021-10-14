<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <meta name="description" content="<?php echo MAIN_DESC ?>">
    <title><?php echo MAIN_TITLE ?></title>


    <!-- GLOBAL MAINLY STYLES-->
    <link href="<?php echo ADMIN_ASSETS ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo ADMIN_ASSETS ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo ADMIN_ASSETS ?>vendors/line-awesome/css/line-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo ADMIN_ASSETS ?>vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <link href="<?php echo ADMIN_ASSETS ?>vendors/animate.css/animate.min.css" rel="stylesheet" />
    <link href="<?php echo ADMIN_ASSETS ?>vendors/toastr/toastr.min.css" rel="stylesheet" />
    <link href="<?php echo ADMIN_ASSETS ?>vendors/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="<?php echo ADMIN_ASSETS ?>vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="<?php echo ADMIN_ASSETS ?>vendors/fullcalendar/dist/fullcalendar.print.min.css" rel="stylesheet" media="print" />
    <link href="<?php echo ADMIN_ASSETS ?>vendors/smalot-bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="<?php echo ADMIN_ASSETS ?>css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->


</head>

<body>
    <div class="page-wrapper">

        <!-- START SIDEBAR-->
        <?php $this->load->view('_part/sidebar'); ?>
        <!-- END SIDEBAR-->

        <!-- START CONTENT-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-content fade-in-up">

                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="ibox ibox-fullheight">
                                    <div class="ibox-body bg-success">
                                        <h5 class="text-center text-white mb-3">Statistics</h5>
                                        <div>
                                            <canvas id="chart_a" style="height:180px;"></canvas>
                                        </div>
                                    </div>
                                    <div class="ibox-body">
                                        <div class="text-lighter mb-2">Lorem Ipsum is simply dummy text</div>
                                        <div>
                                            <span class="h1 mr-3 text-success font-40">72.5%</span>
                                            <span class="text-lighter">34.5% Higher then last month</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="ibox ibox-fullheight">
                                    <div class="ibox-body bg-pink">
                                        <h5 class="text-center text-white mb-3">Statistics</h5>
                                        <div>
                                            <canvas id="chart_b" style="height:180px;"></canvas>
                                        </div>
                                    </div>
                                    <div class="ibox-body">
                                        <div class="text-lighter mb-2">Lorem Ipsum is simply dummy text</div>
                                        <div>
                                            <span class="h1 mr-3 text-pink font-40">72.5%</span>
                                            <span class="text-lighter">34.5% Higher</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="ibox ibox-fullheight">
                            <div class="ibox-head">
                                <div class="ibox-title">Statistik Nurul Ilmi</div>
                                <div class="ibox-tools">
                                    <a class="font-18" href="javascript:;"><i class="ti-control-record"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <ul class="media-list media-list-divider">
                                    <li class="media flexbox">
                                        <div>
                                            <div class="media-heading font-16">Peserta Didik</div>
                                            <div class="font-13 text-light">Total peserta didik semua area</div>
                                        </div>
                                        <h4 class="font-strong mb-0 ml-3 text-primary"><?php echo $peserta_didik; ?></h4>
                                    </li>
                                    <li class="media flexbox">
                                        <div>
                                            <div class="media-heading font-16">Pendidik</div>
                                            <div class="font-13 text-light">Total pendidik semua area</div>
                                        </div>
                                        <h4 class="font-strong mb-0 ml-3 text-success"><?php echo $pendidik; ?></h4>
                                    </li>
                                    <li class="media flexbox">
                                        <div>
                                            <div class="media-heading font-16">Area</div>
                                            <div class="font-13 text-light">Total area operasional</div>
                                        </div>
                                        <h4 class="font-strong mb-0 ml-3 text-warning"><?php echo $area; ?></h4>
                                    </li>
                                    <!-- <li class="media flexbox">
                                        <div>
                                            <div class="media-heading font-16">Customers</div>
                                            <div class="font-13 text-light">Lorem ipsum dolar set...</div>
                                        </div>
                                        <h4 class="font-strong mb-0 ml-3 text-pink">+725</h4>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">CALENDAR</div>
                        <button class="btn btn-primary btn-rounded btn-air my-3" data-toggle="modal" data-target="#new-event-modal">
                            <span class="btn-icon"><i class="la la-plus"></i>New Event</span>
                        </button>
                    </div>
                    <div class="ibox-body">
                        <div id="calendar"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8">
                        <div class="ibox ibox-fullheight">
                            <div class="ibox-head">
                                <div class="ibox-title">SUPPORT TICKETS</div>
                                <div class="ibox-tools">
                                    <a class="dropdown-toggle font-18" data-toggle="dropdown"><i class="ti-ticket"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item"><i class="ti-pencil mr-2"></i>Create</a>
                                        <a class="dropdown-item"><i class="ti-pencil-alt mr-2"></i>Edit</a>
                                        <a class="dropdown-item"><i class="ti-close mr-2"></i>Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <ul class="media-list media-list-divider scroller mr-2" data-height="470px">
                                    <li class="media">
                                        <div class="media-body d-flex">
                                            <div class="flex-1">
                                                <h5 class="media-heading">
                                                    <a href="javascript:;">How to install new Adminca</a>
                                                </h5>
                                                <p class="font-13 text-light mb-1">Cillum in incididunt reprehenderit qui reprehenderit nulla</p>
                                                <div class="d-flex align-items-center font-13">
                                                    <img class="img-circle mr-2" src="<?php echo ADMIN_ASSETS ?>img/users/u11.jpg" alt="image" width="22" />
                                                    <a class="mr-2 text-success" href="javascript:;">Tyrone Carroll</a>
                                                    <span class="text-muted">18 mins ago</span>
                                                </div>
                                            </div>
                                            <div class="text-right" style="width:100px;">
                                                <span class="badge badge-primary badge-pill mb-2">Open</span>
                                                <div><small class="text-muted font-12"><i class="fa fa-reply mr-2"></i>2 reply</small></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-body d-flex">
                                            <div class="flex-1">
                                                <h5 class="media-heading">
                                                    <a href="javascript:;">How to compile SaSS</a>
                                                </h5>
                                                <p class="font-13 text-light mb-1">Cillum in incididunt reprehenderit qui reprehenderit nulla</p>
                                                <div class="d-flex align-items-center font-13">
                                                    <img class="img-circle mr-2" src="<?php echo ADMIN_ASSETS ?>img/users/u10.jpg" alt="image" width="22" />
                                                    <a class="mr-2 text-success" href="javascript:;">Stella Obrien</a>
                                                    <span class="text-muted">45 mins ago</span>
                                                </div>
                                            </div>
                                            <div class="text-right" style="width:100px;">
                                                <span class="badge badge-success badge-pill mb-2">Pending</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-body d-flex">
                                            <div class="flex-1">
                                                <h5 class="media-heading">
                                                    <a href="javascript:;">I need help to update bower</a>
                                                </h5>
                                                <p class="font-13 text-light mb-1">Cillum in incididunt reprehenderit qui reprehenderit nulla</p>
                                                <div class="d-flex align-items-center font-13">
                                                    <img class="img-circle mr-2" src="<?php echo ADMIN_ASSETS ?>img/users/u6.jpg" alt="image" width="22" />
                                                    <a class="mr-2 text-success" href="javascript:;">Connor Perez</a>
                                                    <span class="text-muted">1 hrs ago</span>
                                                </div>
                                            </div>
                                            <div class="text-right" style="width:100px;">
                                                <span class="badge badge-primary badge-pill mb-2">In Progress</span>
                                                <div><small class="text-muted font-12"><i class="fa fa-reply mr-2"></i>2 reply</small></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-body d-flex">
                                            <div class="flex-1">
                                                <h5 class="media-heading">
                                                    <a href="javascript:;">IE7 problem</a>
                                                </h5>
                                                <p class="font-13 text-light mb-1">Cillum in incididunt reprehenderit qui reprehenderit nulla</p>
                                                <div class="d-flex align-items-center font-13">
                                                    <img class="img-circle mr-2" src="<?php echo ADMIN_ASSETS ?>img/users/u2.jpg" alt="image" width="22" />
                                                    <a class="mr-2 text-success" href="javascript:;">Becky Brooks</a>
                                                    <span class="text-muted">2 hrs ago</span>
                                                </div>
                                            </div>
                                            <div class="text-right" style="width:100px;">
                                                <span class="badge badge-success badge-pill mb-2">Pending</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-body d-flex">
                                            <div class="flex-1">
                                                <h5 class="media-heading">
                                                    <a href="javascript:;">I need help to install Adminca Angular</a>
                                                </h5>
                                                <p class="font-13 text-light mb-1">Cillum in incididunt reprehenderit qui reprehenderit nulla</p>
                                                <div class="d-flex align-items-center font-13">
                                                    <img class="img-circle mr-2" src="<?php echo ADMIN_ASSETS ?>img/users/u5.jpg" alt="image" width="22" />
                                                    <a class="mr-2 text-success" href="javascript:;">Bob Gonzalez</a>
                                                    <span class="text-muted">2 days ago</span>
                                                </div>
                                            </div>
                                            <div class="text-right" style="width:100px;">
                                                <span class="badge badge-secondary badge-pill mb-2">Closed</span>
                                                <div><small class="text-muted font-12"><i class="fa fa-reply mr-2"></i>3 reply</small></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox ibox-fullheight">
                            <div class="ibox-head">
                                <div class="ibox-title">Logs Timeline</div>
                                <div class="ibox-tools">
                                    <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item"> <i class="ti-pencil"></i>Create</a>
                                        <a class="dropdown-item"> <i class="ti-pencil-alt"></i>Edit</a>
                                        <a class="dropdown-item"> <i class="ti-close"></i>Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <ul class="timeline scroller" data-height="400px">
                                    <li class="timeline-item"><i class="ti-check timeline-icon"></i>2 Issue fixed<small class="float-right text-muted ml-2 nowrap">Just now</small></li>
                                    <li class="timeline-item"><i class="ti-announcement timeline-icon"></i>
                                        <span>7 new feedback
                                            <span class="badge badge-warning badge-pill ml-2">important</span>
                                        </span><small class="float-right text-muted">5 mins</small></li>
                                    <li class="timeline-item"><i class="ti-truck timeline-icon"></i>25 new orders sent<small class="float-right text-muted ml-2 nowrap">24 mins</small></li>
                                    <li class="timeline-item"><i class="ti-shopping-cart timeline-icon"></i>12 New orders<small class="float-right text-muted ml-2 nowrap">45 mins</small></li>
                                    <li class="timeline-item"><i class="ti-user timeline-icon"></i>18 new users registered<small class="float-right text-muted ml-2 nowrap">1 hrs</small></li>
                                    <li class="timeline-item"><i class="ti-harddrives timeline-icon"></i>
                                        <span>Server Error
                                            <span class="badge badge-success badge-pill ml-2">resolved</span>
                                        </span><small class="float-right text-muted">2 hrs</small></li>
                                    <li class="timeline-item"><i class="ti-info-alt timeline-icon"></i>
                                        <span>System Warning
                                            <a class="text-primary ml-2">Check</a>
                                        </span><small class="float-right text-muted ml-2 nowrap">12:07</small></li>
                                    <li class="timeline-item"><i class="fa fa-file-excel-o timeline-icon"></i>The invoice is ready<small class="float-right text-muted ml-2 nowrap">12:30</small></li>
                                    <li class="timeline-item"><i class="ti-shopping-cart timeline-icon"></i>5 New Orders<small class="float-right text-muted ml-2 nowrap">13:45</small></li>
                                    <li class="timeline-item"><i class="ti-arrow-circle-up timeline-icon"></i>Production server up<small class="float-right text-muted ml-2 nowrap">1 days ago</small></li>
                                    <li class="timeline-item"><i class="ti-harddrives timeline-icon"></i>Server overloaded 91%<small class="float-right text-muted ml-2 nowrap">2 days ago</small></li>
                                    <li class="timeline-item"><i class="ti-info-alt timeline-icon"></i>Server error<small class="float-right text-muted ml-2 nowrap">2 days ago</small></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="ibox ibox-fullheight">
                            <div class="ibox-head">
                                <div class="ibox-title">
                                    <span class="btn-icon-only btn-circle bg-primary-50 text-primary mr-3"><i class="ti-email"></i></span>Email distribution</div>
                            </div>
                            <div class="ibox-body">
                                <div class="flexbox mb-4">
                                    <div class="flexbox">
                                        <span class="flexbox mr-3">
                                            <span class="mr-2 text-muted">Sent</span>
                                            <span class="h3 mb-0 text-primary font-strong">310</span>
                                        </span>
                                        <span class="flexbox">
                                            <span class="mr-2 text-muted">Queue</span>
                                            <span class="h3 mb-0 text-pink font-strong">105</span>
                                        </span>
                                    </div>
                                    <a class="flexbox" href="javascript:;" target="_blank">VIEW ALL<i class="ti-arrow-circle-right ml-2 font-18"></i></a>
                                </div>
                                <div class="ibox-fullwidth-block">
                                    <table class="table">
                                        <thead class="thead-default thead-lg">
                                            <tr>
                                                <th class="pl-4">Subject</th>
                                                <th>Quantity</th>
                                                <th>Reference</th>
                                                <th class="pr-4">Percent</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="pl-4">
                                                    <div class="flexbox-b">
                                                        <span class="btn-icon-only btn-primary font-20 mr-3">AC</span>
                                                        <div>
                                                            <h6 class="mb-1">Try New version of Adminca</h6>
                                                            <div>
                                                                <span class="text-muted font-13"><i class="ti-calendar mr-2"></i>20.04.2018</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h4 class="font-strong text-light mb-0">1400</h4>
                                                </td>
                                                <td>
                                                    <h4 class="font-strong text-primary mb-0">820</h4>
                                                </td>
                                                <td class="pr-4">
                                                    <div class="easypie" data-percent="59" data-bar-color="#5c6bc0" data-size="56" data-line-width="3">
                                                        <span class="easypie-data h5 font-strong">59%</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4">
                                                    <div class="flexbox-b">
                                                        <span class="btn-icon-only btn-pink mr-3"><i class="ti-gift font-20"></i></span>
                                                        <div>
                                                            <h6 class="mb-1">Adminca Big Bundle 6 in 1</h6>
                                                            <div>
                                                                <span class="text-muted font-13"><i class="ti-calendar mr-2"></i>20.04.2018</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h4 class="font-strong text-light mb-0">1250</h4>
                                                </td>
                                                <td>
                                                    <h4 class="font-strong text-pink mb-0">575</h4>
                                                </td>
                                                <td class="pr-4">
                                                    <div class="easypie" data-percent="46" data-bar-color="#ff4081" data-size="56" data-line-width="3">
                                                        <span class="easypie-data h5 font-strong">46%</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4">
                                                    <div class="flexbox-b">
                                                        <span class="btn-icon-only btn-success font-20 mr-3">LV</span>
                                                        <div>
                                                            <h6 class="mb-1">Adminca - Save your time, choose the best</h6>
                                                            <div>
                                                                <span class="text-muted font-13"><i class="ti-calendar mr-2"></i>20.04.2018</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h4 class="font-strong text-light mb-0">1320</h4>
                                                </td>
                                                <td>
                                                    <h4 class="font-strong text-success mb-0">554</h4>
                                                </td>
                                                <td class="pr-4">
                                                    <div class="easypie" data-percent="42" data-bar-color="#18c5a9" data-size="56" data-line-width="3">
                                                        <span class="easypie-data h5 font-strong">42%</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="pl-4">
                                                    <div class="flexbox-b">
                                                        <span class="btn-icon-only btn-warning mr-3"><i class="ti-support font-20"></i></span>
                                                        <div>
                                                            <h6 class="mb-1">High Quality Support & Easy Code</h6>
                                                            <div>
                                                                <span class="text-muted font-13"><i class="ti-calendar mr-2"></i>20.04.2018</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h4 class="font-strong text-light mb-0">870</h4>
                                                </td>
                                                <td>
                                                    <h4 class="font-strong text-warning mb-0">478</h4>
                                                </td>
                                                <td class="pr-4">
                                                    <div class="easypie" data-percent="56" data-bar-color="#f39c12" data-size="56" data-line-width="3">
                                                        <span class="easypie-data h5 font-strong">56%</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ibox ibox-fullheight">
                            <div class="ibox-head">
                                <div class="ibox-title">TASKS</div>
                                <div class="ibox-tools">
                                    <a class="font-18"><i class="ti-plus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <ul class="list-group list-group-divider list-group-full tasks-list">
                                    <li class="list-group-item task-item">
                                        <div>
                                            <label class="checkbox checkbox-grey checkbox-success">
                                                <input type="checkbox" checked="">
                                                <span class="input-span"></span>
                                                <span class="task-title">Make Adminca the best and the most easy admin template</span>
                                            </label>
                                        </div>
                                        <div class="task-data"><small class="text-muted">29 May 2018</small></div>
                                        <div class="task-actions">
                                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item"><i class="ti-pencil-alt mr-2"></i>Edit</a>
                                                <a class="dropdown-item"><i class="ti-close mr-2"></i>Remove</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item task-item">
                                        <div>
                                            <label class="checkbox checkbox-grey checkbox-success">
                                                <input type="checkbox">
                                                <span class="input-span"></span>
                                                <span class="task-title">Create Financial Report</span>
                                            </label>
                                        </div>
                                        <div class="task-data"><small class="text-muted">No due date</small></div>
                                        <div class="task-actions">
                                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item"><i class="ti-pencil-alt mr-2"></i>Edit</a>
                                                <a class="dropdown-item"><i class="ti-close mr-2"></i>Remove</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item task-item">
                                        <div>
                                            <label class="checkbox checkbox-grey checkbox-success">
                                                <input type="checkbox" checked="">
                                                <span class="input-span"></span>
                                                <span class="task-title">Meeting with Ann</span>
                                            </label>
                                            <span class="badge badge-warning ml-1"><i class="ti-alarm-clock"></i> 1 hrs</span>
                                        </div>
                                        <div class="task-data"><small class="text-muted">29 May 2018</small></div>
                                        <div class="task-actions">
                                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item"><i class="ti-pencil-alt mr-2"></i>Edit</a>
                                                <a class="dropdown-item"><i class="ti-close mr-2"></i>Remove</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item task-item">
                                        <div>
                                            <label class="checkbox checkbox-grey checkbox-success">
                                                <input type="checkbox">
                                                <span class="input-span"></span>
                                                <span class="task-title">Edit the blog post</span>
                                            </label>
                                        </div>
                                        <div class="task-data"><small class="text-muted">29 May 2018</small></div>
                                        <div class="task-actions">
                                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item"><i class="ti-pencil-alt mr-2"></i>Edit</a>
                                                <a class="dropdown-item"><i class="ti-close mr-2"></i>Remove</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item task-item">
                                        <div>
                                            <label class="checkbox checkbox-grey checkbox-success">
                                                <input type="checkbox">
                                                <span class="input-span"></span>
                                                <span class="task-title">Send photos to Jack</span>
                                            </label>
                                            <span class="badge badge-success ml-1">Today</span>
                                        </div>
                                        <div class="task-data"><small class="text-muted">29 May 2018</small></div>
                                        <div class="task-actions">
                                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item"><i class="ti-pencil-alt mr-2"></i>Edit</a>
                                                <a class="dropdown-item"><i class="ti-close mr-2"></i>Remove</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item task-item">
                                        <div>
                                            <label class="checkbox checkbox-grey checkbox-success">
                                                <input type="checkbox">
                                                <span class="input-span"></span>
                                                <span class="task-title">Send Financial Reports</span>
                                            </label>
                                            <span class="badge badge-danger ml-1">Important</span>
                                        </div>
                                        <div class="task-data"><small class="text-muted">29 May 2018</small></div>
                                        <div class="task-actions">
                                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item"><i class="ti-pencil-alt mr-2"></i>Edit</a>
                                                <a class="dropdown-item"><i class="ti-close mr-2"></i>Remove</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item task-item">
                                        <div>
                                            <label class="checkbox checkbox-grey checkbox-success">
                                                <input type="checkbox">
                                                <span class="input-span"></span>
                                                <span class="task-title">Send message to Bob</span>
                                            </label>
                                        </div>
                                        <div class="task-data"><small class="text-muted">29 May 2018</small></div>
                                        <div class="task-actions">
                                            <a class="dropdown-toggle" data-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item"><i class="ti-pencil-alt mr-2"></i>Edit</a>
                                                <a class="dropdown-item"><i class="ti-close mr-2"></i>Remove</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- New Event Dialog-->
                <div class="modal fade" id="new-event-modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <form class="modal-content form-horizontal" id="newEventForm" action="javascript:;">
                            <div class="modal-header p-4">
                                <h5 class="modal-title">NEW EVENT</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body p-4">
                                <div class="form-group mb-4">
                                    <label class="text-muted mb-3">Category</label>
                                    <div>
                                        <label class="radio radio-outline-primary radio-inline check-single" data-toggle="tooltip" data-original-title="General">
                                            <input type="radio" name="category" checked value="fc-event-primary">
                                            <span class="input-span"></span>
                                        </label>
                                        <label class="radio radio-outline-warning radio-inline check-single" data-toggle="tooltip" data-original-title="Payment">
                                            <input type="radio" name="category" value="fc-event-warning">
                                            <span class="input-span"></span>
                                        </label>
                                        <label class="radio radio-outline-success radio-inline check-single" data-toggle="tooltip" data-original-title="Technical">
                                            <input type="radio" name="category" value="fc-event-success">
                                            <span class="input-span"></span>
                                        </label>
                                        <label class="radio radio-outline-danger radio-inline check-single" data-toggle="tooltip" data-original-title="Registration">
                                            <input type="radio" name="category" value="fc-event-danger">
                                            <span class="input-span"></span>
                                        </label>
                                        <label class="radio radio-outline-info radio-inline check-single" data-toggle="tooltip" data-original-title="Security">
                                            <input type="radio" name="category" value="fc-event-info">
                                            <span class="input-span"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <input class="form-control form-control-line" id="new-event-title" type="text" name="title" placeholder="Title">
                                </div>
                                <div class="row">
                                    <div class="col-6 form-group mb-4">
                                        <label class="col-form-label text-muted">Start:</label>
                                        <div class="input-group-icon input-group-icon-right">
                                            <span class="input-icon input-icon-right"><i class="fa fa-calendar-check-o"></i></span>
                                            <input class="form-control form-control-line datepicker date" id="new-event-start" type="text" name="start" value="">
                                        </div>
                                    </div>
                                    <div class="col-6 form-group mb-4">
                                        <label class="col-form-label text-muted">End:</label>
                                        <div class="input-group-icon input-group-icon-right">
                                            <span class="input-icon input-icon-right"><i class="fa fa-calendar-check-o"></i></span>
                                            <input class="form-control form-control-line datepicker date" id="new-event-end" type="text" name="end" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-4 pt-3">
                                    <label class="ui-switch switch-icon mr-3 mb-0">
                                        <input id="new-event-allDay" type="checkbox" checked>
                                        <span></span>
                                    </label>All Day</div>
                            </div>
                            <div class="modal-footer justify-content-start bg-primary-50">
                                <button class="btn btn-primary btn-rounded" id="addEventButton" type="submit">Add event</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End New Event Dialog-->
                <!-- Event Detail Dialog-->
                <div class="modal fade" id="event-modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <form class="modal-content form-horizontal" id="eventForm" action="javascript:;">
                            <div class="modal-header p-4">
                                <h5 class="modal-title">EDIT EVENT</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body p-4">
                                <div class="form-group mb-4">
                                    <label class="text-muted mb-3">Category</label>
                                    <div>
                                        <label class="radio radio-outline-primary radio-inline check-single" data-toggle="tooltip" data-original-title="General">
                                            <input type="radio" name="category" checked value="fc-event-primary">
                                            <span class="input-span"></span>
                                        </label>
                                        <label class="radio radio-outline-warning radio-inline check-single" data-toggle="tooltip" data-original-title="Payment">
                                            <input type="radio" name="category" value="fc-event-warning">
                                            <span class="input-span"></span>
                                        </label>
                                        <label class="radio radio-outline-success radio-inline check-single" data-toggle="tooltip" data-original-title="Technical">
                                            <input type="radio" name="category" value="fc-event-success">
                                            <span class="input-span"></span>
                                        </label>
                                        <label class="radio radio-outline-danger radio-inline check-single" data-toggle="tooltip" data-original-title="Registration">
                                            <input type="radio" name="category" value="fc-event-danger">
                                            <span class="input-span"></span>
                                        </label>
                                        <label class="radio radio-outline-info radio-inline check-single" data-toggle="tooltip" data-original-title="Security">
                                            <input type="radio" name="category" value="fc-event-info">
                                            <span class="input-span"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <input class="form-control form-control-line" id="event-title" type="text" name="title" placeholder="Title">
                                </div>
                                <div class="row">
                                    <div class="col-6 form-group mb-4">
                                        <label class="col-form-label text-muted">Start:</label>
                                        <div class="input-group-icon input-group-icon-right">
                                            <span class="input-icon input-icon-right"><i class="fa fa-calendar-check-o"></i></span>
                                            <input class="form-control form-control-line datepicker date" id="event-start" type="text" name="start" value="">
                                        </div>
                                    </div>
                                    <div class="col-6 form-group mb-4">
                                        <label class="col-form-label text-muted">End:</label>
                                        <div class="input-group-icon input-group-icon-right">
                                            <span class="input-icon input-icon-right"><i class="fa fa-calendar-check-o"></i></span>
                                            <input class="form-control form-control-line datepicker date" id="event-end" type="text" name="end" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-4 pt-3">
                                    <label class="ui-switch switch-icon mr-3 mb-0">
                                        <input id="event-allDay" type="checkbox">
                                        <span></span>
                                    </label>All Day</div>
                            </div>
                            <div class="modal-footer justify-content-between bg-primary-50">
                                <button class="btn btn-primary btn-rounded" id="editEventButton" type="submit">Submit</button>
                                <a class="text-danger" id="deleteEventButton" data-dismiss="modal"><i class="la la-trash font-20"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Event Detail Dialog-->
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
        <!-- END CONTENT-->


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

    <!-- QUICK SIDEBAR-->
    <!-- <?php $this->load->view('_part/rightpanel'); ?> -->
    <!-- END QUICK SIDEBAR-->


    <!-- CORE PLUGINS-->
    <script src="<?php echo ADMIN_ASSETS ?>vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>vendors/metisMenu/dist/metisMenu.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>vendors/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>vendors/jquery-idletimer/dist/idle-timer.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>vendors/toastr/toastr.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>vendors/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="<?php echo ADMIN_ASSETS ?>vendors/chart.js/dist/Chart.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>vendors/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>vendors/smalot-bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <!-- CORE SCRIPTS-->
    <script src="<?php echo ADMIN_ASSETS ?>js/app.min.js"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="<?php echo ADMIN_ASSETS ?>js/scripts/dashboard_5.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/scripts/calendar-demo.js"></script>
</body>


<!-- Mirrored from admincast.com/adminca/preview/admin_2/html/dashboard_7.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Jun 2018 16:31:25 GMT -->

</html>