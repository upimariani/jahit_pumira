<main id="main" class="main">

    <div class="pagetitle">
        <h1>KATEGORI PRODUK</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Kategori Produk</li>
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
                        <h5 class="card-title">Informasi Kategori</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Nama User</th>
                                    <th class="text-center" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($kategori as $key => $value) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td class="text-center"><?= $value->nama_kategori ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('Admin/KelolaDataMaster/delete_kategori/' . $value->id_kategori) ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#basicModal<?= $value->id_kategori ?>"><i class="bi bi-pencil-square"></i></button>
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
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create New Kategori</h5>
                        <!-- General Form Elements -->
                        <form action="<?= base_url('Admin/KelolaDataMaster/kategori') ?>" method="POST">

                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                    <input type="text" value="<?= set_value('nama') ?>" name="nama" class="form-control">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Save</button>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->


<?php
foreach ($kategori as $key => $value) {
?>
    <div class="modal fade" id="basicModal<?= $value->id_kategori ?>" tabindex="-1">
        <div class="modal-dialog">
            <form action="<?= base_url('Admin/KelolaDataMaster/update_kategori/' . $value->id_kategori) ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" value="<?= $value->nama_kategori ?>" name="nama" class="form-control" required>
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Save</button>
                    </div>
            </form><!-- End General Form Elements -->
        </div>
    </div>
    </div><!-- End Basic Modal-->
<?php
}
?>