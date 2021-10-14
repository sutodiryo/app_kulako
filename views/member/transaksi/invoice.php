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

            <div class="invoice">

                <div class="row">

                    <div class="col-sm-6 invoice-left">

                        <a href="#">
                            <img src="<?php echo ADMIN_ASSETS ?>images/path33822.webp" width="80" alt="" />
                        </a>

                    </div>

                    <div class="col-sm-6 invoice-right">
                        <?php $i = $this->db->query('SELECT MAX(id_transaksi) AS id FROM transaksi')->result();
                        foreach ($i as $in) {
                            $in = $in->id;
                        }
                        ?>
                        <h3>INVOICE NO. #532033<?php echo $in+1; ?></h3>
                        <span><?php echo $tgl_checkout; ?></span>
                    </div>

                </div>


                <hr class="margin" />


                <div class="row">

                    <div class="col-sm-6 invoice-left">
                        <h4>Pemesan</h4>
                        <?php echo $this->session->userdata('log_name') ;?>
                    </div>

                    <div class="col-md-6 invoice-right">

                        <h4>Payment Details:</h4>
                        <strong>V.A.T Reg #:</strong> 542554(DEMO)78
                        <br />
                        <strong>Account Name:</strong> FoodMaster Ltd
                        <br />
                        <strong>SWIFT code:</strong> 45454DEMO545DEMO

                    </div>

                </div>

                <div class="margin"></div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th width="60%">Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>On am we offices expense thought</td>
                            <td>1</td>
                            <td class="text-right">$1,290</td>
                        </tr>

                        <tr>
                            <td class="text-center">2</td>
                            <td>Up do view time they shot</td>
                            <td>1</td>
                            <td class="text-right">$400</td>
                        </tr>

                        <tr>
                            <td class="text-center">3</td>
                            <td>Way ham unwilling not breakfast</td>
                            <td>1</td>
                            <td class="text-right">$550</td>
                        </tr>

                        <tr>
                            <td class="text-center">4</td>
                            <td>Songs to an blush woman be sorry</td>
                            <td>1</td>
                            <td class="text-right">$4020</td>
                        </tr>

                        <tr>
                            <td class="text-center">5</td>
                            <td>Luckily offered article led lasting</td>
                            <td>1</td>
                            <td class="text-right">$87</td>
                        </tr>

                        <tr>
                            <td class="text-center">6</td>
                            <td>Of as by belonging therefore suspicion</td>
                            <td>1</td>
                            <td class="text-right">$140</td>
                        </tr>
                    </tbody>
                </table>

                <div class="margin"></div>

                <div class="row">

                    <div class="col-sm-6">

                        <div class="invoice-left">

                            795 Park Ave, Suite 120
                            <br />
                            San Francisco, CA 94107
                            <br />
                            P: (234) 145-1810
                            <br />
                            Full Name
                            <br />
                            first.last@email.com
                        </div>

                    </div>

                    <div class="col-sm-6">

                        <div class="invoice-right">

                            <ul class="list-unstyled">
                                <li>
                                    Sub - Total amount:
                                    <strong>$6,487</strong>
                                </li>
                                <li>
                                    VAT:
                                    <strong>12.9%</strong>
                                </li>
                                <li>
                                    Discount:
                                    -----
                                </li>
                                <li>
                                    Grand Total:
                                    <strong>$7,304</strong>
                                </li>
                            </ul>

                            <br />

                            <a href="javascript:window.print();" class="btn btn-primary btn-icon icon-left hidden-print">
                                Print Invoice
                                <i class="entypo-doc-text"></i>
                            </a>

                            &nbsp;

                            <a href="mailbox-compose.html" class="btn btn-success btn-icon icon-left hidden-print">
                                Send Invoice
                                <i class="entypo-mail"></i>
                            </a>
                        </div>

                    </div>

                </div>

            </div>

            <?php echo FOOTER ?>

        </div>
    </div>

    <!-- Bottom scripts (common) -->
    <script src="<?php echo base_url() ?>/assets/js/gsap/TweenMax.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/joinable.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/resizeable.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/neon-api.js"></script>

    <!-- Imported scripts on this page -->
    <script src="<?php echo base_url() ?>/assets/js/neon-chat.js"></script>

    <!-- JavaScripts initializations and stuff -->
    <script src="<?php echo base_url() ?>/assets/js/neon-custom.js"></script>

    <!-- Demo Settings -->
    <script src="<?php echo base_url() ?>/assets/js/neon-demo.js"></script>

</body>

</html>