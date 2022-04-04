<main id="main" class="main">

    <div class="pagetitle">
        <h1>Size Produk <?= $size['produk']->nama_produk ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Size</li>
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
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Size</h5>

                        <!-- Default Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Size</th>
                                    <th class="text-center" scope="col">Harga</th>
                                    <th class="text-center" scope="col">Stok</th>
                                    <th class="text-center" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($size['size'] as $key => $value) {
                                ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td class="text-center"><?= $value->size ?></td>
                                        <td class="text-center">Rp. <?= number_format($value->harga, 0) ?></td>
                                        <td class="text-center"><?= $value->stok ?></td>
                                        <td class="text-center"> <a href="<?= base_url('Admin/KelolaDataMaster/delete_size/' . $value->id_size . '/' . $value->id_produk) ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                            <a href="<?= base_url('Admin/KelolaDataMaster/update_produk/' . $value->id_produk) ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                        <!-- End Default Table Example -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create New Size</h5>
                        <form action="<?= base_url('Admin/KelolaDataMaster/size/', $size['produk']->id_produk) ?>" method="POST">
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Size</label>
                                <div class="col-sm-10">
                                    <input type="text" value="<?= set_value('size') ?>" name="size" class="form-control">
                                    <?= form_error('size', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Stok</label>
                                <div class="col-sm-10">
                                    <input type="number" value="<?= set_value('stok') ?>" name="stok" class="form-control">
                                    <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-10">
                                    <input type="number" value="<?= set_value('harga') ?>" name="harga" class="form-control">
                                    <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <button type="submit" class="col-sm-12 btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>