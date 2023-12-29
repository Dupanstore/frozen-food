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
					<h4 class="text-blue h4">Data Kategori</h4>
					<p class="mb-0">
						<a href="#" data-toggle="modal" data-target="#Medium-modal"><button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Kategori Barang</button></a>
					</p>
					</p>
				</div>
				<div class="pb-20">
					<table class="data-table table stripe hover nowrap">
						<thead>
							<tr>
								<th class="table-plus datatable-nosort">No</th>
								<th>Nama Kategori Barang</th>
								<th class="datatable-nosort">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($kategori as $key => $value) { ?>
								<tr>
									<td class="table-plus"><?= $no++ ?></td>
									<td><?= $value->kategori_barang ?></td>
									<td>
										<div class="table-actions">
											<a href="#" data-toggle="modal" data-target="#Edit-modal<?= $value->id_kategori ?>" type="button" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
											<a href="#" data-toggle="modal" data-target="#Delete-modal<?= $value->id_kategori ?>" type="button" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
										</div>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- Simple Datatable End -->

			<!-- MODAL ADD  -->
			<div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myLargeModalLabel">Tambah Kategori Barang</h4>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</div>
						<form action="<?= base_url('kategori/add') ?>" method="POST">
							<div class="modal-body">
								<div class="form-group row">
									<label class="col-sm-12 col-md-2 col-form-label">Kategori Barang</label>
									<div class="col-sm-12 col-md-10">
										<input class="form-control" type="text" name="kategori_barang" required>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- END -->

			<!-- MODAL EDIT -->
			<?php foreach ($kategori as $key => $update) { ?>
				<div class="modal fade" id="Edit-modal<?= $update->id_kategori ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="myLargeModalLabel">Tambah Kategori Barang</h4>
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							</div>
							<form action="<?= base_url('kategori/update/' . $update->id_kategori) ?>" method="POST">
								<div class="modal-body">
									<div class="form-group row">
										<label class="col-sm-12 col-md-2 col-form-label">Kategori Barang</label>
										<div class="col-sm-12 col-md-10">
											<input class="form-control" type="text" name="kategori_barang" value="<?= $update->kategori_barang ?>">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Save changes</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			<?php } ?>
			<!-- END -->

			<!-- MODAL DELETE -->
			<?php foreach ($kategori as $key => $del) { ?>
				<div class="modal fade" id="Delete-modal<?= $del->id_kategori ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="myLargeModalLabel">Delete Kategori Barang</h4>
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							</div>
							<div class="modal-body">
								<p>Apakah anda yakin hapus kategori barang <?= $del->kategori_barang ?></p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<a href="<?= base_url('kategori/delete/' . $del->id_kategori) ?>" class="btn btn-primary">Save changes</a>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
			<!-- END -->