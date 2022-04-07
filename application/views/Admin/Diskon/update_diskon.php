<main id="main" class="main">
    <div class="pagetitle">
        <h1>DISKON PRODUK</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">DISKON</li>
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
            <div class="col-lg-5">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">UPDATE DISKON</h5>
                        <!-- General Form Elements -->
                        <form action="<?= base_url('Admin/KelolaDataMaster/update_diskon/' . $diskon->id_diskon) ?>" method="POST">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Produk</label>
                                <div class="col-sm-9">
                                    <input type="text" value="<?= $diskon->nama_produk ?>" class="form-control" readonly>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-3 col-form-label">Nama Diskon</label>
                                <div class="col-sm-9">
                                    <input type="text" value="<?= $diskon->nama_diskon ?>" name="nama" class="form-control">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-3 col-form-label">Besar Diskon</label>
                                <div class="col-sm-9">
                                    <input type="number" value="<?= $diskon->besar_diskon ?>" name="besar" class="form-control">
                                    <?= form_error('besar', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-3 col-form-label">Selesai Diskon</label>
                                <div class="col-sm-9">
                                    <input type="date" value="<?= $diskon->tgl_selesai ?>" name="tgl_selesai" class="form-control">
                                    <?= form_error('tgl_selesai', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-10">
                                    <button type="submit" class="btn btn-success">Update Diskon</button>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>