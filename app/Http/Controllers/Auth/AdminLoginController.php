<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('adminlogout');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public  function login(Request $request)
    {
        $this->validate($request,[
           'email'    => 'required|email',
           'password' => 'required|min:6'
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email,'password' => $request->password],$request->remember))
        {
            return redirect()->intended(route('admin.home'));
        }
        else
        {
            return redirect()->back()->with('status', 'Wrong Password or Email');
        }
    }

    public function adminlogout()
    {
        //dd('keluar');
        Auth::guard('admin')->logout();

       // $request->session()->invalidate();

        return redirect('/admin/login');
    }
}
