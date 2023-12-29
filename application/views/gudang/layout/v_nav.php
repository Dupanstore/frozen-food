<div class="left-side-bar">
	<div class="brand-logo">
		<a href="index.html">
			<!-- <img src="<?= base_url() ?>deskapp-master/vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
			<img src="<?= base_url() ?>deskapp-master/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo"> -->
		</a>
		<div class="close-sidebar" data-toggle="left-sidebar-close">
			<i class="ion-close-round"></i>
		</div>
	</div>
	<div class="menu-block customscroll">
		<div class="sidebar-menu">
			<ul id="accordion-menu">
				<li class="dropdown">
					<a href="<?= base_url('gudang') ?>" class="dropdown-toggle no-arrow">
						<span class=" micon dw dw-house-1"></span><span class="mtext">Home</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="<?= base_url('barang/minimal') ?>" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-edit2"></span><span class="mtext">Input Stock Barang</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url('status_barang_order') ?>" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-inbox-4"></span><span class="mtext">Transaksi Barang Masuk</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="<?= base_url('barang') ?>" class="dropdown-toggle no-arrow">
						<span class="micon fa fa-cubes"></span><span class="mtext">Input Barang Masuk</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="<?= base_url('barang/kasir') ?>" class="dropdown-toggle no-arrow">
						<span class="micon fa fa-cart-arrow-down"> </span><span class="mtext">Kasir</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url('kontrol_barang/keluar') ?>" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-paper-plane"></span><span class="mtext">Barang Keluar</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url('barang/return') ?>" class="dropdown-toggle no-arrow">
						<span class="micon fa fa-refresh"></span><span class="mtext">Return Barang</span>
					</a>
				</li>
				<li class="dropdown">
					<a href="<?= base_url('cari_transaksi/trx') ?>" class="dropdown-toggle no-arrow">
						<span class="micon fa fa-cart-arrow-down"> </span><span class="mtext">Cari Transaksi</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="mobile-menu-overlay"></div>