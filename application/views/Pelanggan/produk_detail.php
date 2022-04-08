<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop Detail</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="<?= base_url('asset/foto-produk/' . $data['produk']->gambar) ?>" alt="Image">
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-7 pb-5">
            <form action="<?= base_url('pelanggan/katalog/add') ?>" method="POST">
                <input type="hidden" name="name" value="<?= $data['produk']->nama_produk ?>">
                <input type="hidden" class="price" name="price" value="<?= $data['produk']->harga - ($data['produk']->besar_diskon / 100 * $data['produk']->harga) ?>">
                <h3 class="font-weight-semi-bold"><?= $data['produk']->nama_produk ?></h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(50 Reviews)</small>
                </div>
                <h3 class="price-view font-weight-semi-bold mb-4">Rp. <?= number_format($data['produk']->harga - ($data['produk']->besar_diskon / 100 * $data['produk']->harga)) ?> </h3>
                <?php if ($data['produk']->besar_diskon != 0) {
                ?>

                    <del class="diskon">Rp. <?= number_format($data['produk']->harga, 0) ?></del><span class="disc badge bg-warning">Disc <?= $data['produk']->besar_diskon ?>%</span>
                <?php
                } ?>
                <p class="mb-4"><?= $data['produk']->deskripsi ?></p>
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                    <div class="col-lg-2">
                        <select id="produk" name="id" class="form-control">
                            <?php
                            foreach ($data['size'] as $key => $value) {
                            ?>
                                <option data-diskon="Rp. <?= number_format($value->harga, 0)  ?>" data-price-view="Rp. <?= number_format($value->harga - ($value->besar_diskon / 100 * $value->harga), 0) ?>" data-price="<?= $value->harga - ($value->besar_diskon / 100 * $value->harga) ?>" value="<?= $value->id_size ?>"><?= $value->size ?></option>
                            <?php
                            }
                            ?>

                        </select>
                    </div>

                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" name="qty" class="form-control bg-secondary text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>
<!-- Shop Detail End -->