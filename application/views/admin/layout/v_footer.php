<div class="footer-wrap pd-20 mb-20 card-box">
	Toko Mebel <a href="#" target="_blank">Indah Jaya</a>
</div>
</div>
</div>
<!-- js -->
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/core.js"></script>
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/script.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/process.js"></script>
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/layout-settings.js"></script>

<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>

<script src="<?= base_url() ?>deskapp-master/src/plugins/jQuery-Knob-master/jquery.knob.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
<script src="<?= base_url() ?>deskapp-master/src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>


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
<script src="<?= base_url() ?>deskapp-master/vendors/scripts/dashboard2.js"></script>

<script>
	console.log = function() {}
	$("#pesan_barang").on('change', function() {

		$(".name").html($(this).find(':selected').attr('data-name'));
		$(".name").val($(this).find(':selected').attr('data-name'));

		$(".price").html($(this).find(':selected').attr('data-price'));
		$(".price").val($(this).find(':selected').attr('data-price'));

	});
</script>

</body>

</html>