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
								<li class="breadcrumb-item"><a href="index.html">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
							</ol>
						</nav>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
					</div>
				</div>
			</div>

			<!-- Default Basic Forms Start -->
			<div class="pd-20 card-box mb-30">
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="text-blue h4">Tambah data barang</h4>
					</div>
				</div>
				<?php
				//notifikasi form kosong
				echo validation_errors('<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i>', '</h5></div>');

				echo form_open('barang/add_minimal') ?>

				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Nama Barang</label>
					<div class="col-sm-12 col-md-10">
						<input class="form-control" name="nama_barang" placeholder="Nama barang" type="text">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Stock Barang</label>
					<div class="col-md-10 col-sm-12">
						<input class="form-control" name="stok" placeholder="Stock Barang" type="number">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Satuan Barang</label>
					<div class="col-md-10 col-sm-12">
						<select name="satuan" class="form-control">
							<option>--Pilih Satuan--</option>
							<option value="kg">KG</option>
							<option value="dus">Dus</option>
							<option value="sachet">Sachet</option>
							<option value="packs">Packs</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Harga Satuan Barang</label>
					<div class="col-md-10 col-sm-12">
						<input class="form-control" name="harga" placeholder="Harga Satuan Barang" type="number">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Deskripsi Barang</label>
					<div class="col-sm-12 col-md-10">
						<textarea class="textarea_editor form-control border-radius-0" name="deskripsi" placeholder="Enter text ..."></textarea>
					</div>
				</div>
				<div class="form-group row">
					<button type="submit" class="btn btn-success">Tambah Barang</button>&nbsp;
					<a href="<?= base_url('barang/minimal') ?>" class="btn btn-warning">Kembali</a>
				</div>
				</form>
			</div>
			<!-- Default Basic Forms End -->