<?php
  // session_start();
  $role_id = 0;
  $role_name = "Publik";

  if(isset($_SESSION["SESS_SPPD_ROLE_ID"])) {
    $role_id = $_SESSION["SESS_SPPD_ROLE_ID"];
    $role_name = $_SESSION["SESS_SPPD_ROLE"];
  }
?>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">DEMO PROGRESS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $role_name ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <?php if($role_id != 0): ?>
            <li class="nav-item">
              <a href="?page=dashboard" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  DASHBOARD
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <!-- <li class="nav-header">MASTER DATA HARGA</li> -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-globe-asia nav-icon"></i>
                <p>
                  MASTER DATA
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?page=pegawai" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pegawai</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-book nav-icon"></i>
                <p>
                  PENGAJUAN
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?page=pengajuan-spt" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>SPT</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?page=pengajuan-sppd" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>SPPD</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-book nav-icon"></i>
                <p>
                  LAPORAN
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?page=laporan-spt" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>SPT</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?page=laporan-sppd" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>SPPD</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?page=laporan-bpd" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>BPD</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?page=laporan-lpd" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>LPD</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="?page=penyerahan-bpd" class="nav-link">
                <i class="nav-icon fas fa-envelope"></i>
                <p>
                  PENYERAHAN BPD
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>

            <li class="nav-header">PENGATURAN LAINNYA</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-dollar-sign nav-icon"></i>
                <p>
                  DANA PERJALANAN DINAS
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?page=uang-harian" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>UANG HARIAN</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?page=uang-taxi" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>TAXI</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?page=uang-harian-dki" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>UANG HARIAN (DKI)</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="?page=laporan-lpd" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>LPD</p>
                  </a>
                </li> -->
              </ul>
            </li>
            

            <li class="nav-header">LAINNYA</li>
            <li class="nav-item">
              <a href="?page=logout" class="nav-link">
                <i class="nav-icon fas fa-power-off"></i>
                <p>
                  Keluar
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
          <?php endif; ?>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper">