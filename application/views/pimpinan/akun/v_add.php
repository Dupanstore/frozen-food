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

			<!-- Default Basic Forms Start -->
			<div class="pd-20 card-box mb-30">
				<div class="clearfix">
					<div class="pull-left">
						<h4 class="text-blue h4">Tambah data akun</h4>
					</div>
				</div>
				<?php
				//notifikasi form kosong
				echo validation_errors('<div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i>', '</h5></div>');

				//notifikasi gagal upload gambar
				if (isset($error_upload)) {
					echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i>' . $error_upload . '</h5></div>';
				}
				echo form_open_multipart('akun/add') ?>
				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Nama</label>
					<div class="col-sm-12 col-md-10">
						<input class="form-control" name="nama_user" placeholder="Nama user" type="text">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Username</label>
					<div class="col-sm-12 col-md-10">
						<input class="form-control" name="username" placeholder="Username" type="text">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Password</label>
					<div class="col-sm-12 col-md-10">
						<input class="form-control" name="password" placeholder="Password" type="password">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Level User</label>
					<div class="col-sm-12 col-md-10">
						<select class="custom-select col-12" name="level_user">
							<option selected="">Pilih Level user...</option>
							<!-- <option value="1">Penjual</option> -->
							<option value="2">Karyawan</option>
							<option value="3">Supplier</option>
							<option value="4">Pimpinan</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Profil</label>
					<div class="col-sm-12 col-md-10">
						<input class="form-control" placeholder="Gambar" name="profil" type="file">
					</div>
				</div>
				<div class="form-group row">
					<button type="submit" class="btn btn-success">Tambah AKun</button>&nbsp;
					<a href="<?= base_url('akun') ?>" class="btn btn-warning">Kembali</a>
				</div>
				</form>
			</div>
			<!-- Default Basic Forms End -->