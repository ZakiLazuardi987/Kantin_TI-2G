<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-info elevation-4" style="position: fixed;">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= BASEURL?>/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span style="color: white; margin-left: 20px;"><strong>Admin Kantin</strong></span>
    </a>
    <div class="user-panel ml-4 mt-3 pb-3 mb-3 d-flex">
      <a class="navbar-brand ml-3" style="color: white">
        <i class="nav-icon fas fa-user mr-3"></i>
                Nama Admin
            </a>
    
      </div>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item mb-3">
            <a href="<?= BASEURL?>/Home_Admin" class="nav-link active" id="menusidebar">
              <i class="nav-icon fas fa-circle nav-icon" id="iconsidebar"></i>
              <p class="namamenu">
                Dashboard
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item mb-3">
            <a href="<?= BASEURL?>/Produk_Admin" class="nav-link active" id="menusidebar">
              <i class="nav-icon fas fa-box" id="iconsidebar"></i>
              <p class="namamenu">
                Produk
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item mb-3">
            <a href="#" class="nav-link active" id="menusidebar">
              <i class="nav-icon fas fa-user-tie" id="iconsidebar"></i>
              <p class="namamenu">
                Pegawai
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item mb-3">
            <a href="<?= BASEURL?>/Laporan_Admin" class="nav-link active" id="menusidebar">
              <i class="nav-icon fas fa-file-alt" id="iconsidebar"></i>
              <p class="namamenu">
                Laporan Penjualan
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item mb-3">
            <a href="#" class="nav-link active" id="menusidebar">
              <i class="nav-icon fas fa-sign-out-alt" id="iconsidebar"></i>
              <p class="namamenu">
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
