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
					<h4 class="text-blue h4">Return Barang</h4>
					<p class="mb-0">
						<a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#Medium-modal" type="button"><i class="fa fa-plus"></i>Return Barang</a>
					</p>
				</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">No</th>
								<th>Nama Supplier</th>
								<th>Nama Barang</th>
								<th>Jumlah Return</th>
								<th>Alasan Return</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($barang as $key => $value) { ?>
								<tr>
									<td class="table-plus"><?= $no++ ?></td>
									<td><?= $value->nama_user ?></td>
									<td><?= $value->nama_barang ?></td>
									<td><?= $value->jml ?> <?= $value->satuan_return ?></td>
									<td><?= $value->alasan_return ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- Simple Datatable End -->
			<br>
			<div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myLargeModalLabel">Return Barang</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
						<form action="<?= base_url('barang/add_return') ?>" enctype="multipart/form-data" accept-charset="utf-8" method="POST">
							<div class="modal-body">
								<?php
								$no_return = date('Ymd') .  random_int(100, 9999);
								$barang_masuk = $this->m_barang->barang();
								?>
								<input type="hidden" name="no_return" value="<?= $no_return ?>" id="">
								<div class="form-group">
									<select name="id_barang" id="supp" class="form-control">
										<option>--Pilih Barang Return</option>
										<?php foreach ($barang_masuk as $key => $bar) { ?>
											<option value="<?= $bar->id_barang ?>" data-supp="<?= $bar->nama_user ?>"><?= $bar->nama_barang ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group">
									<input type="text" name="nama_user" class="id_user form-control" placeholder="Nama Supplier" readonly>
								</div>
								<div class="form-group">
									<input type="number" name="jml" class="form-control" placeholder="Jumlah Return">
								</div>
								<div class="form-group">
									<select name="satuan_return" class="form-control">
										<option>--Pilih Satuan Return--</option>
										<option value="kg">KG</option>
										<option value="dus">Dus</option>
										<option value="sachet">Sachet</option>
									</select>
								</div>
								<div class="form-group">
									<input type="text" name="alasan_return" class="form-control" placeholder="Alasan Return">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Return</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<br>