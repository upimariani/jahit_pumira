<!-- Footer Start -->
<div class="container-fluid bg-secondary text-dark mt-5 pt-5">

    <div class="row border-top border-light mx-xl-5 py-4">
        <div class="col-md-6 px-xl-0">
            <p class="mb-md-0 text-center text-md-left text-dark">
                &copy; <a class="text-dark font-weight-semi-bold" href="#">Your Site Name</a>. All Rights Reserved. Designed
                by
                <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a><br>
                Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
            </p>
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
            <img class="img-fluid" src="img/payments.png" alt="">
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="<?= base_url('asset/jquery.min.js') ?>"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('asset/eshopper/') ?>lib/easing/easing.min.js"></script>
<script src="<?= base_url('asset/eshopper/') ?>lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="<?= base_url('asset/eshopper/') ?>mail/jqBootstrapValidation.min.js"></script>
<script src="<?= base_url('asset/eshopper/') ?>mail/contact.js"></script>

<!-- Template Javascript -->
<script src="<?= base_url('asset/eshopper/') ?>js/main.js"></script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000)
</script>
<script>
    $("#hide").click(function() {
        $(".detail_pesanan").slideUp("slow");
    });
    $('.status_order tbody').on('click', 'button', function() {
        console.log($(this).attr("data-id"));
        $.ajax({
            url: '<?= base_url() ?>Pelanggan/Katalog/detail_order/' + $(this).attr("data-id"),
            dataType: 'json',
            type: 'get',
            contentType: 'application/x-www-form-urlencoded',
            data: $(this).serialize(),
            success: function(data, textStatus, jQxhr) {
                $('#detail').html("");
                console.log(data.produk.length);
                for (var i = 0; i < data.produk.length; i++) {
                    console.log(data.produk.length);
                    $('#detail').append("<tr><td>" + data.produk[i].nama_produk + "</td><td>(" + data.produk[i].qty + ")x</td><td>Rp. " + data.produk[i].harga + "</td></tr>");
                }
                $('.detail_pesanan').slideDown('slow');
            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });
</script>
<script>
    $("#produk").on('change', function() {

        $(".price-view").html($(this).find(':selected').attr('data-price-view'));
        $(".price-view").val($(this).find(':selected').attr('data-price-view'));

        $(".price").html($(this).find(':selected').attr('data-price'));
        $(".price").val($(this).find(':selected').attr('data-price'));

        $(".diskon").html($(this).find(':selected').attr('data-diskon'));
        $(".diskon").val($(this).find(':selected').attr('data-diskon'));

        $(".size").html($(this).find(':selected').attr('data-size'));
        $(".size").val($(this).find(':selected').attr('data-size'));

        $(".stok").html($(this).find(':selected').attr('data-stok'));
        $(".stok").val($(this).find(':selected').attr('data-stok'));
    });
</script>


</body>

</html>