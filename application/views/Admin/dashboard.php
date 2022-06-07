<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard <?= $this->session->userdata('id') ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">


                            <div class="card-body">
                                <h5 class="card-title">Pelanggan <span>| Jahit</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $pelanggan->jml_pelanggan ?></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">



                            <div class="card-body">
                                <h5 class="card-title">Pemasukkan <span>| Transaksi</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <strong><small>Rp. <?= number_format($pemasukkan->pemasukkan) ?></small></strong>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">User <span>| Akses</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $user->user ?></h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->


                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Top Product Selling <span>| Rangking</span></h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Produk</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Total Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($top_selling as $key => $value) {
                                        ?>
                                            <tr>
                                                <th scope="row"><a href="#">#<?= $no++ ?></a></th>
                                                <td><?= $value->nama_produk ?></td>
                                                <td>Rp. <?= number_format($value->harga) ?></td>
                                                <td><span class="badge bg-success"><?= $value->total ?></span></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>


                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->


                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>

</main><!-- End #main -->