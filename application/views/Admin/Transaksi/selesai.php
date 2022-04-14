<main id="main" class="main">
    <div class="pagetitle">
        <h1>Pesanan Sedang Proses Pengiriman</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Data</li>
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
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pesanan Dikirim</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Customer</th>
                                    <th class="text-center" scope="col">Alamat Pengiriman</th>
                                    <th class="text-center" scope="col">Pengiriman</th>
                                    <th class="text-center" scope="col">Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pesanan['selesai'] as $key => $value) {
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
                                            <h4><strong>Rp. <?= number_format($value->total_bayar, 0)  ?></strong></h4><span class="badge bg-danger">Belum Bayar</span>
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