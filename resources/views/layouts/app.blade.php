<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Abata</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('tema/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('tema/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('tema/dist/css/adminlte.min.css') }}">

  @yield('style')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="{{ asset('img/logo.png') }}" height="60" width="110">
    </div>
  
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
          </form>
        </li>
      </ul>
  
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            {{-- <span class="badge badge-warning navbar-badge">15</span> --}}
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
  
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="{{ asset('img/logo.png') }}" alt="AdminLTE Logo" class="brand-image">
        <span class="brand-text font-weight-light">Abata</span>
      </a>
  
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('tema/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Admin</a>
          </div>
        </div>
  
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="{{ route('kategori') }}" class="nav-link {{ request()->is(['kategori', 'kategori/*']) ? 'active' : '' }}">
                <i class="nav-icon far fa-folder"></i>
                <p>Kategori</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('produk') }}" class="nav-link {{ request()->is(['produk', 'produk/*']) ? 'active' : '' }}">
                <i class="nav-icon fas fa-boxes"></i>
                <p>Produk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('slide') }}" class="nav-link {{ request()->is(['slide', 'slide/*']) ? 'active' : '' }}">
                <i class="nav-icon far fa-image"></i>
                <p>Slide</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('cara_pesan') }}" class="nav-link {{ request()->is(['cara_pesan', 'cara_pesan/*']) ? 'active' : '' }}">
                <i class="nav-icon fa fa-edit"></i>
                <p>Cara Pesan</p>
              </a>
            </li>
            <li class="nav-item {{ request()->is(['template', 'template/*', 'template_detail', 'template_detail/*']) ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ request()->is(['template', 'template/*', 'template_detail', 'template_detail/*']) ? 'active' : '' }} text-capitalize">
                <i class="nav-icon fa fa-vector-square text-center mr-2" style="width: 30px;"></i> <p>Template<i class="right fas fa-angle-left"></i></p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('template') }}" class="nav-link {{ request()->is(['template', 'template/*']) ? 'active' : '' }} text-capitalize">
                    <i class="fas fa-angle-right nav-icon"></i> 
                    <p>Template</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('template_detail') }}" class="nav-link {{ request()->is(['template_detail', 'template_detail/*']) ? 'active' : '' }} text-capitalize">
                    <i class="fas fa-angle-right nav-icon"></i> 
                    <p>Detail</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      
      @yield('content')

    </div>
    <!-- /.content-wrapper -->
  
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="{{ asset('tema/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('tema/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('tema/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('tema/dist/js/adminlte.js') }}"></script>

  @yield('script')
</body>
</html>