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
			<div class="card-box mb-30">
				<div class="pd-20">
					<h4 class="text-blue h4">Data Barang</h4>
				</div>
				<!-- <form action="<?= base_url('kirim/add_cart') ?>" onclick="window.location.href='<?= base_url('kirim') ?>'" method="post"> -->

				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">No</th>
								<th>Gambar</th>
								<th>Nama Barang</th>
								<th>Nama Supplier</th>
								<th>Kategori Barang</th>
								<th>Stock Barang</th>
								<th>Harga Barang</th>
								<th class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($list_kirim as $key => $value) { ?>
								<tr>
									<form action="<?= base_url('kirim/pesan') ?>" method="POST">
										<input type="hidden" name="name" value="<?= $value->nama_barang ?>">
										<input type="hidden" name="id" value="<?= $value->id_barang ?>">
										<input type="hidden" name="qty" value="1">
										<input type="hidden" name="price" value="<?= $value->harga ?>">
										<input type="hidden" name="stock" value="<?= $value->stock ?>">
										<td class="table-plus"><?= $no++ ?></td>
										<td>
											<img src="<?= base_url('/assets/barang/' . $value->gambar) ?>" width="70" height="70" alt="">
										</td>
										<td><?= $value->nama_barang ?></td>
										<td><?= $value->nama_user ?></td>
										<td><?= $value->kategori_barang ?></td>
										<td>
											<?= $value->stock ?>
											<br>
											<?php if ($value->stock <= 20) { ?>
												<span class="badge badge-danger">Stock Menipis</span>
											<?php } elseif ($value->stock >= 21) { ?>
												<span class="badge badge-success">Stock Normal</span>
											<?php } ?>
										</td>
										<td>Rp. <?= number_format($value->harga, 0) ?></td>
										<td>
											<div class="table-actions">
												<?php if ($value->stock >= 21) { ?>
													<button type="submit" class="btn btn-success"><i class="icon-copy ion-android-send"></i></button>
												<?php } elseif ($value->stock <= 20) { ?>
													<button type="submit" class="btn btn-danger"><i class="icon-copy ion-android-send"></i></button>
												<?php } ?>
												<!-- <a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a> -->
											</div>
										</td>
									</form>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<!-- </form> -->
			</div>
			<!-- Simple Datatable End -->