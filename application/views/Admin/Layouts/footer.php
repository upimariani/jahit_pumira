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
</body>

</html>