<?php foreach ($mapel as $m) {
	$id 		= $m->id_mata_pelajaran;
	$nama 		= $m->nama_mata_pelajaran;
	$keterangan = $m->keterangan;
	$status 	= $m->status;
} ?>


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

			<h2><?php echo $title; ?></h2>
			<br />


			<div class="row">
				<div class="col-md-12">

					<div class="panel panel-primary" data-collapsed="0">

						<div class="panel-heading">
							<!-- <div class="panel-title">
								Form edit area
							</div> -->
							<!-- <div class="panel-options">
								<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
								<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
								<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
								<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
							</div> -->
						</div>

						<div class="panel-body">

							<form role="form" class="form-horizontal form-groups-bordered" method="POST" action="<?php echo base_url('admin/act/edit_mapel/'); echo $id;?>">

								<div class="form-group">
									<label for="field-1" class="col-sm-3 control-label">Nama Mata Pelajaran</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" name="nama_mata_pelajaran" required value="<?php echo $nama ?>">
									</div>
								</div>

								<div class="form-group">
									<label for="field-ta" class="col-sm-3 control-label">Keterangan</label>
									<div class="col-sm-5">
										<textarea class="form-control" name="keterangan" rows="10"><?php echo $keterangan ?></textarea>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-3">
										<a class="btn btn-danger pull-right" href="javascript:history.back()"><i class="entypo-reply"></i> Kembali</a>
									</div>
									<div class="col-sm-5">
										<button type="submit" class="btn btn-success"><i class="entypo-check"></i> Simpan</button>
										<!-- <a type="submit" class="btn btn-success" ><i class="entypo-check"></i> Simpan</a> -->
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