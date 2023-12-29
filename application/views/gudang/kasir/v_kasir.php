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
			<div class="row">
				<div class="col-md-6 col-sm-12 mb-30">
					<div class="pd-20 card-box height-100-p">
						<!-- Input Validation Start -->
						<div class="pd-20 card-box mb-30">
							<div class="clearfix">
								<div class="pull-left">
									<h4 class="text-blue h4">Input Transaksi Pelanggan</h4>
									<!-- <p class="mb-30">Validation styles for error, warning, and success</p> -->
								</div>
							</div>
							<form action="<?= base_url('gudang/kirim') ?>" method="POST">
								<div class="row">
									<input type="hidden" name="id" class="id_barang_minimal">
									<input type="hidden" name="name" class="name">
									<input type="hidden" name="price" class="price">
									<input type="hidden" name="stok" class="stok">
									<div class="col-md-12 col-sm-12">
										<div class="form-group has-success">
											<label class="form-control-label">Nama Barang</label>
											<select name="id" id="pesan_barang" class="form-control">
												<option>---Pilih Barang---</option>
												<?php foreach ($barang as $key => $value) { ?>
													<option value="<?= $value->id_barang_minimal ?>" data-name="<?= $value->nama_barang ?>" data-stok="<?= $value->stok ?>" data-price="<?= $value->harga ?>"><?= $value->nama_barang ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="form-group has-warning">
											<label class="form-control-label">Harga</label>
											<input type="number" name="price" class="form-control form-control-warning">
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
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 mb-30">
					<div class="pd-20 card-box height-100-p">
						<br>
						<div class="pd-20 card-box mb-30">
							<br>
							<form class="forms-sample" action="<?= base_url('gudang/cekout') ?>" method="POST">
								<?php
								$i = 1;
								foreach ($this->cart->contents() as $items) {
									echo form_hidden('qty' . $i++, $items['qty']);
								}
								$no_transaksi = date('Ymd') .  random_int(100, 9999);
								?>
								<input type="hidden" name="no_transaksi" value="<?= $no_transaksi ?>">
								<table class="table">
									<thead>
										<tr>
											<th scope="col">Nama Barang</th>
											<th scope="col">Qty</th>
											<th scope="col">Harga Satuan</th>
											<th scope="col">Total Harga</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($this->cart->contents() as $key => $value) {
										?>
											<tr>
												<input type="hidden" name="harga" value="<?= $value['price'] ?>">
												<input type="hidden" name="total_harga" value="<?= $value['price'] * $value['qty'] ?>">
												<td class="table-plus"><?= $value['name'] ?></td>
												<td><?= $value['qty'] ?></td>
												<td>Rp. <?= number_format($value['price'], 0) ?></td>
												<td>Rp. <?= number_format($value['price'] * $value['qty'], 0) ?></td>
												<td><a href="<?= base_url('gudang/delete/' . $value['rowid']) ?>" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a></td>
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
									<button type="submit" class="btn btn-primary">Cekout</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Input Validation End -->

		<!-- Simple Datatable start -->
		<div class="card-box mb-30">
			<div class="pd-20">
				<h4 class="text-blue h4">Data Transaksi Kasir</h4>
				<!-- <p class="mb-0">you can find more options <a class="text-primary" href="https://datatables.net/" target="_blank">Click Here</a></p> -->
			</div>
			<div class="pb-20">
				<table class="data-table table stripe hover nowrap">
					<thead>
						<tr>
							<th class="table-plus datatable-nosort">No</th>
							<th>No Transaksi</th>
							<th>Tanggal Kadaluarsa</th>
							<th>Tanggal Transaksi</th>
							<th>Nama Barang</th>
							<th>Harga Barang</th>
							<th>Qty</th>
							<th>Total Harga </th>
						</tr>
					</thead>
					<tbody>
						<?php $j = 1;
						foreach ($transaksi as $key => $minst) {
						?>
							<tr>
								<td class="table-plus"><?= $j++ ?>
								<td><?= $minst->no_transaksi ?></td>
								<td><?= $minst->tgl_kadaluarsa ?></td>
								<td><?= $minst->tgl_transaksi ?></td>
								<td><?= $minst->nama_barang ?></td>
								<td>Rp. <?= number_format($minst->harga, 0) ?></td>
								<td><?= $minst->qty ?></td>
								<td>Rp. <?= number_format($minst->total_harga, 0) ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- Simple Datatable End -->