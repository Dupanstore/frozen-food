<div class="footer-wrap pd-20 mb-20 card-box">
	Toko <a href="#" target="_blank">FROZEN FOOD</a>
</div>
</div>
</div>
<!-- js -->
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/core.js"></script>
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/script.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/process.js"></script>
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/layout-settings.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/apexcharts/apexcharts.min.js"></script>

<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>

<!-- buttons for Export datatable -->
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/buttons.flash.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/pdfmake.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/vfs_fonts.js"></script>
<!-- Datatable Setting js -->
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/datatable-setting.js"></script>

<!-- <script src="<?= base_url() ?>deskapp-master/vendors/scripts/dashboard.js"></script> -->
<script>
	console.log = function() {}
	$("#pesan_barang").on('change', function() {

		$(".name").html($(this).find(':selected').attr('data-name'));
		$(".name").val($(this).find(':selected').attr('data-name'));

		$(".price").html($(this).find(':selected').attr('data-price'));
		$(".price").val($(this).find(':selected').attr('data-price'));

		$(".id_user").html($(this).find(':selected').attr('data-supp'));
		$(".id_user").val($(this).find(':selected').attr('data-supp'));

		$(".id_barang").html($(this).find(':selected').attr('data-barang'));
		$(".id_barang").val($(this).find(':selected').attr('data-barang'));

	});
</script>

</body>

</html>
