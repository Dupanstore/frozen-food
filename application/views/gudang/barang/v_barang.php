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
					<h4 class="text-blue h4">Data Barang Masuk</h4>
					<p class="mb-0"><a class="text-primary" href="<?= base_url('barang/add') ?>"><button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Barang Masuk</button></a></p>
				</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">No</th>
								<th>Gambar</th>
								<th>Nama Supplier</th>
								<th>Nama Barang</th>
								<th>Stock Barang</th>
								<th>Satuan Barang</th>
								<th>Harga Satuan Barang</th>
								<th>Deskripsi Barang</th>
								<th class="datatable-nosort">Action</th>
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
									<td><?= $value->stock ?></td>
									<td><?= $value->satuan ?></td>
									<td>Rp. <?= number_format($value->harga, 0) ?></td>
									<td><?= $value->deskripsi ?></td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="<?= base_url('barang/update/' . $value->id_barang) ?>"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="<?= base_url('barang/delete/' . $value->id_barang) ?>"><i class="dw dw-delete-3"></i> Delete</a>
											</div>
										</div>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- Simple Datatable End -->