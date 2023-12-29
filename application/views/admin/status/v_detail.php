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
									<div class="producct-img"><img src="<?= base_url('assets/barang/' . $value->gambar) ?>" alt=""></div>
									<div class="product-caption">
										<h4><a href="#"><?= $value->nama_barang ?></a></h4>
										<div class="price">
											Harga : <ins>Rp. <?= number_format($value->harga, 0) ?></ins><br>
											Qty : <ins><?= $value->qty ?></ins>
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
							<!-- <a href="#" class="btn btn-warning btn-sm" data-color="#265ed7" data-toggle="modal" data-target="#Medium-modal<?= $value->no_pengiriman ?>" type="button">
								<i class="fa fa-dollar"></i>Pembayaran
							</a> -->
							<a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#Medium-modal<?= $value->no_pengiriman ?>" type="button"><i class="fa fa-dollar"></i>Pembayaran</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<br>
		<?php foreach ($detail as $key => $modal) { ?>
			<div class="modal fade" id="Medium-modal<?= $modal->no_pengiriman ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myLargeModalLabel">Pembayaran Barang</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
						<form action="<?= base_url('kirim/bayar/' . $modal->no_pengiriman) ?>" enctype="multipart/form-data" accept-charset="utf-8" method="POST">
							<div class="modal-body">
								<p>No Pesanan : <?= $modal->no_pengiriman ?></p>
								<p>No Resi Pengiriman : <?= $modal->no_resi ?></p>
								<p>Total Pembayaran : Rp. <?= number_format($modal->total_bayar, 0) ?></p>
								<div class="form-group">
									<input type="hidden" name="pembayaran" value="<?= $modal->total_bayar ?>" class="form-control" min="<?= $modal->total_bayar ?>" max="<?= $modal->total_bayar ?>" placeholder="Jumlah Pembayaran">
								</div>
								<div class="form-group">
									<input type="file" name="bukti_bayar" class="form-control" placeholder="Bukti Pembayaran">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php } ?>