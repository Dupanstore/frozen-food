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
				<form class="bg0 p-t-75 p-b-85" action="<?= base_url('kirim/update') ?>" method="POST">
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Nama Barang</th>
									<th>Jumlah Kirim</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php
								foreach ($this->cart->contents() as $items) {
								?>
									<tr class="table_row">
										<td><?php echo $items['name'] ?></td>
										<td>
											<div class="quantity">
												<?php echo form_input(
													array(
														'name' => $i . '[qty]',
														'value' => $items['qty'],
														'maxlength' => '3',
														'min' => '0',
														'max' => 'stock',
														'size' => '5',
														'type' => 'number',
														'class' => 'form-control'
													)
												); ?>
											</div>
										</td>
										<td>
											<div class="table-actions">
												<a href="<?= base_url('kirim/delete/' . $items['rowid']) ?>" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
											</div>
										</td>
									</tr>
									<?php $i++; ?>
								<?php } ?>
							</tbody>
						</table>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							&nbsp;&nbsp;
							<button type="submit" class="btn btn-warning">
								Update Jumlah Kirim
							</button>
							&nbsp;&nbsp;
							<a href="<?= base_url('kirim') ?>" class="btn btn-primary">Tambah Barang</a>
						</div>
					</div>
				</form>
				<form action="<?= base_url('kirim/cekout') ?>" method="post">
					<?php $no_pengiriman = date('Ymd') . strtoupper(random_string('alnum', 8));
					?>
					<input type="hidden" name="no_pengiriman" value="<?= $no_pengiriman ?>">
					<?php
					$i = 1;
					foreach ($this->cart->contents() as $items) {
						echo form_hidden('qty' . $i++, $items['qty']);
					}
					?>
					<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
						&nbsp;&nbsp;
						<button type="submit" class="btn btn-success">Kirim Barang</button>
					</div>
					<br>
					<br>
				</form>
			</div>
			<!-- Simple Datatable End -->