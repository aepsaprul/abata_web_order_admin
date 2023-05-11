<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Abata</title>
  <link rel="shortcut icon" href="{{ asset('img/logo-daun.png') }}" type="image/x-icon">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  
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
          <a class="notif nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="notif-nomor badge badge-danger navbar-badge"></span>
          </a>
          <div class="notif-dropdown dropdown-menu dropdown-menu-lg dropdown-menu-right"></div>
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
                <i class="nav-icon far fa-folder" style="width: 30px; bpadding-top: 2px; padding-bottom: 2px;border: 1px solid gray ;"></i>
                <p>Kategori</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('produk') }}" class="nav-link {{ request()->is(['produk', 'produk/*']) ? 'active' : '' }}">
                <i class="nav-icon fas fa-boxes" style="width: 30px; padding-top: 2px; padding-bottom: 2px; border: 1px solid gray;"></i>
                <p>Produk</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('slide') }}" class="nav-link {{ request()->is(['slide', 'slide/*']) ? 'active' : '' }}">
                <i class="nav-icon far fa-image" style="width: 30px; padding-top: 2px; padding-bottom: 2px; border: 1px solid gray;"></i>
                <p>Slide</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('transaksi') }}" class="nav-link {{ request()->is(['transaksi', 'transaksi/*']) ? 'active' : '' }}">
                <i class="nav-icon fas fa-random" style="width: 30px; padding-top: 2px; padding-bottom: 2px; border: 1px solid gray;"></i>
                <p>Transaksi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('cara_pesan') }}" class="nav-link {{ request()->is(['cara_pesan', 'cara_pesan/*']) ? 'active' : '' }}">
                <i class="nav-icon fa fa-edit" style="width: 30px; padding-top: 2px; padding-bottom: 2px; border: 1px solid gray;"></i>
                <p>Cara Pesan</p>
              </a>
            </li>
            <li class="nav-item {{ request()->is(['template', 'template/*', 'template_detail', 'template_detail/*']) ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ request()->is(['template', 'template/*', 'template_detail', 'template_detail/*']) ? 'active' : '' }} text-capitalize">
                <i class="nav-icon fa fa-vector-square text-center"  style="width: 30px; padding-top: 2px; padding-bottom: 2px; border: 1px solid gray;"></i> 
                <p>Template<i class="right fas fa-angle-left"></i></p>
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
            <li class="nav-item">
              <a href="{{ route('ekspedisi') }}" class="nav-link {{ request()->is(['ekspedisi', 'ekspedisi/*']) ? 'active' : '' }}">
                <i class="nav-icon fas fa-truck" style="width: 30px; padding-top: 2px; padding-bottom: 2px; border: 1px solid gray;"></i>
                <p>Pengiriman</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('rekening') }}" class="nav-link {{ request()->is(['rekening', 'rekening/*']) ? 'active' : '' }}">
                <i class="nav-icon fas fa-money-check-alt" style="width: 30px; padding-top: 2px; padding-bottom: 2px; border: 1px solid gray;"></i>
                <p>Rekening</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('promo') }}" class="nav-link {{ request()->is(['promo', 'promo/*']) ? 'active' : '' }}">
                <i class="nav-icon fas fa-tags" style="width: 30px; padding-top: 2px; padding-bottom: 2px; border: 1px solid gray;"></i>
                <p>Promo</p>
              </a>
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

  <script>
    function afRupiah(nominal) {
      var	number_string = nominal.toString(),
        sisa 	= number_string.length % 3,
        rupiah 	= number_string.substr(0, sisa),
        ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
      if (ribuan) {
        let separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
      return rupiah;
    }

    tampil();
    function tampil() {
      setTimeout(() => {
        notif();
        tampil();
      }, 1000);
    }

    // notif
    function notif() {
      $.ajax({
        url: "{{ URL::route('notif') }}",
        success: function (response) {
          const notif_length = response.notif.length;
          if (notif_length > 0) {
            $('.notif-nomor').html(notif_length);            
          }
        }
      })
    }

    $('.notif').on('click', function (e) {
      e.preventDefault();
      $.ajax({
        url: "{{ URL::route('notif') }}",
        success: function (response) {
          const notif_length = response.notif.length;
          if (notif_length > 0) {
            let val = ``;
            $.each(response.notif, function (index, item) {
              val += `
                <a href="{{ url('notif/${item.id}/detail') }}" class="dropdown-item">
                  ${item.deskripsi}
                </a>
              `;
            })
            val += `
              <div class="dropdown-divider"></div>
              <a href="#" class="notif-tandai-sudah-dibaca dropdown-item dropdown-footer text-primary">Tandai sudah dibaca</a>
            `;
            $('.notif-dropdown').html(val);
          }
        }
      })
    })

    $('body').on('click', '.notif-tandai-sudah-dibaca', function (e) {
      e.preventDefault();
      $.ajax({
        url: "{{ URL::route('notif.tandai') }}",
        success: function (response) {
          $('.notif-nomor').empty();
          $('.notif-dropdown').empty();
        }
      })
    })
  </script>

  @yield('script')
</body>
</html>