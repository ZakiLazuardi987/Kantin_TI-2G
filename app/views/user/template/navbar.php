<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand" style="background-color: #1A2A46;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: #F9CC41"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a class="navbar-brand" style="color: #F9CC41">
      <img src="<?= BASEURL?>/assets/brand/polinema.png" alt="Logo" width="30" height="30" margin-right="2px" class="d-inline-block align-text-top">
        <img src="<?= BASEURL?>/assets/brand/logo-jti.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
            Kantin JTI Polinema
          </a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="navbar-brand" style="color: white">
        <i class="nav-icon fas fa-user"></i>
                Hello <?php echo $data['nama_user']; ?> !
            </a>
        </li>
    </ul>
  </nav>
  <!-- /.navbar -->