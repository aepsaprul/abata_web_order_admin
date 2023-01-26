<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>

  {{-- styles --}}
  <link rel="stylesheet" href="{{ asset('css/styles-login.css') }}">
</head>
<body>
  <div class="container">
    <div class="content">
      <div class="logo">
        <img src="{{ asset('img/logo.png') }}" alt="" style="width: 150px;">
      </div>        
      <div class="login">
        <form action="{{ route('login.auth') }}" method="POST">
          @csrf
          <div class="email-container">
            <label for="">Email</label>
            <div class="input">
              <input type="text" name="email" id="email" class="@error('email') is-invalid @enderror" required autofocus autocomplete="off">
              <img src="{{ asset('icon/mail-line.svg') }}" alt="" style="max-width: 25px;">
            </div>
            <em class="pesan-kesalahan">@error('email') {{ $message }} @enderror</em>
          </div>
          <div class="password-container">
            <label for="">Password</label>
            <div class="input">
              <input type="password" name="password" id="password" required>
              <img src="{{ asset('icon/eye-close-line.svg') }}" alt="" class="lihat-password" style="max-width: 25px; cursor: pointer;">
              <img src="{{ asset('icon/eye-line.svg') }}" alt="" class="tutup-password" style="max-width: 25px; cursor: pointer; display: none;">
            </div>
          </div>
          <div class="remember-container">
            <label for="remember">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> <span>Ingat Saya</span>
            </label>
          </div>
          <div class="signin-container">
            <button type="submit" class="btn-signin">Sign In</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    const lihatPassword = document.querySelector(".lihat-password");
    const tutupPassword = document.querySelector('.tutup-password');
    const password = document.querySelector('#password');

    lihatPassword.addEventListener('click', function () {
      password.setAttribute('type', 'text');
      this.style.display = 'none';
      tutupPassword.style.display = 'block';
    })

    tutupPassword.addEventListener('click', function () {
      password.setAttribute('type', 'password');
      this.style.display = 'none';
      lihatPassword.style.display = 'block';
    })
  </script>
</body>
</html>