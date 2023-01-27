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
          <div class="nav-bar">
            <img src="{{ asset('icon/light-menu-fill.svg') }}" alt="">
            <div class="nav-text">menu</div>            
          </div>
          <div><a href="#">Dashboard</a></div>
          <div><a href="#">Logout</a></div>
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

  @yield('script')
</body>
</html>