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
						<h4 class="text-blue h4">Form Edit data barang</h4>
						<!-- <p class="mb-30">All bootstrap element classies</p> -->
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
				echo form_open_multipart('barang/update_supplier/' . $details->id_barang) ?>
				<div class="form-group row">
					<label class="col-sm-12 col-md-2 col-form-label">Harga Sataun Barang</label>
					<div class="col-md-10 col-sm-12">
						<input class="form-control" name="harga" placeholder="Harga Barang" value="<?= $details->harga ?>" type="number">
					</div>
				</div>
				<div class="form-group row">
					<button type="submit" class="btn btn-success">Update Barang</button>&nbsp;
					<a href="<?= base_url('barang') ?>" class="btn btn-warning">Kembali</a>
				</div>
				</form>
			</div>
			<!-- Default Basic Forms End -->
