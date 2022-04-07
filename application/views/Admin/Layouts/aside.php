<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="index.html">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link  <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'Transaksi') {
                                    echo 'collapsed';
                                }  ?>" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Kelola Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'KelolaDataMaster') {
                                                                echo 'show';
                                                            }  ?>" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= base_url('Admin/KelolaDataMaster/user') ?>" <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'KelolaDataMaster' && $this->uri->segment(3) == 'user') {
                                                                                    echo 'class="active"';
                                                                                }  ?>>
                        <i class="bi bi-circle"></i><span>User</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Admin/KelolaDataMaster/kategori') ?>" <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'KelolaDataMaster' && $this->uri->segment(3) == 'kategori') {
                                                                                        echo 'class="active"';
                                                                                    }  ?>>
                        <i class="bi bi-circle"></i><span>Kategori Produk</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Admin/KelolaDataMaster/produk') ?>" <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'KelolaDataMaster' && $this->uri->segment(3) == 'produk') {
                                                                                    echo 'class="active"';
                                                                                }  ?>>
                        <i class="bi bi-circle"></i><span>Produk</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Admin/KelolaDataMaster/diskon') ?>" <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'KelolaDataMaster' && $this->uri->segment(3) == 'diskon') {
                                                                                    echo 'class="active"';
                                                                                }  ?>>
                        <i class="bi bi-circle"></i><span>Diskon</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'KelolaDataMaster') {
                                    echo 'collapsed';
                                }  ?>" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bag-check"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'Transaksi') {
                                                                echo 'show';
                                                            }  ?>" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= base_url('Admin/Transaksi/pembayaran') ?>" <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'Transaksi' && $this->uri->segment(3) == 'pembayaran') {
                                                                                echo 'class="active"';
                                                                            }  ?>>
                        <i class="bi bi-circle"></i><span>Pesanan Masuk</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Admin/Transaksi/konfirmasi_pembayaran') ?>" <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'Transaksi' && $this->uri->segment(3) == 'konfirmasi_pembayaran') {
                                                                                            echo 'class="active"';
                                                                                        }  ?>>
                        <i class="bi bi-circle"></i><span>Konfirmasi Pembayaran</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Admin/Transaksi/diproses') ?>" <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'Transaksi' && $this->uri->segment(3) == 'diproses') {
                                                                                echo 'class="active"';
                                                                            }  ?>>
                        <i class="bi bi-circle"></i><span>Pesanan Diproses</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Admin/Transaksi/dikirim') ?>" <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'Transaksi' && $this->uri->segment(3) == 'dikirim') {
                                                                                echo 'class="active"';
                                                                            }  ?>>
                        <i class="bi bi-circle"></i><span>Pesanan Dikirim</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Admin/Transaksi/selesai') ?>" <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'Transaksi' && $this->uri->segment(3) == 'selesai') {
                                                                                echo 'class="active"';
                                                                            }  ?>>
                        <i class="bi bi-circle"></i><span>Pesanan Selesai</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="<?= base_url('cLogin_Admin/logout') ?>">
                <i class="bi bi-arrow-bar-right"></i>
                <span>LogOut</span>
            </a>
        </li><!-- End Dashboard Nav -->

    </ul>

</aside><!-- End Sidebar-->