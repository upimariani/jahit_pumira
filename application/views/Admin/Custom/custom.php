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
        <?php
        if ($this->session->userdata('success')) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                        <h5 class="card-title">Informasi Pesanan</h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Customer</th>
                                    <th class="text-center" scope="col">Alamat Pengiriman</th>
                                    <th class="text-center" scope="col">Pengiriman</th>
                                    <th class="text-center" scope="col">Status Order</th>
                                    <th class="text-center" scope="col">Custom</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pesanan_masuk as $key => $value) {
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
                                        <td>
                                            <?php
                                            if ($value->total_bayar != NULL) {
                                            ?>
                                                Total Belanja : <h5> Rp. <?= number_format($value->total_bayar - $value->ongkir, 0) ?></h5>
                                                <h4><strong>Rp. <?= number_format($value->total_bayar, 0)  ?></strong></h4>

                                                <?php
                                                if ($value->status_order == '0') {
                                                    echo '<span class="badge bg-danger">Belum Bayar</span>';
                                                } else if ($value->status_order == '1') {
                                                    echo '<span class="badge bg-warning">Menunggu Konfirmasi </span>';
                                                } else if ($value->status_order == '2') {
                                                    echo '<span class="badge bg-primary">Diproses</span>';
                                                } else if ($value->status_order == '3') {
                                                    echo '<span class="badge bg-info">Dikirim</span>';
                                                } else if ($value->status_order == '4') {
                                                    echo '<span class="badge bg-success">Selesai</span>';
                                                }
                                                ?>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center"> <a href="<?= base_url('Admin/Custom/detail_custom/' . $value->id_transaksi) ?>" class="btn btn-success">
                                                <i class="bi bi-bag-check"></i> View
                                            </a>
                                            <?php
                                            if ($value->status_order == '1') {
                                            ?>
                                                <button class="btn btn-warning">Konfirmasi</button>
                                            <?php
                                            }
                                            ?>

                                        </td>

                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->