<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
	<div class="copyright">
		JAHIT PUMIRA
	</div>
	<div class="credits">
		ADMIN
	</div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- Vendor JS Files -->
<script src="<?= base_url('asset/NiceAdmin/') ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url('asset/NiceAdmin/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('asset/NiceAdmin/') ?>assets/vendor/chart.js/chart.min.js"></script>
<script src="<?= base_url('asset/NiceAdmin/') ?>assets/vendor/echarts/echarts.min.js"></script>
<script src="<?= base_url('asset/NiceAdmin/') ?>assets/vendor/quill/quill.min.js"></script>
<script src="<?= base_url('asset/NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js') ?>"></script>
<script src="<?= base_url('asset/NiceAdmin/') ?>assets/vendor/tinymce/tinymce.min.js"></script>
<script src="<?= base_url('asset/NiceAdmin/') ?>assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url('asset/NiceAdmin/') ?>assets/js/main.js"></script>
<script src="<?= base_url('asset/jquery.min.js') ?>"></script>
<script>
	window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(500, function() {
			$(this).remove();
		});
	}, 3000)
</script>
<script>
	$("#size").on('change', function() {

		$(".harga").html($(this).find(':selected').attr('data-harga'));
		$(".harga").val($(this).find(':selected').attr('data-harga'));

		$(".stok").html($(this).find(':selected').attr('data-stok'));
		$(".stok").val($(this).find(':selected').attr('data-stok'));

		$(".nama").html($(this).find(':selected').attr('data-nama'));
		$(".nama").val($(this).find(':selected').attr('data-nama'));

		$(".size_t").html($(this).find(':selected').attr('data-size'));
		$(".size_t").val($(this).find(':selected').attr('data-size'));

	});
</script>

<script type="text/javascript">
	$(document).ready(function() {

		$('#produk').change(function() {
			var id = $(this).val();
			$.ajax({
				url: "<?= base_url('admin/transaksilangsung/get_size'); ?>",
				method: "POST",
				data: {
					id: id
				},
				async: true,
				dataType: 'json',
				success: function(data) {

					var html = '';
					var i;
					html = '<option>---Pilih Size---</option>'
					for (i = 0; i < data.length; i++) {
						html += '<option data-size=' + data[i].size + ' data-nama=' + data[i].nama_produk + ' data-stok=' + data[i].stok + ' data-harga=' + data[i].harga + ' value=' + data[i].id_size + '>' + data[i].size + '</option>';
					}
					$('#size').html(html);

				}
			});
			return false;
		});

	});
</script>
<script>
	$("#hide").click(function() {
		$(".file-data-diskon").slideUp("slow");
	});
	$('.diskon tbody').on('click', 'button', function() {
		console.log($(this).attr("data-produk"));
		$.ajax({
			url: '<?= base_url() ?>Admin/KelolaDataMaster/produk_diskon/' + $(this).attr("data-produk"),
			dataType: 'json',
			type: 'get',
			contentType: 'application/x-www-form-urlencoded',
			data: $(this).serialize(),
			success: function(data, textStatus, jQxhr) {
				$('#list-diskon').html("");
				console.log(data.diskon.length);
				for (var i = 0; i < data.diskon.length; i++) {
					console.log(data.diskon.length);
					$('#list-diskon').append("<tr><td>" + data.diskon[i].nama_produk + "</td><td> Size <strong>" + data.diskon[i].size + "</strong></td><td> Dari Harga Rp. " + data.diskon[i].harga + "</td><td> Diskon : " + data.diskon[i].besar_diskon + "% => Rp. <strong>" + parseInt(data.diskon[i].harga - (data.diskon[i].besar_diskon / 100 * data.diskon[i].harga)) + " </strong></td></tr>");
				}
				$('.file-data-diskon').slideDown('slow');
			},
			error: function(jqXhr, textStatus, errorThrown) {
				console.log(errorThrown);
			}
		});
	});
</script>
<script>
	$("#kembali").click(function() {
		$(".detail_pesanan").slideUp("slow");
	});
	$('.detail tbody').on('click', 'button', function() {
		console.log($(this).attr("data-id"));
		$.ajax({
			url: '<?= base_url() ?>Admin/Transaksi/detail_pesanan/' + $(this).attr("data-id"),
			dataType: 'json',
			type: 'get',
			contentType: 'application/x-www-form-urlencoded',
			data: $(this).serialize(),
			success: function(data, textStatus, jQxhr) {
				$('#list_detail').html("");
				console.log(data.detail);
				for (var i = 0; i < data.detail.length; i++) {
					console.log(data.detail.length);
					$('#list_detail').append("<tr><td>" + data.detail[i].nama_produk + "| Size" + data.detail[i].size + "</td><td>" + data.detail[i].qty + "</td><td>" + data.detail[i].harga + "</td><td>" + data.detail[i].harga * data.detail[i].qty + "</td></tr>");
				}
				$('.detail_pesanan').slideDown('slow');
			},
			error: function(jqXhr, textStatus, errorThrown) {
				console.log(errorThrown);
			}
		});
	});
</script>
</body>

</html>
