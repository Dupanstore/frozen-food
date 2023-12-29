<div class="main-container">
	<div class="pd-ltr-20">
		<div class="card-box pd-20 height-100-p mb-30">
			<div class="row align-items-center">
				<div class="col-md-2">
					<img src="<?= base_url() ?>deskapp-master/vendors/images/frozen-food.png" alt="">
				</div>
				<div class="col-md-8">
					<h4 class="font-20 weight-500 mb-10 text-capitalize">
						Welcome back <div class="weight-600 font-30 text-blue"><?= $this->session->userdata('nama_user') ?>!</div>
					</h4>
					<p class="font-18 max-width-600">Kelola Gudang Frozen Food</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 mb-30">
				<div class="card-box pd-30 pt-10 height-100-p">
					<h2 class="mb-30 h4">Stock Barang</h2>
					<div class="browser-visits">
						<ul>
							<?php foreach ($barang as $key => $value) { ?>
								<li class="d-flex flex-wrap align-items-center">
									<div class="icon"><img src="<?= base_url('assets/barang/' . $value->gambar) ?>" alt=""></div>
									<div class="browser-name"><?= $value->nama_barang ?></div>
									<?php if ($value->stock >= 50) { ?>
										<div class="visit"><span class="badge badge-pill badge-primary">Penuh</span></div>
									<?php } elseif ($value->stock >= 21 && $value->stock <= 50) { ?>
										<div class="visit"><span class="badge badge-pill badge-warning">Sedang</span></div>
									<?php } elseif ($value->stock <= 20) { ?>
										<div class="visit"><span class="badge badge-pill badge-danger">Kurang</span></div>
									<?php } ?>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
