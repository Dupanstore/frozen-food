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
					<h4 class="text-blue h4">PO Barang</h4>
				</div>
				<?php
				if ($this->session->flashdata('pesan')) {
					echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check"></i>';
					echo $this->session->flashdata('pesan');
					echo '</h5></div>';
				} ?>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">No</th>
								<th>Nama Barang</th>
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
										<input type="hidden" name="id" value="<?= $value->id_barang_minimal ?>">
										<input type="hidden" name="qty" value="1">
										<input type="hidden" name="price" value="<?= $value->harga ?>">
										<input type="hidden" name="stock" value="<?= $value->stok ?>">
										<td class="table-plus"><?= $no++ ?></td>
										<td><?= $value->nama_barang ?></td>
										<td>
											<?= $value->stok ?>
											<br>
											<?php if ($value->stok <= 20) { ?>
												<span class="badge badge-danger">Stock Menipis</span>
											<?php } elseif ($value->stok >= 21) { ?>
												<span class="badge badge-success">Stock Normal</span>
											<?php } ?>
										</td>
										<td>Rp. <?= number_format($value->harga, 0) ?></td>
										<td>
											<div class="table-actions">
												<?php if ($value->stok >= 21) { ?>
													<button type="submit" class="btn btn-success"><i class="icon-copy ion-android-send"></i>ADD PO</button>
												<?php } elseif ($value->stok <= 20) { ?>
													<button type="submit" class="btn btn-danger"><i class="icon-copy ion-android-send"></i>ADD PO</button>
												<?php } ?>
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