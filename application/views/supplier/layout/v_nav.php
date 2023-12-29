<div class="left-side-bar">
	<div class="brand-logo">
		<a href="index.html">
			<img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
			<img src="vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
		</a>
		<div class="close-sidebar" data-toggle="left-sidebar-close">
			<i class="ion-close-round"></i>
		</div>
	</div>
	<div class="menu-block customscroll">
		<div class="sidebar-menu">
			<ul id="accordion-menu">
				<li class="dropdown">
					<a href="<?= base_url('supplier') ?>" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url('status_barang') ?>" class="dropdown-toggle no-arrow">
						<span class="micon dw dw-paper-plane"></span><span class="mtext">PO Barang Masuk</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url('supplier/return') ?>" class="dropdown-toggle no-arrow">
						<span class="micon fa fa-refresh"></span><span class="mtext">Return Barang</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="mobile-menu-overlay"></div>
