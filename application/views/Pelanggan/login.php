<!-- Contact Start -->
<div class="container-fluid pt-5">

    <div class="row px-xl-5">
        <div class="col-lg-6">
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="height: 330px;">
                        <img class="img-fluid" src="<?= base_url('asset/eshopper/') ?>img/carousel-1.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Rumah Jahit Pumira</h3>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 330px;">
                        <img class="img-fluid" src="<?= base_url('asset/eshopper/') ?>img/carousel-2.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Rumah Jahit Pumira</h3>
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
                <h2 class="section-title px-5"><span class="px-2">Login Customer</span></h2>
                <?php if ($this->session->userdata('error')) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $this->session->userdata('error') ?>
                    </div>
                <?php
                } ?>
                <?php
                if ($this->session->userdata('success')) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?= $this->session->userdata('success') ?>
                    </div>
                <?php
                }
                ?>


            </div>
            <div class="contact-form">
                <div id="success"></div>
                <form action="<?= base_url('pelanggan/auth') ?>" method="POST">
                    <div class="control-group">
                        <label>Username*</label>
                        <input type="text" name="username" class="form-control" id="name" placeholder="Masukkan Username" required="required" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <label>Password*</label>
                        <input type="password" name="password" class="form-control" id="email" placeholder="Masukkan Password" required="required" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <p>You don't have akun? <a href="<?= base_url('pelanggan/auth/register') ?>">Register now!</a></p>
                    <div>
                        <button type="submit" class="btn btn-primary py-2 px-4" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->