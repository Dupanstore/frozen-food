<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4><?= $title ?></h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
			<div class="invoice-wrap">
				<div class="invoice-box">
					<div class="invoice-header">
						<div class="logo text-center">
							<img src="vendors/images/deskapp-logo.png" alt="">
						</div>
					</div>
					<h4 class="text-center mb-30 weight-600">SURAT RETURN BARANG</h4>
					<?php foreach ($detail as $key => $value) { ?>
					<?php } ?>
					<div class="row pb-30">
						<div class="col-md-6">
							<h5 class="mb-15"><?= $value->nama_user ?></h5>
							<p class="font-14 mb-5">Tanggal Pembuatan Surat Return: <strong class="weight-600"><?= $value->tgl_sr ?></strong></p>
							<p class="font-14 mb-5">No Return: <strong class="weight-600"><?= $value->no_sr ?></strong></p>
						</div>
					</div>
					<div class="invoice-desc pb-30">
						<div class="invoice-desc-head clearfix">
							<div class="invoice-sub">Keterangan</div>
							<div class="invoice-rate">Harga</div>
							<div class="invoice-hours">Jumlah</div>
							<div class="invoice-subtotal">Subtotal</div>
						</div>
						<div class="invoice-desc-body">
							<?php foreach ($detail as $key => $detail) { ?>
								<ul>
									<li class="clearfix">
										<div class="invoice-sub"><?= $detail->nama_barang ?></div>
										<div class="invoice-rate">Rp. <?= number_format($detail->harga, 0) ?></div>
										<div class="invoice-hours"><?= $detail->jml ?> <?= $detail->satuan_return ?></div>
										<div class="invoice-subtotal"><span class="weight-600">Rp. <?= number_format($detail->harga * $detail->jml, 0) ?></span></div>
									</li>
								</ul>
							<?php } ?>
						</div>
						<div class="invoice-desc-footer">
							<div class="invoice-desc-head clearfix">
								<div class="invoice-sub">Alasan Return</div>
							</div>
							<div class="invoice-desc-body">
								<ul>
									<li class="clearfix">
										<div class="invoice-sub">
											<p class="font-14 mb-5">Nama : <strong class="weight-600"><?= $value->alasan_return ?></strong></p>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<h4 class="text-center pb-20">Terimakasih!!</h4>
					<button class="btn btn-default" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
				</div>
			</div>
		</div>
		<br>