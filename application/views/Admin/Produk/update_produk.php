<main id="main" class="main">

    <div class="pagetitle">
        <h1>Update Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Update Produk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update Produk</h5>
                        <?php echo form_open_multipart('Admin/KelolaDataMaster/update_produk/' . $produk->id_produk); ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-5 col-form-label">Nama Produk</label>
                                    <div class="col-sm-12">
                                        <input type="text" value="<?= $produk->nama_produk ?>" name="nama" class="form-control">
                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-5 col-form-label">Kategori Produk</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="kategori">
                                            <option value="">---Pilih Kategori Produk---</option>
                                            <?php
                                            foreach ($kategori as $key => $value) {
                                            ?>
                                                <option value="<?= $value->id_kategori ?>" <?php if ($value->id_kategori == $produk->id_kategori) {
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
                            <div class="col-lg-12">
                                <div class="row mb-3 mt-3">
                                    <label for="inputPassword" class="col-sm-5 col-form-label">Berat Produk</label>
                                    <div class="col-sm-12">
                                        <input type="number" value="<?= $produk->berat ?>" name="berat" class="form-control" placeholder="Masukkan Berat Produk">
                                        <?= form_error('berat', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-5 col-form-label">Deskripsi</label>
                                    <div class="col-sm-12">
                                        <!-- TinyMCE Editor -->
                                        <textarea name="deskripsi" class="tinymce-editor">
                                                        <?= $produk->deskripsi ?>
                                                            </textarea>
                                        <!-- End TinyMCE Editor -->
                                        <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row mb-3 mt-5">
                                    <label for="inputPassword" class="col-sm-5 col-form-label">Gambar</label>
                                    <div class="col-sm-12">
                                        <img style="width: 150px;" src="<?= base_url('asset/foto-produk/' . $produk->gambar) ?>">
                                        <input type="file" name="gambar" value="<?= $produk->gambar ?>" class="form-control">
                                        <?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3 mt-5">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Save</button>
                                <a href="<?= base_url('Admin/KelolaDataMaster/produk') ?>" class="btn btn-danger"><i class="bi bi-backspace"></i> Kembali</a>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</main>