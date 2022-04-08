<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Contact Us</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Contact</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Informasi Status Order</span></h2>
    </div>
    <div class="row ml-5">
        <div class="col-lg-8 mb-5">
            <table class="status_order table table-bordered mb-3">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Id Transaksi</th>
                        <th>Alamat Pengiriman</th>
                        <th>Total Pembayaran</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($status_order as $key => $value) {
                    ?>
                        <tr>
                            <td>No.<strong><?= $value->id_transaksi ?></strong><br>
                                Tgl.Order : <?= $value->tgl_transaksi ?><br>
                                <small><?= $value->update_at ?></small>
                                <span class="badge badge-success">Dikirim</span><br>
                                <?php
                                if ($value->status_order == '0') {
                                ?>
                                    <form class="mt-5">
                                        <label>Bukti Pembayaran</label>
                                        <input type="file" class="form-control">
                                        <button class="btn btn-sm btn-primary mt-2">Upload</button>
                                    </form>
                                <?php
                                }
                                ?>

                            </td>
                            <td>Expedisi: <strong> <?= $value->ekspedisi ?></strong><br>
                                Estimasi: <?= $value->estimasi ?><br>Alamat:
                                <br><?= $value->alamat ?>, Kota <?= $value->kota ?> Prov. <?= $value->provinsi ?>
                            </td>
                            <td>
                                Ongkir : <h6>Rp. <?= number_format($value->ongkir, 0)  ?></h6>
                                Pesanan : <h6>Rp. <?= number_format($value->total_bayar - $value->ongkir, 0)  ?></h6>
                                Total : <h5><strong>Rp. <?= number_format($value->total_bayar, 0)  ?></strong></h5>
                            </td>
                            <td class="text-center"><button data-id="<?= $value->id_transaksi ?>" class="btn btn-sm btn-primary"><i class="fas fa-align-justify"></i></button></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="detail_pesanan col-lg-2" style="display:none">
            <h4>Detail Pesanan</h4>
            <div class="d-flex flex-column mb-3">
                <table id="detail" class="table table-bordered mb-3" id="detail">




                </table>
            </div>
            <button id="hide" class="btn btn-sm btn-primary">Kembali</button>
        </div>
    </div>
</div>
<!-- Contact End -->