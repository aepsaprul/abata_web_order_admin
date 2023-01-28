<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Abata</title>

  {{-- style --}}
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

  @yield('style')
</head>
<body>
  <div class="container">
    <div class="wrapper">
      <div class="header">
        <div class="nav">
          <div class="nav-bar" onclick="bukaSidebar()">
            <img src="{{ asset('icon/light-menu-fill.svg') }}" alt="">
            <div class="nav-text">menu</div>            
          </div>
          <div><a href="{{ url('/') }}"><img src="{{ asset('icon/dashboard-2-line.svg') }}" alt=""> Dashboard</a></div>
          <div>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="{{ asset('icon/logout-circle-r-line.svg') }}" alt=""> Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
              @csrf
            </form>
          </div>
        </div>
        <div class="notifikasi">
          <img src="{{ asset('icon/light-notification-2-fill.svg') }}" alt="">
          <img src="{{ asset('icon/light-mail-fill.svg') }}" alt="">
        </div>
      </div>

      <div class="content">
        @yield('content')
      </div>
    </div>
  </div>

  <div id="sidebarId" class="sidebar">
    <button class="closebtn" onclick="tutupSidebar()">x</button>
    <a href="#"><img src="{{ asset('icon/folder-line.svg') }}" alt=""> Kategori</a>
    <a href="#"><img src="{{ asset('icon/gallery-line.svg') }}" alt=""> Produk</a>
    <a href="#"><img src="{{ asset('icon/image-2-line.svg') }}" alt=""> Slide</a>
    <a href="#"><img src="{{ asset('icon/todo-line.svg') }}" alt=""> Cara Pesan</a>
  </div>

  <script>
    function bukaSidebar() {
      document.getElementById("sidebarId").style.width = "200px";
    }
    function tutupSidebar() {
      document.getElementById("sidebarId").style.width = "0";
    }
  </script>

  @yield('script')
</body>
</html>