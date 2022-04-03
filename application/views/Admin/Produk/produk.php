<main id="main" class="main">

    <div class="pagetitle">
        <h1>PRODUK</h1>

        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">PRODUK</li>
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
                        <h5 class="card-title">PRODUK</h5>

                        <!-- Default Accordion -->
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="bi bi-align-center"></i> Add New Product
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show " aria-labelledby="headingOne" data-bs-parent="#accordionExample">

                                    <div class="accordion-body">


                                        <?php echo form_open_multipart('Admin/KelolaDataMaster/produk'); ?>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row mb-3">
                                                    <label for="inputText" class="col-sm-5 col-form-label">Nama Produk</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" value="<?= set_value('nama') ?>" name="nama" class="form-control">
                                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row mb-3">
                                                    <label for="inputPassword" class="col-sm-5 col-form-label">Kategori Produk</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="kategori">
                                                            <option value="">---Pilih Kategori Produk---</option>
                                                            <?php
                                                            foreach ($kategori as $key => $value) {
                                                            ?>
                                                                <option value="<?= $value->id_kategori ?>" <?php if (set_value('kategori') == $value->id_kategori) {
                                                                                                                echo 'selected';
                                                                                                            } ?>><?= $value->nama_kategori ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="row mb-3">
                                                    <label for="inputPassword" class="col-sm-5 col-form-label">Deskripsi</label>
                                                    <div class="col-sm-10">
                                                        <!-- TinyMCE Editor -->
                                                        <textarea name="deskripsi" class="tinymce-editor">
                                                        <?= set_value('deskripsi') ?>
                                                            </textarea>
                                                        <!-- End TinyMCE Editor -->
                                                        <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row mb-3 mt-5">
                                                    <label for="inputPassword" class="col-sm-5 col-form-label">Gambar</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" name="gambar" class="form-control" required>
                                                        <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mb-3 mt-5">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Save</button>
                                                <a href="<?= base_url('Admin/KelolaDataMaster/user') ?>" class="btn btn-danger"><i class="bi bi-backspace"></i> Kembali</a>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button btn-warning collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="bi bi-view-list"></i> Informasi Produk
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">

                                    <div class="accordion-body">
                                        <div class="card">
                                            <div class="card-body">

                                                <!-- Table with stripped rows -->
                                                <table class="table datatable">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" scope="col">#</th>
                                                            <th class="text-center" scope="col">Gambar</th>
                                                            <th class="text-center" scope="col">Nama Produk</th>
                                                            <th class="text-center" scope="col">Deskrispi</th>
                                                            <th class="text-center" scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($produk as $key => $value) {
                                                        ?>
                                                            <tr>
                                                                <td class="text-center"><?= $no++ ?></td>
                                                                <td class="text-center"><img style="width: 150px;" src="<?= base_url('asset/foto-produk/' . $value->gambar) ?>"></td>
                                                                <td class="text-center"><?= $value->nama_produk ?></td>
                                                                <td class="text-center"><?= $value->deskripsi ?></td>
                                                                <td class="text-center">
                                                                    <a href="<?= base_url('Admin/KelolaDataMaster/delete_produk/' . $value->id_produk) ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                                                    <a href="<?= base_url('Admin/KelolaDataMaster/edit_produk/' . $value->id_produk) ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                                                    <a href="<?= base_url('Admin/KelolaDataMaster/edit_produk/' . $value->id_produk) ?>" class="btn btn-warning"><i class="bi bi-list-ul"></i></a>
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
                            </div>
                        </div><!-- End Default Accordion Example -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->