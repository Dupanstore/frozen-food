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

<script src="<?= base_url() ?>deskapp-master/vendors/scripts/dashboard3.js"></script>

<script>
	console.log = function() {}
	$("#pesan_barang").on('change', function() {

		$(".name").html($(this).find(':selected').attr('data-name'));
		$(".name").val($(this).find(':selected').attr('data-name'));
	});
</script>


</body>

</html>
