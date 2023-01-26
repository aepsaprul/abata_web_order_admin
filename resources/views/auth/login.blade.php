<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <div>
    <form action="{{ route('login.auth') }}" method="POST">
      @csrf
      <div>
        <label for="">Email</label>
        <input type="text" name="email" id="email" required autofocus autocomplete="off">
      </div>
      <div>
        <label for="">Password</label>
        <input type="password" name="password" id="password">
      </div>
      <div>
        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
      </div>
      <div>
        <button type="submit">Sign In</button>
      </div>
    </form>
  </div>
</body>
</html>