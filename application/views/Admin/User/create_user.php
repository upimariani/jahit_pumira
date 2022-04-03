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
                        <form action="<?= base_url('Admin/KelolaDataMaster/create_user') ?>" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-5 col-form-label">Nama User</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama" class="form-control">
                                            <small class="text-danger">text</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">

                                    <div class="row mb-3">
                                        <label for="inputEmail" class="col-sm-5 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="alamat" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-5 col-form-label">No Telepon</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="no_tlp" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-5 col-form-label">Level User</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="level">
                                                <option value="">---Pilih Level User---</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Pemilik</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-5 col-form-label">Username</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="username" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-5 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="<?= base_url('Admin/KelolaDataMaster/user') ?>" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                        </form><!-- End General Form Elements -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->