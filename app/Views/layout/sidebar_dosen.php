<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?php echo base_url('adminLTE/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?= $userInfo['nama_dosen']; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            </div>

        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('dosen') ?>" class="nav-link active">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            DASHBOARD
                        </p>
                    </a>
                </li>

                <li class="nav-header">MENU</li>
                <li class="nav-item">
                    <a href="<?= base_url('dosen/request_mhs') ?>" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Request Bimbingan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('dosen/bimbingan') ?>" class="nav-link">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            Bimbingan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('dosen/request_mhs') ?>" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Request Bimbingan
                        </p>
                    </a>
                </li>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>