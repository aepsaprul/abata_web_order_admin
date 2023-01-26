<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function authenticate(Request $request)
  {
    $credentials = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    $email = $request->email;
    $password = $request->password;
    $remember = $request->remember;

    if (Auth::attempt(['email' => $email, 'password' => $password], $remember))  {
      $request->session()->regenerate();

      return redirect()->intended('dashboard');
    }

    return back()->withErrors([
      'email' => 'Perikas Kembali Email & Password Anda',
    ])->onlyInput('email');
  }
  public function form()
  {
    if (Auth::user()) {
      return redirect()->route('dashboard');
    } else {
      return view('auth.login');
    }    
  }
  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
  }
}
