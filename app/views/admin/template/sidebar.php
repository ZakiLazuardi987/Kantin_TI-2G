<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-info elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= BASEURL?>/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Kantin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <a class="navbar-brand ml-3" href="#">
        <i class="nav-icon fas fa-user"></i>
                Nama Admin
            </a>
    
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item mb-3">
            <a href="<?= BASEURL?>/Home_Admin" class="nav-link active">
              <i class="nav-icon fas fa-circle nav-icon"></i>
              <p>
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item mb-3">
            <a href="<?= BASEURL?>/Produk_Admin" class="nav-link active">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Produk
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item mb-3">
            <a href="<?= BASEURL?>/Pegawai_Admin" class="nav-link active">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Pegawai
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item mb-3">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Laporan Penjualan
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item mb-3">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log Out
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
