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

			<div class="row">
				<div class="col-md-12">

					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="panel-title">
								<h3>
									<?php foreach ($produk as $p) { } ?>
									Materi Video <?php echo "$p->nama_produk"; ?>
								</h3>
							</div>

							<div class="panel-options">
								<a href="<?php echo base_url('member/index') ?>"><i class="entypo-reply"></i>Kembali</a>
							</div>
						</div>

						<div class="panel-body with-table">
							<br>

							<script type="text/javascript">
								jQuery(document).ready(function($) {
									// Handle the Change Cover
									$(".gallery-env").on("click", ".album header .album-options", function(ev) {
										ev.preventDefault();
										// Sample Modal
										$("#album-cover-options").modal('show');
										// Sample Crop Instance
										var image_to_crop = $("#album-cover-options .croppable-image img"),
											img_load = new Image();
										img_load.src = image_to_crop.attr('src');
										img_load.onload = function() {
											if (image_to_crop.data('loaded'))
												return false;
											image_to_crop.data('loaded', true);
											image_to_crop.Jcrop({
												boxWidth: 410,
												boxHeight: 265,
												onSelect: function(cords) {
													// you can use these vars to save cropping of the image coordinates
													var h = cords.h,
														w = cords.w,

														x1 = cords.x,
														x2 = cords.x2,

														y1 = cords.w,
														y2 = cords.y2;
												}
											}, function() {
												var jcrop = this;
												jcrop.animateTo([800, 600, 150, 50]);
											});
										}
									});
								});
							</script>

							<div class="gallery-env">

								<div class="row">

									<?php foreach ($link as $l) { ?>
									<div class="col-sm-6">
										<article class="album">
											<header>
												<div class="embed-responsive embed-responsive-16by9">
													<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $l->link ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
												</div>
											</header>
											<section class="album-info">
												<h3><?php echo $l->nama_link ?></h3>
											</section>
											<footer>
												<div class="album-images-count col-sm-4">
													<i class="entypo-chat"></i>
													55
												</div>
												<div class="album-options col-sm-8">
													<textarea class="form-control autogrow" id="field-ta" placeholder="Kirim Komentar..." style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 30px;"></textarea>
												</div>

											</footer>
										</article>
									</div>
									<?php } ?>


								</div>

							</div>

						</div>
					</div>

				</div>
			</div>

			<?php echo FOOTER ?>

		</div>

	</div>

	<link rel="stylesheet" href="<?php echo ADMIN_ASSETS ?>js/jcrop/jquery.Jcrop.min.css">

	<script src="<?php echo base_url() ?>/assets/js/gsap/TweenMax.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/bootstrap.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/joinable.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/resizeable.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/neon-api.js"></script>

	<script src="<?php echo base_url() ?>/assets/js/jcrop/jquery.Jcrop.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/neon-chat.js"></script>

	<script src="<?php echo base_url() ?>/assets/js/neon-custom.js"></script>

	<script src="<?php echo base_url() ?>/assets/js/neon-demo.js"></script>

</body>

</html>