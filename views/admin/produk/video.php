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
									<?php foreach ($produk as $p) { } ?>
									Materi Video <?php echo "$p->nama_produk"; ?>
								</h3>
							</div>

							<div class="panel-options">
								<a data-toggle="modal" href="#modal-tambah-video"><i class="entypo-plus-squared"></i>Tambah Video</a>
								<a href="<?php echo base_url('admin/produk/list') ?>"><i class="entypo-reply"></i>Kembali</a>
							</div>
						</div>

						<?php echo $this->session->flashdata('report'); ?>
						<?php $this->session->set_userdata('referred_edit_video', current_url()); ?>

						<div class="panel-body with-table">
							<br>

							<script type="text/javascript">
								jQuery(document).ready(function($) {
									$(".gallery-env").on("click", ".album header .album-options", function(ev) {
										ev.preventDefault();
										$("#album-cover-options").modal('show');
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

									<?php
									$no = 0;
									foreach ($video as $v) {
										$no++; ?>
									<div class="col-sm-4">
										<article class="album">
											<header>
												<a href="#">
													<div class="embed-responsive embed-responsive-16by9">
														<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $v->link ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
													</div>
												</a>
											</header>

											<section class="album-info">
												<h3><a href="#"><?php echo $v->nama_link ?></a></h3>
												<br>
												<a data-toggle="modal" href="#modal-edit-video-<?php echo $no ?>" class="btn btn-green btn-icon">
													Edit
													<i class="entypo-pencil"></i>
												</a>
												<a href="<?php echo "" . base_url() . "admin/del/produk_link/$v->id_produk_link"; ?>" class="btn btn-red btn-icon">
													Hapus
													<i class="entypo-trash"></i>
												</a>
											</section>
										</article>
									</div>


									<div class="modal fade" id="modal-edit-video-<?php echo $no ?>" style="display: none;">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
													<h4 class="modal-title">Edit video <?php echo "$v->nama_link"; ?></h4>
												</div>
												<form action="<?php echo base_url('admin/act/edit_produk_video/') ?><?php echo "$v->id_produk_link"; ?>" method="POST">
													<div class="modal-body">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<label for="nama_link" class="control-label">Nama Video</label>
																	<input type="text" class="form-control" name="nama_link" placeholder="Nama Video" value="<?php echo "$v->nama_link"; ?>" required>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<label for="link" class="control-label">ID Video</label>
																	<textarea class="form-control" name="link" placeholder="ID video (youtube)" required><?php echo "$v->link"; ?></textarea>
																	<label for="img_1" class="control-label">Contoh : https://www.youtube.com/watch?v=<font color="red">qplOCvc3sYQ</font></label>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<label for="link" class="control-label">Deskripsi</label>
																	<textarea class="form-control autogrow" name="deskripsi" style="resize: vertical; height: 80px;" placeholder="Deskripsi Video" required><?php echo "$v->deskripsi"; ?></textarea>
																	<!-- <label for="img_1" class="control-label">Contoh : https://www.youtube.com/watch?v=<font color="red">qplOCvc3sYQ</font></label> -->
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

	<div class="modal fade" id="modal-tambah-video" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Tambah Video Baru di <?php echo "$p->nama_produk"; ?></h4>
				</div>

				<form action="<?php echo base_url('admin/add/produk_video') ?>" method="POST">
					<div class="modal-body">

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="hidden" name="id_produk" value="<?php echo "$p->id_produk"; ?>">
									<input type="text" class="form-control" name="nama_link" placeholder="Nama Video" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<textarea class="form-control" name="link" placeholder="ID video (youtube)" required></textarea>
									<label for="img_1" class="control-label">Contoh : https://www.youtube.com/watch?v=<font color="red">qplOCvc3sYQ</font></label>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="link" class="control-label">Deskripsi</label>
									<textarea class="form-control autogrow" name="deskripsi" style="resize: vertical; height: 80px;" placeholder="Deskripsi Video" required><?php echo "$v->deskripsi"; ?></textarea>
									<!-- <label for="img_1" class="control-label">Contoh : https://www.youtube.com/watch?v=<font color="red">qplOCvc3sYQ</font></label> -->
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