<!DOCTYPE html>
<html>

<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>SIPEBA-Rajawali Indah</title>

	<!-- Site favicon -->
	<link rel="rajawali1" sizes="180x180" href="<?= base_url() ?>deskapp-master/vendors/images/rajawali1.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>deskapp-master/vendors/images/rajawali1.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>deskapp-master/vendors/images/rajawali1.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>deskapp-master/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>deskapp-master/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>deskapp-master/vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>

<body>
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<!-- <a href="login.html">
					<img src="<?= base_url() ?>deskapp-master/vendors/images/deskapp-logo.svg" alt="">
				</a> -->
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="<?= base_url('auth/login') ?>">Login</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<img src="<?= base_url() ?>deskapp-master/vendors/images/forgot-password.png" alt="">
				</div>
				<div class="col-md-6">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Reset Password</h2>
						</div>
						<h6 class="mb-20">Hallo <?= $user->username ?> <br> <br>Silahkan Masukan password baru dan konfirmasi password</h6>
						<?php
						echo validation_errors('<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-exclamation-triangle"></i> Coba Lagi</h5>', '</div>');

						if ($this->session->flashdata('pesan')) {
							echo '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fa fa-check"></i> Sukses</h5>';
							echo $this->session->flashdata('pesan');
							echo '</div>';
						}

						?>
						<form action="<?= base_url('auth/reset/' . $user->id_user) ?>" method="post">
							<div class="input-group custom">
								<input type="password" name="password" class="form-control form-control-lg" placeholder="New Password">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" name="ulangi_password" class="form-control form-control-lg" placeholder="Confirm New Password">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row align-items-center">
								<div class="col-5">
									<div class="input-group mb-0">
										<!--
											use code for form submit
											<input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
										-->
										<button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="<?= base_url() ?>deskapp-master/vendors/scripts/core.js"></script>
	<script src="<?= base_url() ?>deskapp-master/vendors/scripts/script.min.js"></script>
	<script src="<?= base_url() ?>deskapp-master/vendors/scripts/process.js"></script>
	<script src="<?= base_url() ?>deskapp-master/vendors/scripts/layout-settings.js"></script>
</body>

</html>