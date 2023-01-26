<h1>selamat datang</h1>
{{ Auth::user() }}
<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST">
  @csrf
</form>