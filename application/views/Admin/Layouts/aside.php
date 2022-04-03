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
            <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Kelola Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="<?= base_url('Admin/KelolaDataMaster/user') ?>" class="active">
                        <i class="bi bi-circle"></i><span>User</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('Admin/KelolaDataMaster/kategori') ?>">
                        <i class="bi bi-circle"></i><span>Kategori Produk</span>
                    </a>
                </li>
                <li>
                    <a href="forms-editors.html">
                        <i class="bi bi-circle"></i><span>Produk</span>
                    </a>
                </li>
                <li>
                    <a href="forms-validation.html">
                        <i class="bi bi-circle"></i><span>Diskon</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bag-check"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="tables-general.html">
                        <i class="bi bi-circle"></i><span>Konfirmasi Pembayaran</span>
                    </a>
                </li>
                <li>
                    <a href="tables-data.html">
                        <i class="bi bi-circle"></i><span>Status Order</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="index.html">
                <i class="bi bi-arrow-bar-right"></i>
                <span>LogOut</span>
            </a>
        </li><!-- End Dashboard Nav -->

    </ul>

</aside><!-- End Sidebar-->