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
								<li class="breadcrumb-item"><a href="<?= base_url('gudang') ?>">Home</a></li>
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
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">No</th>
								<th>Gambar</th>
								<th>Nama Supplier</th>
								<th>Nama Barang</th>
								<th>Kategori Barang</th>
								<th>Stock Barang</th>
								<th>Harga Satuan Barang</th>
								<th>Deskripsi Barang</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($barang as $key => $value) { ?>
								<tr>
									<td class="table-plus"><?= $no++ ?></td>
									<td>
										<img src="<?= base_url('/assets/barang/' . $value->gambar) ?>" width="70" height="70" alt="">
									</td>
									<td><?= $value->nama_user ?></td>
									<td><?= $value->nama_barang ?></td>
									<td><?= $value->kategori_barang ?></td>
									<td><?= $value->stock ?></td>
									<td>Rp. <?= number_format($value->harga, 0) ?></td>
									<td><?= $value->deskripsi ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- Simple Datatable End -->