<main id="main" class="main">

    <div class="pagetitle">
        <h1>Create USER</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Create USER</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create New User</h5>
                        <!-- General Form Elements -->
                        <form action="<?= base_url('Admin/KelolaDataMaster/edit_user/' . $user->id_user) ?>" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-5 col-form-label">Nama User</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="<?= $user->nama_user ?>" name="nama" class="form-control">
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">

                                    <div class="row mb-3">
                                        <label for="inputEmail" class="col-sm-5 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="<?= $user->alamat_user ?>" name="alamat" class="form-control">
                                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-5 col-form-label">No Telepon</label>
                                        <div class="col-sm-10">
                                            <input type="number" value="<?= $user->no_hp ?>" name="no_tlp" class="form-control">
                                            <?= form_error('no_tlp', '<small class="text-danger pl-3">', '</small>'); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-5 col-form-label">Level User</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="level">
                                                <option value="">---Pilih Level User---</option>
                                                <option value="1" <?php if ($user->level_user == '1') {
                                                                        echo 'selected';
                                                                    } ?>>Admin</option>
                                                <option value="2" <?php if ($user->level_user == '2') {
                                                                        echo 'selected';
                                                                    } ?>>Pemilik</option>
                                            </select>
                                            <?= form_error('level', '<small class="text-danger pl-3">', '</small>'); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-5 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="<?= $user->username ?>" name="username" class="form-control">
                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-5 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="text" value="<?= $user->password ?>" name="password" class="form-control">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Save</button>
                                    <a href="<?= base_url('Admin/KelolaDataMaster/user') ?>" class="btn btn-danger"><i class="bi bi-backspace"></i> Kembali</a>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->