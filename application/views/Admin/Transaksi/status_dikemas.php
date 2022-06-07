<main id="main" class="main">
    <div class="pagetitle">
        <h1>Informasi Status Diproses</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Status Order</li>
            </ol>
        </nav>
        <?php
        if ($this->session->userdata('success')) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                <?= $this->session->userdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        ?>
    </div><!-- End Page Title -->
    <section class="detail_pesanan section" style="display: none;">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Detail Pesanan</h5>
                        <!-- Default Table -->
                        <table class="detail table">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">SubTotal</th>
                                </tr>
                            </thead>
                            <tbody id="list_detail">
                            </tbody>
                        </table>
                        <!-- End Default Table Example -->
                        <button id="kembali" class="btn btn-danger">Kembali</button>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Status Order</h5>
                        <!-- Table with stripped rows -->
                        <table class="detail table datatable">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Customer</th>
                                    <th class="text-center" scope="col">Alamat Pengiriman</th>
                                    <th class="text-center" scope="col">Pengiriman</th>
                                    <th class="text-center" scope="col">Pembayaran</th>
                                    <th class="text-center" scope="col">Detail/Kirim</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pesanan['proses'] as $key => $value) {
                                ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td>Nama : <strong><?= $value->nama_customer ?></strong>
                                            <p>No Telepon : <span class="badge bg-warning"><?= $value->no_hp ?></span></p>
                                        </td>
                                        <td><?= $value->alamat ?></td>
                                        <td>Expedisi: <strong><?= $value->ekspedisi ?></strong><br>
                                            Estimasi : <?= $value->estimasi ?><br>
                                            <h5>Ongkir: Rp.<?= number_format($value->ongkir, 0) ?></h5>
                                        </td>
                                        <td class="text-center">
                                            Total Belanja : <h5> Rp. <?= number_format($value->total_bayar - $value->ongkir, 0) ?></h5>
                                            <h4><strong>Rp. <?= number_format($value->total_bayar, 0)  ?></strong></h4><span class="badge bg-warning">Diproses</span>
                                        </td>
                                        <td class="text-center"><button type="button" data-id="<?= $value->id_transaksi ?>" class="btn btn-primary"><i class="bi bi-collection"></i></button>
                                            <form class="d-inline-block" action="<?= base_url('Admin/Transaksi/kirim/' . $value->id_transaksi) ?>" method="POST">
                                                <button type="submit" onclick="confirm('Apakah Kamu Yakin?')" class="btn btn-success"><i class="bi bi-inboxes-fill"></i></button>
                                            </form>

                                        </td>

                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->