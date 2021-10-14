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
            <?php $this->load->view('_part/header'); ?>

            <div class="row">

                <div class="col-sm-3 col-xs-6">
                    <a href="<?php echo base_url('member/produk') ?>">
                        <div class="tile-stats tile-green">
                            <div class="icon"><i class="entypo-tag"></i></div>
                            <div class="num" data-start="0" data-end="<?php echo $produk; ?>" data-postfix="" data-duration="1500" data-delay="600">0</div>
                            <h3>Produk</h3>
                        </div>
                    </a>
                </div>

                <div class="col-sm-3 col-xs-6">
                    <a href="<?php echo base_url('#') ?>">
                        <div class="tile-stats tile-aqua">
                            <div class="icon"><i class="entypo-basket"></i></div>
                            <div class="num" data-start="0" data-end="<?php echo $transaksi; ?>" data-postfix="" data-duration="1500" data-delay="1200">0</div>
                            <h3>Produk Terbeli</h3>
                        </div>
                    </a>
                </div>

                <div class="col-sm-3 col-xs-6">
                    <a href="<?php echo base_url('member/transaksi/jual') ?>">
                        <div class="tile-stats tile-red">
                            <div class="icon"><i class="entypo-bag"></i></div>
                            <div class="num" data-start="0" data-end="<?php echo $penjualan; ?>" data-postfix="" data-duration="1500" data-delay="0">0</div>
                            <h3>Penjualan</h3>
                        </div>
                    </a>
                </div>

                <div class="col-sm-3 col-xs-6">
                    <a href="<?php echo base_url('member/transaksi/beli') ?>">
                        <div class="tile-stats tile-blue">
                            <div class="icon"><i class="entypo-credit-card"></i></div>
                            <div class="num" data-start="0" data-end="<?php echo $pembelian; ?>" data-postfix="" data-duration="1500" data-delay="1800">0</div>
                            <h3>Pembelian</h3>
                        </div>
                    </a>
                </div>

            </div>

            <br />

            <div class="row">
                <div class="col-md-9">

                    <script type="text/javascript">
                        jQuery(document).ready(function($) {
                            var map = $("#map-2");

                            map.vectorMap({
                                map: 'europe_merc_en',
                                zoomMin: '3',
                                backgroundColor: '#f4f4f4',
                                focusOn: {
                                    x: 0.5,
                                    y: 0.7,
                                    scale: 3
                                },
                                markers: [{
                                        latLng: [50.942, 6.972],
                                        name: 'Cologne'
                                    },
                                    {
                                        latLng: [42.6683, 21.164],
                                        name: 'Prishtina'
                                    },
                                    {
                                        latLng: [41.3861, 2.173],
                                        name: 'Barcelona'
                                    },
                                ],
                                markerStyle: {
                                    initial: {
                                        fill: '#ff4e50',
                                        stroke: '#ff4e50',
                                        "stroke-width": 6,
                                        "stroke-opacity": 0.3,
                                    }
                                },
                                regionStyle: {
                                    initial: {
                                        fill: '#e9e9e9',
                                        "fill-opacity": 1,
                                        stroke: 'none',
                                        "stroke-width": 0,
                                        "stroke-opacity": 1
                                    },
                                    hover: {
                                        "fill-opacity": 0.8
                                    },
                                    selected: {
                                        fill: 'yellow'
                                    },
                                    selectedHover: {}
                                }
                            });
                        });
                    </script>

                </div>

            </div>

            <br />

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary panel-table">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <h3>Produk yang anda beli</h3>
                            </div>

                            <div class="panel-options">
                                <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table responsive">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="40%">Produk</th>
                                        <th width="25%">Cover</th>
                                        <th width="25%">Tanggal Beli</th>
                                        <th width="5%" class="text-center"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($akses as $pr) {
                                        $no++;
                                        echo "<tr>
                                        <td>$no</td>
                                        <td>$pr->nama_produk</td>
                                        <td><img src='" . base_url('assets/upload/produk/') . "" . $pr->img_1 . "' height='50'></td>
                                        <td>$pr->tgl</td>";

                                        echo "<td class='text-center'>";
                                        if ($pr->status_2 == 0) {
                                            echo "<a href='" . base_url() . "'> <span class='badge badge-warning'>Belum dibayar<i class='entypo-arrows-ccw'></i></span></a>";
                                        } elseif ($pr->status_2 == 1) {
                                            echo "<a href='" . base_url() . "'> <span class='badge badge-success'>Lunas<i class='entypo-check'></i></span></a>";
                                        } elseif ($pr->status_2 == 2) {
                                            echo "<a href='" . base_url() . "'> <span class='badge badge-danger'>Dibatalkan<i class='entypo-cancel'></i></span></a>";
                                        }

                                        echo "</td>
                                    </tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>

            <?php echo FOOTER ?>

        </div>

    </div>

    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>js/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>js/rickshaw/rickshaw.min.css">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>js/zurb-responsive-tables/responsive-tables.css">

    <!-- Bottom scripts (common) -->
    <script src="<?php echo ADMIN_ASSETS ?>js/gsap/TweenMax.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/bootstrap.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/joinable.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/resizeable.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/neon-api.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>

    <!-- Imported scripts on this page -->
    <script src="<?php echo ADMIN_ASSETS ?>js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/jquery.sparkline.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/rickshaw/vendor/d3.v3.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/rickshaw/rickshaw.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/raphael-min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/morris.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/toastr.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/fullcalendar/fullcalendar.min.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/zurb-responsive-tables/responsive-tables.js"></script>
    <script src="<?php echo ADMIN_ASSETS ?>js/neon-chat.js"></script>

    <!-- JavaScripts initializations and stuff -->
    <script src="<?php echo ADMIN_ASSETS ?>js/neon-custom.js"></script>


    <!-- Demo Settings -->
    <script src="<?php echo ADMIN_ASSETS ?>js/neon-demo.js"></script>

</body>

</html>