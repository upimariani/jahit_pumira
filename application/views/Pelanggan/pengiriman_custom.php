<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Checkout</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<form action="<?= base_url('pelanggan/katalog/checkout') ?>" method="POST">
    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <input name="estimasi" hidden>
                    <input name="ongkir" hidden>
                    <input name="total_bayar" hidden>
                    <input name="subtotal" value="<?= $this->cart->total() ?>" hidden>
                    <?php $id_transaksi = date('Ymd') . strtoupper(random_string('alnum', 8));
                    ?>
                    <input type="hidden" name="id_transaksi" value="<?= $id_transaksi ?>">
                    <!-- simpan detail pembelian -->
                    <?php
                    $i = 1;
                    foreach ($this->cart->contents() as $items) {
                        echo form_hidden('qty' . $i++, $items['qty']);
                    }
                    ?>
                    <!-- menghitung berat produk -->
                    <?php
                    $tot_berat = 0;
                    foreach ($this->cart->contents() as $items) {
                        $berat = $items['qty'] *  $items['netto'];
                        $tot_berat = $tot_berat + $berat;
                    ?>
                    <?php } ?>
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Atas Nama</label>
                            <input class="form-control" type="text" placeholder="John">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>No Telepon</label>
                            <input class="form-control" type="text" placeholder="Doe">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Provinsi</label>
                            <select name="provinsi" class="custom-select">

                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Kota/Kabupaten</label>
                            <select name="kota" class="custom-select">

                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Alamat</label>
                            <textarea rows="3" class="form-control" name="alamat" type="text" placeholder="Masukkan Alamat Lengkap"></textarea>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Expedisi</label>
                            <select name="expedisi" class="custom-select">
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Estimasi</label>
                            <select name="paket" class="custom-select">
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        <?php
                        foreach ($this->cart->contents() as $key => $value) {
                        ?>
                            <div class="d-flex justify-content-between">
                                <p>(<?= $value['qty'] ?>x) <?= $value['name'] ?></p>
                                <p>Rp. <?= number_format($value['price'], 0)  ?></p>
                            </div>
                        <?php
                        }
                        ?>

                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">Rp. <?= $this->cart->format_number($this->cart->total()); ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium" id="ongkir"></h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold" id="total_bayar"></h5>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Checkout End -->
<!-- Footer Start -->
<div class="container-fluid bg-secondary text-dark mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
            <a href="" class="text-decoration-none">
                <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Shopper</h1>
            </a>
            <p>Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no sit erat lorem et magna ipsum dolore amet erat.</p>
            <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Street, New York, USA</p>
            <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@example.com</p>
            <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                        <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                        <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                        <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                        <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                        <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                        <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                        <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                        <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                    <form action="">
                        <div class="form-group">
                            <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control border-0 py-4" placeholder="Your Email" required="required" />
                        </div>
                        <div>
                            <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('asset/eshopper/') ?>lib/easing/easing.min.js"></script>
<script src="<?= base_url('asset/eshopper/') ?>lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="<?= base_url('asset/eshopper/') ?>mail/jqBootstrapValidation.min.js"></script>
<script src="<?= base_url('asset/eshopper/') ?>mail/contact.js"></script>

<!-- Template Javascript -->
<script src="<?= base_url('asset/eshopper/') ?>js/main.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "http://localhost:8080/jahit_pumira/pelanggan/ongkir/provinsi",
            success: function(hasil_provinsi) {
                console.log(hasil_provinsi);
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });

        $("select[name=provinsi]").on("change", function() {
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
            $.ajax({
                type: "POST",
                url: "http://localhost:8080/jahit_pumira/pelanggan/ongkir/kota",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota) {
                    $("select[name=kota]").html(hasil_kota);
                }
            });
        });

        $("select[name=kota]").on("change", function() {
            $.ajax({
                type: "POST",
                url: "http://localhost:8080/jahit_pumira/pelanggan/ongkir/expedisi",
                success: function(hasil_expedisi) {
                    $("select[name=expedisi]").html(hasil_expedisi);
                }
            });
        });

        $("select[name=expedisi]").on("change", function() {
            //mendapatkan expedisi terpilih
            var expedisi_terpilih = $("select[name=expedisi]").val()

            //mendapatkan id kota tujuan terpilih
            var id_kota_tujuan_terpilih = $("option:selected", "select[name=kota]").attr('id_kota');
            //mengambil data ongkos kirim
            var total_berat = <?= $tot_berat ?>;
            //alert(total_berat);
            $.ajax({
                type: "POST",
                url: "http://localhost:8080/jahit_pumira/pelanggan/ongkir/paket",
                data: 'expedisi=' + expedisi_terpilih + '&id_kota=' + id_kota_tujuan_terpilih + '&berat=' + total_berat,
                success: function(hasil_paket) {
                    $("select[name=paket]").html(hasil_paket);
                }
            });
        });


        $("select[name=paket]").on("change", function() {
            //menampilkan ongkir
            var dataongkir = $("option:selected", this).attr('ongkir');
            var reverse = dataongkir.toString().split('').reverse().join(''),
                ribuan_ongkir = reverse.match(/\d{1,3}/g);
            ribuan_ongkir = ribuan_ongkir.join(',').split('').reverse().join('');
            //alert(dataongkir);
            $("#ongkir").html("Rp. " + ribuan_ongkir)
            //menghitung total bayar
            var ongkir = $("option:selected", this).attr('ongkir');
            var total_bayar = parseInt(ongkir) + parseInt(<?= $this->cart->total() ?>);

            var reverse2 = total_bayar.toString().split('').reverse().join(''),
                ribuan_total = reverse2.match(/\d{1,3}/g);
            ribuan_total = ribuan_total.join(',').split('').reverse().join('');
            $("#total_bayar").html("Rp. " + ribuan_total);

            //estimasi dan ongkir
            var estimasi = $("option:selected", this).attr('estimasi');
            $("input[name=estimasi]").val(estimasi);
            $("input[name=ongkir]").val(dataongkir);
            $("input[name=total_bayar]").val(total_bayar);
        });

    });
</script>
<script>
    console.log = function() {}
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
