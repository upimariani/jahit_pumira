<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Pesanan Custom</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Custom</li>
            </ol>
        </nav>


    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body m-sm-3 m-md-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-muted">Payment No.</div>
                                <strong><?= $detail['custom']->id_transaksi ?></strong>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <div class="text-muted">Payment Date</div>
                                <strong><?= $detail['custom']->update_at ?></strong>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="text-muted">Client</div>
                                <strong>
                                    <?= $detail['custom']->nama_customer ?>
                                </strong>
                                <p>
                                    <?= $detail['custom']->alamat_customer ?> <br> <?= $detail['custom']->no_hp ?>
                                </p>
                                <h5>Gambar Model</h5>
                                <img style="width: 250px;" src="<?= base_url('asset/model-baju/' . $detail['custom']->gambar_model) ?>">
                            </div>
                            <div class="col-md-6 text-md-right">
                                <div class="text-muted">Payment To</div>
                                <strong>
                                    <?= $detail['custom']->provinsi ?>
                                </strong>
                                <p>
                                    <?= $detail['custom']->alamat ?> <br> <?= $detail['custom']->kota ?> <br> <?= $detail['custom']->ekspedisi ?> <br> <?= $detail['custom']->estimasi ?> <br>

                                </p>

                                <?php
                                if ($detail['custom']->total_bayar == NULL) {
                                ?>
                                    <hr>
                                    <h5 class="text-danger">Pembayaran</h5>
                                    <form action="<?= base_url('admin/custom/kirim_total/' . $detail['custom']->id_transaksi) ?>" method="POST">
                                        <label>Masukkan Harga Pemesanan Custom + Jumlah Ongkir</label>
                                        <input type="number" name="bayar" class="form-control">
                                        <button type="submit" class="btn btn-success mt-3">Kirim</button>
                                    </form>
                                <?php
                                }
                                ?>

                            </div>
                        </div>

                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Nama Bahan</th>
                                    <th>Panjang Bahan</th>
                                    <th>Panjang Lengan</th>
                                    <th>Bahu</th>
                                    <th>Pundak</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $detail['custom']->nama_bahan ?></td>
                                    <td><?= $detail['custom']->pjng_baju ?></td>
                                    <td><?= $detail['custom']->pjng_lengan ?></td>
                                    <td><?= $detail['custom']->bahu ?></td>
                                    <td><?= $detail['custom']->pundak ?></td>
                                </tr>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Subtotal </th>
                                    <th class="text-right"></th>
                                </tr>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Shipping </th>
                                    <th class="text-right">Rp. <?= number_format($detail['custom']->ongkir, 0)  ?></th>
                                </tr>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Total </th>
                                    <th class="text-right">$268.85</th>
                                </tr>
                            </tbody>
                        </table>
                        <a class="btn btn-danger" href="<?= base_url('admin/custom') ?>">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>