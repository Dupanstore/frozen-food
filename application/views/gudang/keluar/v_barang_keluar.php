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
								<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
					</div>
				</div>
			</div>

			<!-- Input Validation Start -->
			<div class="pd-20 card-box mb-30">
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="text-blue h4">Input Barang Keluar</h4>
						<!-- <p class="mb-30">Validation styles for error, warning, and success</p> -->
					</div>
				</div>
				<form action="<?= base_url('kontrol_barang/kirim') ?>" method="POST">
					<div class="row">
						<input type="hidden" name="id" class="id_barang">
						<input type="hidden" name="name" class="name">
						<input type="hidden" name="price" class="price">
						<input type="hidden" name="stock" class="stock">
						<div class="col-md-6 col-sm-12">
							<div class="form-group has-success">
								<label class="form-control-label">Nama Barang</label>
								<select name="id" id="pesan_barang" class="form-control">
									<option>---Pilih Barang---</option>
									<?php foreach ($barang as $key => $value) { ?>
										<option value="<?= $value->id_barang ?>" data-name="<?= $value->nama_barang ?>" data-price="<?= $value->harga ?>" data-stock="<?= $value->stock ?>"><?= $value->nama_barang ?></option>
									<?php } ?>
								</select>
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
				<form class="forms-sample" action="<?= base_url('kontrol_barang/cekout') ?>" method="POST">
					<?php
					$i = 1;
					// $j = 1;
					foreach ($this->cart->contents() as $items) {
						echo form_hidden('qty' . $i++, $items['qty']);
						// echo form_hidden('dosis' . $j++, $items['dosis']);
					}
					$no_keluar = date('Ymd') .  random_int(100, 9999);
					?>
					<input type="hidden" name="no_keluar" value="<?= $no_keluar ?>">
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
									<td><a href="<?= base_url('kontrol_barang/delete/' . $value['rowid']) ?>" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a></td>
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

			<!-- Simple Datatable start -->
			<div class="card-box mb-30">
				<div class="pd-20">
					<h4 class="text-blue h4">Data Barang Keluar</h4>
					<!-- <p class="mb-0">you can find more options <a class="text-primary" href="https://datatables.net/" target="_blank">Click Here</a></p> -->
				</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">No</th>
								<th>No Keluar</th>
								<th>Nama Barang</th>
								<th>Jumlah Keluar Barang</th>
								<th>Harga Barang Keluar</th>
								<th>Total Harga Barang Keluar</th>
								<th>Status Barang</th>
								<th class="datatable-nosort">Tanggal Keluar</th>
							</tr>
						</thead>
						<tbody>
							<?php $j = 1;
							foreach ($barang_keluar as $key => $minst) {
							?>
								<tr>
									<td class="table-plus"><?= $j++ ?>
									<td><?= $minst->no_keluar ?></td>
									<td><?= $minst->nama_barang ?></td>
									<td><?= $minst->qty ?></td>
									<td>Rp. <?= number_format($minst->harga, 0) ?></td>
									<td>Rp. <?= number_format($minst->harga * $minst->qty, 0) ?></td>
									<td><span class="badge badge-danger"><?= $minst->status ?></span></td>
									<td><?= $minst->tanggal_keluar ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- Simple Datatable End -->