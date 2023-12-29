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
					<h4 class="text-blue h4">Return Barang</h4>
				</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">No</th>
								<th>No SR</th>
								<th>Nama User</th>
								<th>Tanggal SR</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($barangsr as $key => $value) { ?>
								<tr>
									<td class="table-plus"><?= $no++ ?></td>
									<td><?= $value->no_sr ?></td>
									<td><?= $value->nama_user ?></td>
									<td><?= $value->tgl_sr ?></td>
									<td>
										<a href="<?= base_url('supplier/detail/' . $value->no_sr) ?>" class="btn btn-warning btn-sm"><i class="fa fa-check-circle-o"></i>Detail SR</a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>