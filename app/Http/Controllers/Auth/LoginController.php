<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(){
        Auth::logout();
        return redirect(route('login'));
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|max:255',
            'password'  => 'required|max:255',
        ]);

           if(Auth::guard('web')->attempt(['email' => $request->email,'password' => $request->password],$request->remember))
           {
               return redirect()->intended(route('home'));
           }
           else
           {
                //$response = session('status','Wrong email or password');
                //return view('auth.login')->withResponse($response);
                return redirect()->back()->with('status', 'Wrong Password or Email');
           }
    }
}
