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

			<section class="search-results-env">

				<div class="row">
					<div class="col-md-12">
						<!-- Search categories tabs -->
						<ul class="nav nav-tabs right-aligned">
							<li class="tab-title pull-left">
								<div class="search-string"><?php echo $videor + $kelasr ?> hasil ditemukan: <strong>&ldquo;<?php echo $key ?>&rdquo;</strong></div>
							</li>

							<li class="active">
								<a href="#materi">
									Video
									<span class="disabled-text">(<?php echo $videor ?>)</span>
								</a>
							</li>

							<li class="active">
								<a href="#ebook">
									Ebook
									<span class="disabled-text">(<?php echo $ebookr ?>)</span>
								</a>
							</li>
							<li>
								<a href="#kelas">
									Kelas
									<span class="disabled-text">(<?php echo $kelasr ?>)</span>
								</a>
							</li>
						</ul>


						<div class="search-results-panes">

							<div class="search-results-pane active" id="materi">
								<ul class="search-results">

									<?php
									foreach ($video as $v) {
										echo "<li class='search-result'>
												<a href='".base_url()."member/video/$v->id_produk_link'>
													<div class='sr-inner'>
														<h4>$v->nama_link</h4>
														<p><font color='blue' face='verdana'>$v->deskripsi</font></p>
													</div>
												</a>
											</li>";
									}
									?>

								</ul>
							</div>

							<div class="search-results-pane" id="ebook">
								<ul class="search-results">

									<?php
									foreach ($ebook as $e) {
										echo "<li class='search-result'>
												<a href='#'>
													<div class='sr-inner'>
														<h4>$e->nama_link</h4>
														<p><font color='blue' face='verdana'>$e->deskripsi</font></p>
														<a type='button' href='$e->link' target='_blank' class='btn btn-green btn-icon'>
														Download Ebook
														<i class='entypo-download'></i>
														</a>
													</div>
												</a>
											</li>";
									}
									?>

								</ul>
							</div>

							<div class="search-results-pane" id="kelas">
								<ul class="search-results">
									<?php
									foreach ($kelas as $k) {
										echo "<li class='search-result'>
												<a href='".base_url()."member/kelas/$k->id_produk'>
													<div class='sr-inner'>
														<h4><img src='" . base_url('assets/upload/produk/mbc-cover.png'). "' height='50'>$k->nama_produk</h4>
													</div>
												</a>
											</li>";
									}
									?>
								</ul>
							</div>

						</div>

					</div>
				</div>

			</section>

			<?php echo FOOTER ?>

		</div>
	</div>

	<!-- Bottom scripts (common) -->
	<script src="<?php echo ADMIN_ASSETS ?>js/gsap/TweenMax.min.js"></script>
	<script src="<?php echo ADMIN_ASSETS ?>js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="<?php echo ADMIN_ASSETS ?>js/bootstrap.js"></script>
	<script src="<?php echo ADMIN_ASSETS ?>js/joinable.js"></script>
	<script src="<?php echo ADMIN_ASSETS ?>js/resizeable.js"></script>
	<script src="<?php echo ADMIN_ASSETS ?>js/neon-api.js"></script>

	<!-- Imported scripts on this page -->
	<script src="<?php echo ADMIN_ASSETS ?>js/neon-chat.js"></script>

	<!-- JavaScripts initializations and stuff -->
	<script src="<?php echo ADMIN_ASSETS ?>js/neon-custom.js"></script>

	<!-- Demo Settings -->
	<script src="<?php echo ADMIN_ASSETS ?>js/neon-demo.js"></script>

</body>

</html>