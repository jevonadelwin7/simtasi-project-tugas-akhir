  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url('adminLTE/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?= $userInfo['nama_user']; ?></span>
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
            <a href="<?= base_url('mahasiswa') ?>" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
                DASHBOARD
              </p>
            </a>
          </li>

          <li class="nav-header">MENU</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book-reader"></i>
              <p>
                Bimbingan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('mahasiswa/daftar_dosen') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Dosen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('mahasiswa/daftar_topik') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Topik TA</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('mahasiswa/bimbingan') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bimbingan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-sticky-note"></i>
              <p>
                Pendaftaran
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('mahasiswa/pendaftaran_seminar') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Seminar Proposal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('mahasiswa/pendaftaran_sidang') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sidang Skripsi</p>
                </a>
              </li>
            </ul>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-calendar"></i>
              <p>
                Jadwal
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('mahasiswa/jadwal_seminar') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jadwal Seminar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('mahasiswa/jadwal_sidang') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jadwal Sidang</p>
                </a>
              </li>
            </ul>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-gavel"></i>
              <p>
                Hasil
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('mahasiswa/hasil_seminar') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Seminar Proposal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('mahasiswa/hasil_sidang') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sidang Skripsi</p>
                </a>
              </li>

            </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>