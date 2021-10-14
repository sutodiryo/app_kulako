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

	<style>
		.post-comments {
			padding-bottom: 9px;
			margin: 5px 0 5px;
		}

		.comments-nav {
			border-bottom: 1px solid #eee;
			margin-bottom: 5px;
		}

		.post-comments .comment-meta {
			border-bottom: 1px solid #eee;
			margin-bottom: 5px;
		}

		.post-comments .media {
			border-left: 1px dotted #000;
			border-bottom: 1px dotted #000;
			margin-bottom: 5px;
			padding-left: 10px;
		}

		.post-comments .media-heading {
			font-size: 12px;
			color: grey;
		}

		.post-comments .comment-meta a {
			font-size: 12px;
			color: grey;
			font-weight: bolder;
			margin-right: 5px;
		}
	</style>
	<script src="<?php echo ADMIN_ASSETS ?>js/jquery-1.11.3.min.js"></script>

</head>

<body class="page-body">
	<div class="page-container">

		<?php $this->load->view('_part/sidebar'); ?>

		<div class="main-content">
			<?php $this->load->view('_part/header'); ?>

			<div class="row">
				<div class="col-md-12">

					<?php echo $this->session->flashdata('report'); ?>
					<?php $this->session->set_userdata('referred_kelas', current_url()); ?>

					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="panel-title">
								<h3>
									<?php foreach ($produk as $p) { } ?>
									Materi Video <?php echo "$p->nama_produk"; ?>
								</h3>
							</div>

							<div class="panel-options">
								<a href="<?php echo base_url('member/ruang_kelas') ?>"><i class="entypo-reply"></i>Kembali</a>
							</div>
						</div>

						<div class="panel-body with-table">
							<div class="panel-group joined" id="accordion-test-2">

								<?php
								$no = 0;
								foreach ($link as $l) {
									$no++;
									?>

								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion-test-2" href="#video-<?php echo $no ?>">
												<?php echo "<h4>$no. $l->nama_link</h4>";
													echo "<h6><font color='blue' face='verdana'>$l->deskripsi</font></h6>"; ?>
											</a>
										</h4>
									</div>
									<div id="video-<?php echo $no ?>" class="panel-collapse collapse <?php if ($no == 1) {
																												echo "in";
																											}  ?>">
										<div class="panel-body">
											<div class="embed-responsive embed-responsive-16by9">
												<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $l->link ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											</div>

											<div class="panel-body no-padding">

												<?php
													$q 				= $this->db->query("SELECT id FROM produk_link_comment WHERE id_produk_link='$l->id_produk_link'");
													$total_komen 	= $q->num_rows();

													$komen 			= $this->db->query("SELECT 	id,id_up,id_produk_link,komen,status,
																								(SELECT nama FROM member WHERE id_member=produk_link_comment.id_member) AS member
																								FROM produk_link_comment WHERE id_produk_link='$l->id_produk_link' AND id_up=0")->result();


													// echo prev($l) . "<br>";
													// echo current($l) . "<br>";
													// echo next($l);

													?>

												<div class="post-comments">

													<form method="POST" action="<?php echo "" . base_url('member/komentar/') . "$l->id_produk_link"; ?>">
														<div class="form-group">
															<label for="comment"><?php echo $total_komen; ?> Pertanyaan.</label>
															<!-- <input type="hidden" name="id_member" value="<?php echo $this->session->userdata('log_id'); ?>"> -->
															<input type="hidden" name="id_up" value="0">
															<textarea name="comment" rows="3" required class="form-control autogrow" id="field-ta" placeholder="Pertanyaan anda..." style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 50px;"></textarea>
														</div>
														<button type="submit" class="btn btn-primary">Kirim</button>
													</form>

													<br>
													<font color="black">Pertanyaan dari pengusaha lain :</font>
													<br><br>
													<div class="row">

														<?php
															if (empty($komen)) {
																echo "<font>Belum ada Pertanyaan</font>";
															} else {
																$nok = 0;
																foreach ($komen as $k) {
																	$nok++; ?>
														<div class="media">

															<div class="media-heading">
																<button class="btn btn-default btn-xs collapsed" type="button" data-toggle="collapse" data-target="#c<?php echo $nok ?>" aria-expanded="false" aria-controls="collapseExample">
																	<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
																</button>
																<font color="blue"><?php echo $k->member ?></font>
																<br>
																<textarea readonly class="form-control autogrow" id="field-ta" style="overflow: hidden; overflow-wrap: break-word; resize: horizontal;"><?php echo $k->komen ?></textarea>
															</div>

															<div class="panel-collapse collapse" id="c<?php echo $nok ?>" aria-expanded="false" style="height: 0px;">

																<div class="media-left">
																	<!-- <div class="vote-wrap">
																		<div class="save-post">
																			<a href="#"><span class="glyphicon glyphicon-star" aria-label="Save"></span></a>
																		</div>
																	</div> -->
																</div>

																<div class="media-body">

																	<div class="comment-meta">
																		<span>
																			<a class="" role="button" data-toggle="collapse" href="#reply<?php echo $nok ?>" aria-expanded="false" aria-controls="collapseExample">balas</a>
																		</span>
																		<?php $sub_komen	= $this->db->query("SELECT 	id,id_up,id_produk_link,komen,status,
																								(SELECT nama FROM member WHERE id_member=produk_link_comment.id_member) AS member
																								FROM produk_link_comment WHERE id_produk_link='$l->id_produk_link' AND id_up='$k->id'")->result(); ?>
																		<div class="collapse" id="reply<?php echo $nok ?>">

																			<form method="POST" action="<?php echo "" . base_url('member/komentar/') . "$l->id_produk_link"; ?>">
																				<div class="form-group">
																					<!-- <label for="comment">Balasan anda</label> -->
																					<input type="hidden" name="id_up" value="<?php echo $k->id ?>">
																					<textarea name="comment" rows="3" required class="form-control autogrow" id="field-ta" placeholder="Balasan anda..." style="overflow: hidden; overflow-wrap: break-word; resize: horizontal; height: 50px;"></textarea>
																					<!-- <font color="orange"><?php echo $k->member ?></font>  -->
																				</div>
																				<button type="submit" class="btn btn-default">Kirim</button>
																			</form>

																		</div>
																	</div>

																	<?php
																				$nosk = 0;
																				foreach ($sub_komen as $sk) {
																					$nosk++; ?>
																	<div class="media">
																		<div class="media-heading">
																			<!-- <button class="btn btn-default btn-collapse btn-xs" type="button" data-toggle="collapse" data-target="#sk<?php echo $nosk; ?>" aria-expanded="false" aria-controls="collapseExample">
																				<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
																			</button> -->
																			<?php echo $sk->member ?> : <?php echo $sk->komen ?>
																		</div>

																		<div class="panel-collapse collapse" id="sk<?php echo $nosk; ?>">

																			<div class="media-left">

																			</div>

																			<div class="comment-meta">
																				<span>
																					<a class="" role="button" data-toggle="collapse" href="#balas<?php echo $nosk; ?>" aria-expanded="false" aria-controls="collapseExample">balas</a>
																				</span>
																				<div class="collapse" id="balas<?php echo $nosk; ?>">
																					<form>
																						<div class="form-group">
																							<label for="comment">Balasan anda</label>
																							<textarea name="comment" class="form-control" rows="3"></textarea>
																						</div>
																						<button type="submit" class="btn btn-default">Send</button>
																					</form>
																				</div>
																			</div>
																		</div>
																	</div>

																	<?php } ?>

																</div>

															</div>
														</div>


														<?php
																}
															} ?>

													</div>

												</div>
											</div>
										</div>
									</div>
								</div>

								<?php } ?>

							</div>

						</div>
					</div>
				</div>
			</div>


			<!-- <div class="row" style="position:fixed; bottom:0;width: 500px;left: 50%;margin-left: -250px;">
				<div class="col-md-12">
					<ul class="pager">
						
						<li><a href="#"><i class="entypo-left-thin"></i> Previous</a></li>

						<li><a href="#">Next <i class="entypo-right-thin"></i></a></li>
					</ul>
				</div>
			</div> -->

			<!-- Footer -->
			<?php echo FOOTER ?>

		</div>
	</div>
	<!-- Bottom scripts (common) -->

	<script>
		$('[data-toggle="collapse"]').on('click', function() {
			var $this = $(this),
				$parent = typeof $this.data('parent') !== 'undefined' ? $($this.data('parent')) : undefined;
			if ($parent === undefined) {
				/* Just toggle my  */
				$this.find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
				return true;
			}

			/* Open element will be close if parent !== undefined */
			var currentIcon = $this.find('.glyphicon');
			currentIcon.toggleClass('glyphicon-plus glyphicon-minus');
			$parent.find('.glyphicon').not(currentIcon).removeClass('glyphicon-minus').addClass('glyphicon-plus');

		});
	</script>
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