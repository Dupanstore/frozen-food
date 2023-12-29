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
								<li class="breadcrumb-item"><a href="<?= base_url('pimpinan') ?>">Home</a></li>
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
								<th>Nama Supplier</th>
								<th>Nama Barang</th>
								<th>Jumlah Return</th>
								<th>Alasan Return</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($barangs as $key => $value) { ?>
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
			<!-- Input Validation Start -->
			<div class="pd-20 card-box mb-30">
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="text-blue h4">Ajukan Return Barang</h4>
					</div>
				</div>
				<form action="<?= base_url('pimpinan/kirim') ?>" method="POST">
					<div class="row">
						<input type="hidden" name="id" class="id_return">
						<input type="hidden" name="id_barang" class="id_barang">
						<input type="hidden" name="name" class="name">
						<input type="hidden" name="price" class="price">
						<div class="col-md-6 col-sm-12">
							<div class="form-group has-success">
								<label class="form-control-label">Nama Barang</label>
								<select name="id" id="pesan_barang" class="form-control">
									<option>---Pilih Barang---</option>
									<?php foreach ($barangs as $key => $value) { ?>
										<option value="<?= $value->id_return ?>" data-barang="<?= $value->id_barang ?>" data-supp="<?= $value->nama_user ?>" data-name="<?= $value->nama_barang ?>" data-price="<?= $value->harga ?>"><?= $value->nama_barang ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group has-warning">
								<label class="form-control-label">Nama Supplier</label>
								<input type="text" class="id_user form-control" readonly>
							</div>

							<div class="form-group has-warning">
								<label class="form-control-label">Jumlah</label>
								<input type="number" name="qty" class="form-control form-control-warning">
							</div>

							<div class="form-group row">
								&nbsp;
								&nbsp;
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</div>
				</form>
				<br>
				<br>
				<form class="forms-sample" action="<?= base_url('pimpinan/cekout') ?>" method="POST">
					<?php
					$i = 1;
					foreach ($this->cart->contents() as $items) {
						echo form_hidden('qty' . $i++, $items['qty']);
					}
					$no_sr = date('Ymd') .  random_int(100, 9999);
					?>
					<input type="hidden" name="no_sr" value="<?= $no_sr ?>">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Nama Barang</th>
								<th scope="col">Jumlah Barang Keluar</th>
								<th scope="col">Harga Satuan Barang Keluar</th>
								<th scope="col">Total Harga Barang Keluar</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($this->cart->contents() as $key => $value) {
							?>
								<tr>
									<td class="table-plus"><?= $value['name'] ?></td>
									<td><?= $value['qty'] ?></td>
									<td>Rp. <?= number_format($value['price'], 0) ?></td>
									<td>Rp. <?= number_format($value['price'] * $value['qty'], 0) ?></td>
									<td><a href="<?= base_url('pimpinan/delete/' . $value['rowid']) ?>" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
					<?php
					$i = 1;
					foreach ($this->cart->contents() as $items) {
						echo form_hidden('qty' . $i++, $items['qty']);
					}
					?>
					<div class="form-group row">
						&nbsp;
						&nbsp;
						<button type="submit" class="btn btn-primary">Kirim</button>
					</div>
				</form>
			</div>
			<!-- Input Validation End -->
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
										<a href="<?= base_url('pimpinan/detail/' . $value->no_sr) ?>" class="btn btn-warning btn-sm"><i class="fa fa-check-circle-o"></i>Detail SR</a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>