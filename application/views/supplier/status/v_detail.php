<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="title">
							<h4><?= $title ?></h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="index.html">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
			<div class="product-wrap">
				<div class="product-list">
					<ul class="row">
						<?php foreach ($detail as $key => $value) { ?>
							<li class="col-lg-4 col-md-6 col-sm-12">
								<div class="product-box">
									<div class="product-caption">
										<h4>Nama barang : <a href="#"><?= $value->nama_barang ?></a></h4>
										<div class="price">
											Harga : <ins>Rp. <?= number_format($value->harga, 0) ?></ins><br>
											Qty : <ins><?= $value->qty ?> <?= $value->satuan ?></ins>
										</div>
									</div>
								</div>
							</li>
						<?php } ?>
					</ul>
				</div>
				<div class="blog-pagination mb-30">
					<div class="btn-toolbar justify-content-center mb-15">
						<div class="btn-group">
							<a href="<?= base_url('status_barang/konfirmasi/' . $value->no_pengiriman) ?>" class="btn btn-outline-primary"><i class="fa fa-check-circle"></i>Konfirmasi PO</a>&nbsp;
							<a href="<?= base_url('status_barang') ?>" class="btn btn-outline-warning"><i class="fa fa-check-circle"></i>Kembali</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>