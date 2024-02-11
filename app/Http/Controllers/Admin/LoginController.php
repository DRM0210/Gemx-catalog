<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/dashboard';

    // Define the table for admin authentication
    protected $table = 'admins';

   

  public function showLoginForm()
  {
    
      return view('admin.auth.login'); // Replace with the path to your admin login form view
  }

  public function login(Request $request)
  {
      $credentials = $request->validate([
          'email' => 'required|email',
          'password' => 'required',
      ]);

      if (Auth::guard('admin')->attempt($credentials)) {
          // Authentication passed
          return redirect()->intended('admin/dashboard'); // Redirect to the intended page
      }

      return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
  }

  public function logout()
  {
        Auth::guard('admin')->logout();
      return redirect('admin/login');
  }
}