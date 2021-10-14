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

			<div class="row">
				<div class="col-md-12">

					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="panel-title">
								<h3>
									<?php foreach ($member as $m) { } ?>
									Detail Member (<?php echo $m->nama; ?>)
								</h3>
							</div>

							<div class="panel-options">
                                <a href="#" onclick="window.history.back();"><i class="entypo-reply"></i>Kembali</a>
							</div>
						</div>

						<div class="panel-body">
							<div class="profile-env">
								<header class="row">
									<div class="col-sm-2">

										<a href="#" class="profile-picture">
											<img src="<?php echo base_url() ?>/assets/images/profile-picture.png" class="img-responsive img-circle" />
										</a>

									</div>

									<div class="col-sm-7">

										<ul class="profile-info-sections">
											<li>
												<div class="profile-name">
													<strong>
														<a href="#"><?php echo $m->nama ?></a>
														<a href="#" class="user-status is-online tooltip-primary" data-toggle="tooltip" data-placement="top" data-original-title="Online"></a>
														<!-- User statuses available classes "is-online", "is-offline", "is-idle", "is-busy" --> </strong>
													<span><a href="#"><?php echo $m->pekerjaan ?></a></span>
												</div>
											</li>

											<li>
												<div class="profile-stat">
													<h3><i class="entypo-credit-card"></i></h3>
													<span><a href="#"><?php echo $m->no_rekening ?></a></span>
												</div>
											</li>
										</ul>

									</div>

									<div class="col-sm-3">

										<div class="profile-buttons">
											<a class="btn btn-default" data-toggle="modal" href="#modal-edit-profil">
												<i class="entypo-pencil"></i>
												Edit Profile
											</a>
										</div>
									</div>

								</header>

								<section class="profile-info-tabs">

									<div class="row">

										<div class="col-sm-offset-2 col-sm-10">

											<ul class="user-details">

												<li>
													<a href="#">
														<i class="entypo-user"></i>
														@<?php echo $m->username ?>
													</a>
												</li>

												<li>
													<a href="#">
														<i class="entypo-phone"></i>
														<?php echo $m->no_hp ?>
													</a>
												</li>

												<li>
													<a href="#">
														<i class="entypo-mail"></i>
														<?php echo $m->email ?>
													</a>
												</li>

												<li>
													<a href="#">
														<i class="entypo-location"></i>
														<?php echo $m->alamat ?>
													</a>
												</li>
											</ul>

										</div>

									</div>

								</section>
							</div>

							<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script>
							<script type="text/javascript">
								function initialize() {
									var $ = jQuery,
										map_canvas = $("#sample-checkin");

									var location = new google.maps.LatLng(36.738888, -119.783013),
										map = new google.maps.Map(map_canvas[0], {
											center: location,
											zoom: 14,
											mapTypeId: google.maps.MapTypeId.ROADMAP,
											scrollwheel: false
										});

									var marker = new google.maps.Marker({
										position: location,
										map: map
									});
								}

								google.maps.event.addDomListener(window, 'load', initialize);
							</script>

						</div>
					</div>

				</div>
			</div>

			<?php echo FOOTER ?>

		</div>

	</div>

	<script src="<?php echo base_url() ?>/assets/js/gsap/TweenMax.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/bootstrap.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/joinable.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/resizeable.js"></script>
	<script src="<?php echo base_url() ?>/assets/js/neon-api.js"></script>

	<script src="<?php echo base_url() ?>/assets/js/neon-chat.js"></script>

	<script src="<?php echo base_url() ?>/assets/js/neon-custom.js"></script>

	<script src="<?php echo base_url() ?>/assets/js/neon-demo.js"></script>


	<div class="modal fade" id="modal-edit-profil" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Tambah Area Baru</h4>
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