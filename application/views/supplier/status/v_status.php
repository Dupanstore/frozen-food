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
								<li class="breadcrumb-item"><a href="<?= base_url('supplier') ?>">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">

					</div>
				</div>
			</div>
			<!-- Simple Datatable start -->
			<div class="card-box pb-10">
				<!-- <div class="h5 pd-20 mb-0">Recent Patient</div> -->
				<table class="data-table table nowrap">
					<thead>
						<tr>
							<th class="table-plus">No Pesanan Barang</th>
							<!-- <th>Kategori Barang</th> -->
							<!-- <th>Jumlah Kirim</th> -->
							<th>Total Harga Pesanan</th>
							<th>Tanggal Proses</th>
							<th>Status</th>
							<th class="datatable-nosort">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($masuk as $key => $value) { ?>
							<tr>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<!-- <div class="avatar mr-2 flex-shrink-0">
											<img src="<?= base_url('assets/barang/' . $value->gambar) ?>" class="border-radius-100 shadow" width="40" height="40" alt="">
										</div> -->
										<div class="txt">
											<div class="weight-600"><?= $value->no_pengiriman ?></div>
										</div>
									</div>
								</td>
								<!-- <td><?= $value->kategori_barang ?></td> -->
								<!-- <td><?= $value->qty ?></td> -->
								<td>Rp. <?= number_format($value->total_bayar, 0) ?></td>
								<td><?= $value->tanggal_kirim ?></td>
								<td>
									<?php if ($value->status == '0') { ?>
										<span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Menunggu Konfirmasi</span>
									<?php } elseif ($value->status == '1') { ?>
										<span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Dikonfirmasi</span>
									<?php } elseif ($value->status == '2') { ?>
										<span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">DiKirim</span>
									<?php } elseif ($value->status == '3') { ?>
										<span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Selesai Pembayaran</span>
									<?php } elseif ($value->status == '4') { ?>
										<span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Selesai</span>
									<?php } ?>
								</td>
								<td>
									<div class="table-actions">
										<?php if ($value->status == '0') { ?>
											<a href="<?= base_url('status_barang/detail/' . $value->no_pengiriman) ?>" class="btn btn-outline-warning"><i class="fa fa-check-circle"></i>Detail PO</a>
										<?php } elseif ($value->status == '1') { ?>
											<!-- <a href="#" class="btn-block" data-color="#265ed7" data-toggle="modal" data-target="#Medium-modal<?= $value->no_pengiriman ?>" type="button">
												<i class="fa fa-send"></i>Kirim
											</a> -->
											<a href="<?= base_url('status_barang/kirim/' . $value->no_pengiriman) ?>" data-color="#265ed7"><i class="fa fa-send"></i>Kirim</a>
										<?php } elseif ($value->status == '3') { ?>
											<a href="<?= base_url('status_barang_order/cek_bayar/' . $value->no_pengiriman) ?>" class="btn btn-outline-success"><i class="fa fa-check-square"></i>Cek Pembayaran</a>
										<?php } ?>
									</div>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<!-- Simple Datatable End -->
			<br>
			<?php foreach ($masuk as $key => $modal) { ?>
				<div class="modal fade" id="Medium-modal<?= $modal->no_pengiriman ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="myLargeModalLabel">Kirim Barang</h4>
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							</div>
							<form action="<?= base_url('status_barang/kirim/' . $modal->no_pengiriman) ?>" method="POST">
								<div class="modal-body">
									<div class="form-group">
										<input type="text" name="no_resi" class="form-control" placeholder="No pengiriman" required>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Kirim</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			<?php } ?>