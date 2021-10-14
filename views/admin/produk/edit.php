<?php foreach ($produk as $p) { } ?>

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

			<h2><?php echo $title; ?></h2>

			<div class="row">
				<div class="col-md-12">

					<div class="panel panel-primary" data-collapsed="0">

						<div class="panel-body">

							<form role="form" class="form-horizontal form-groups-bordered" method="POST" action="<?php echo base_url('admin/act/edit_produk/');
																													echo $p->id_produk; ?>">
								<div class="form-group">
									<label for="field-1" class="col-sm-3 control-label">Nama Produk</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" name="nama_produk" required value="<?php echo $p->nama_produk ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="field-1" class="col-sm-3 control-label">Foto Produk</label>
									<div class="col-sm-5">
										<img src="<?php echo base_url('assets/upload/produk/');
													echo $p->img_1; ?>" height='100'>
										<input type="file" class="form-control" name="img_1" placeholder="Ganti Produk">
									</div>
								</div>

								<div class="form-group">
									<label for="field-1" class="col-sm-3 control-label">Harga</label>
									<div class="col-sm-5">
										<input type="number" class="form-control" name="harga" placeholder="Harga" value="<?php echo $p->harga ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="field-1" class="col-sm-3 control-label">Nama Coret</label>
									<div class="col-sm-5">
										<input type="number" class="form-control" name="harga_" placeholder="Harga Coret" value="<?php echo $p->harga_ ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="field-ta" class="col-sm-3 control-label">Keterangan</label>
									<div class="col-sm-5">
										<textarea class="form-control" name="keterangan" rows="5"><?php echo $p->keterangan ?></textarea>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-3">
										<button type="submit" class="btn btn-success pull-right"><i class="entypo-check"></i> Simpan</button>
									</div>
									<div class="col-sm-5">
										<a class="btn btn-danger" href="javascript:history.back()"><i class="entypo-reply"></i> Kembali</a>
									</div>
								</div>

							</form>

						</div>

					</div>

				</div>
			</div>

			<!-- Footer -->
			<?php echo FOOTER ?>

		</div>

	</div>

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

</body>

</html>