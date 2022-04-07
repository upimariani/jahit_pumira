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
    <div class="section file-data-diskon " style="display:none">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Informasi Harga Diskon</h5>
                <table class="table" id="list-diskon">


                </table>
            </div>

            <button class="btn btn-danger" id="hide">Kembali</button>
        </div>

    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-5">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">CREATE NEW DISKON</h5>
                        <!-- General Form Elements -->
                        <form action="<?= base_url('Admin/KelolaDataMaster/diskon') ?>" method="POST">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-3 col-form-label">Produk</label>
                                <div class="col-sm-9">
                                    <select name="produk" class="form-control">
                                        <option value="">---Pilih Produk Diskon---</option>
                                        <?php
                                        foreach ($produk as $key => $value) {
                                        ?>
                                            <option value="<?= $value->id_produk ?>" <?php if (set_value('produk') == $value->id_produk) {
                                                                                            echo 'selected';
                                                                                        } ?>><?= $value->nama_produk ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <?= form_error('produk', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-3 col-form-label">Nama Diskon</label>
                                <div class="col-sm-9">
                                    <input type="text" value="<?= set_value('nama') ?>" name="nama" class="form-control">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-3 col-form-label">Besar Diskon</label>
                                <div class="col-sm-9">
                                    <input type="number" value="<?= set_value('besar') ?>" name="besar" class="form-control">
                                    <?= form_error('besar', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-3 col-form-label">Selesai Diskon</label>
                                <div class="col-sm-9">
                                    <input type="date" value="<?= set_value('tgl_selesai') ?>" name="tgl_selesai" class="form-control">
                                    <?= form_error('tgl_selesai', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-10">
                                    <button type="submit" class="btn btn-success">Save Diskon</button>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Diskon</h5>
                        <!-- Table with stripped rows -->
                        <table class="diskon table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Diskon</th>
                                    <th scope="col">s/d</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($diskon as $key => $value) {
                                ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= $value->nama_produk ?></td>
                                        <td><button type="button" data-produk=<?= $value->id_produk ?> class="harga-diskon btn btn-warning"><i class="bi bi-three-dots"></i></button></td>
                                        <td><span class="badge bg-success"><?= $value->besar_diskon ?> %</span></td>
                                        <td><?= $value->tgl_selesai ?></td>
                                        <td>
                                            <a href="<?= base_url('Admin/KelolaDataMaster/delete_diskon/' . $value->id_diskon) ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                            <a href="<?= base_url('Admin/KelolaDataMaster/update_diskon/' . $value->id_diskon) ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
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