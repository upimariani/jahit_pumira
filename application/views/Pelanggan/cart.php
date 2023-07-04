<!-- Page Header Start -->
<img style="height: 400px ; width:1340px ;" src="<?= base_url('asset/cart.png') ?>" class="container-fluid bg-secondary mb-5">

<!-- Page Header End -->


<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <?php echo form_open('pelanggan/katalog/update_cart'); ?>
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Stok</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">

                    <?php
                    $i = 1;
                    foreach ($this->cart->contents() as $key => $value) {
                    ?>
                        <tr>
                            <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;"> <?= $value['name'] ?> | <?= $value['size'] ?></td>
                            <td class="align-middle">Rp. <?= number_format($value['price'], 0) ?></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 150px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="number" name="<?= $i . '[qty]' ?>" min="1" max="<?= $value['stok'] ?>" class="form-control form-control-sm bg-secondary text-center" value="<?= $value['qty'] ?>">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td><?= $value['stok'] ?></td>
                            <td class="align-middle">Rp. <?= number_format($value['price'] * $value["qty"])  ?></td>
                            <td class="align-middle"><a href="<?= base_url('pelanggan/katalog/delete/' . $value['rowid']) ?>" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a>

                            </td>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
            <?php echo form_close(); ?>
        </div>
        <div class="col-lg-4">

            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></h5>
                    </div>
                    <a href="<?= base_url('pelanggan/katalog/checkout') ?>" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->