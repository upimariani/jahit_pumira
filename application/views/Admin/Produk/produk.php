<main id="main" class="main">

    <div class="pagetitle">
        <h1>PRODUK</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Produk</li>
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
            <div class="col-lg-7">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informasi Produk</h5>

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
                                            <a href="<?= base_url('Admin/KelolaDataMaster/update_produk/' . $value->id_produk) ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                            <a href="<?= base_url('Admin/KelolaDataMaster/size/' . $value->id_produk) ?>" class="btn btn-warning"><i class="bi bi-list-ul"></i></a>
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
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create New Produk</h5>
                        <?php echo form_open_multipart('Admin/KelolaDataMaster/produk'); ?>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-5 col-form-label">Nama Produk</label>
                            <div class="col-sm-12">
                                <input type="text" value="<?= set_value('nama') ?>" name="nama" class="form-control" placeholder="Masukkan Nama Produk">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div> <label for="inputPassword" class="col-sm-5 col-form-label">Kategori Produk</label>
                        <div class="col-sm-12">
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
                        <div class="row mb-3 mt-3">
                            <label for="inputPassword" class="col-sm-5 col-form-label">Gambar</label>
                            <div class="col-sm-12">
                                <input type="file" name="gambar" class="form-control">
                                <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label for="inputPassword" class="col-sm-5 col-form-label">Berat Produk</label>
                            <div class="col-sm-12">
                                <input type="number" name="berat" class="form-control" placeholder="Masukkan Berat Produk">
                                <?= form_error('berat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-5 col-form-label">Deskripsi</label>
                            <div class="col-sm-12">
                                <!-- TinyMCE Editor -->
                                <textarea name="deskripsi" class="tinymce-editor">
                                                        <?= set_value('deskripsi') ?>
                                                            </textarea>
                                <!-- End TinyMCE Editor -->
                                <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="row mb-3 mt-5">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Save</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</main><!-- End #main -->