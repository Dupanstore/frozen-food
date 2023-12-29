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
	<div class="error-page d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div class="pd-10">
			<?php if ($search_result) : ?>
				<div class="error-page-wrap text-center">
					<?php foreach ($search_result as $values) : ?>
						<h1>404</h1>
						<h3><?= html_escape($values->username) ?></h3>
						<p>Sorry, the page you’re looking for cannot be accessed.<br>Either check the URL</p>
						<div class="pt-20 mx-auto max-width-200">
							<a href="index.html" class="btn btn-primary btn-block btn-lg">Back To Home</a>
						</div>
					<?php endforeach ?>
				</div>
			<?php else : ?>
				<?php if ($keyword) : ?>
					<div class="error-page-wrap text-center">
						<h1>404</h1>
						<h3>Username Tidak Ditemukan</h3>
						<p>Sorry, the page you’re looking for cannot be accessed.<br>Either check the URL</p>
						<div class="pt-20 mx-auto max-width-200">
							<a href="index.html" class="btn btn-primary btn-block btn-lg">Back To Home</a>
						</div>
					</div>
				<?php endif ?>
			<?php endif ?>
		</div>
	</div>
	<!-- js -->
	<script src="<?= base_url() ?>deskapp-master/vendors/scripts/core.js"></script>
	<script src="<?= base_url() ?>deskapp-master/vendors/scripts/script.min.js"></script>
	<script src="<?= base_url() ?>deskapp-master/vendors/scripts/process.js"></script>
	<script src="<?= base_url() ?>deskapp-master/vendors/scripts/layout-settings.js"></script>
</body>

</html>