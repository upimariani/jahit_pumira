<!-- Contact Start -->
<div class="container-fluid pt-5">

    <div class="row px-xl-5">
        <div class="col-lg-6">
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="height: 550px;">
                        <img class="img-fluid" src="<?= base_url('asset/eshopper/') ?>img/carousel-1.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                                <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 550px;">
                        <img class="img-fluid" src="<?= base_url('asset/eshopper/') ?>img/carousel-2.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-prev-icon mb-n2"></span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-next-icon mb-n2"></span>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-6 mb-5">
            <div class="text-center mb-4">
                <h2 class="section-title px-5"><span class="px-2">Registered Customer</span></h2>
            </div>
            <div class="contact-form">
                <div id="success"></div>
                <form action="<?= base_url('pelanggan/auth/register') ?>" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="control-group">
                                <label>Nama*</label>
                                <input type="text" value="<?= set_value('nama') ?>" name="nama" class="form-control" id="name" placeholder="Masukkan Nama Anda" />
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="control-group">
                                <label>No Telepon*</label>
                                <input type="number" value="<?= set_value('no_hp') ?>" name="no_hp" class="form-control" id="email" placeholder="Masukkan Nomor Telepon" />
                                <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="control-group mt-3">
                        <label>Alamat*</label>
                        <textarea class="form-control" name="alamat" rows="6" id="message" placeholder="Masukkan Alamat Anda"><?= set_value('alamat') ?></textarea>
                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="control-group">
                                <label>Username*</label>
                                <input type="text" value="<?= set_value('username') ?>" name="username" class="form-control" id="name" placeholder="Masukkan Username" />
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="control-group">
                                <label>Password*</label>
                                <input type="text" value="<?= set_value('password') ?>" name="password" class="form-control" id="email" placeholder="Masukkan Password" />
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                    </div>
                    <div>
                        <p class="mt-3">You have akun? <a href="<?= base_url('pelanggan/auth') ?>">Let's Login here!</a></p>
                        <button class="btn btn-primary py-2 px-4 mt-3" type="submit" id="sendMessageButton">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->