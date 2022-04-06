<main id="main" class="main">

    <div class="pagetitle">
        <h1>Update Size Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Size</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update Size</h5>
                        <form action="<?= base_url('Admin/KelolaDataMaster/edit_size/' . $size->id_size . '/' . $size->id_produk) ?>" method="POST">
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Size</label>
                                <div class="col-sm-10">
                                    <input type="text" value="<?= $size->size ?>" name="size" class="form-control">
                                    <?= form_error('size', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Stok</label>
                                <div class="col-sm-10">
                                    <input type="number" value="<?= $size->stok ?>" name="stok" class="form-control">
                                    <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-10">
                                    <input type="number" value="<?= $size->harga ?>" name="harga" class="form-control">
                                    <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <button type="submit" class="col-sm-2 btn btn-success">Save</button>
                            <a href="<?= base_url('Admin/KelolaDataMaster/size/' . $size->id_produk) ?>" class="col-sm-2 btn btn-danger">Kembali</a>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>