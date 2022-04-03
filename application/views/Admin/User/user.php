<main id="main" class="main">

    <div class="pagetitle">
        <h1>USER</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">USER</li>
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
                        <h5 class="card-title">Informasi User</h5>
                        <a href="<?= base_url('Admin/KelolaDataMaster/create_user') ?>" class="btn btn-success"><i class="bi bi-align-center"></i></a>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Nama User</th>
                                    <th class="text-center" scope="col">Alamat</th>
                                    <th class="text-center" scope="col">No Telepon</th>
                                    <th class="text-center" scope="col">Username</th>
                                    <th class="text-center" scope="col">Password</th>
                                    <th class="text-center" scope="col">Level User</th>
                                    <th class="text-center" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($user as $key => $value) {
                                ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td><?= $value->nama_user ?></td>
                                        <td><?= $value->alamat_user ?></td>
                                        <td><?= $value->no_hp ?></td>
                                        <td><?= $value->username ?></td>
                                        <td><?= $value->password ?></td>
                                        <td class="text-center"><?php
                                                                if ($value->level_user == '1') {
                                                                ?>
                                                <span class="badge bg-success">Admin</span>
                                            <?php
                                                                } else {
                                            ?>
                                                <span class="badge bg-warning">Pemilik</span>
                                            <?php
                                                                }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url('Admin/KelolaDataMaster/delete_user/' . $value->id_user) ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                                            <a href="<?= base_url('Admin/KelolaDataMaster/edit_user/' . $value->id_user) ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
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