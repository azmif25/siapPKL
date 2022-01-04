<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use Redirect;
use Brian2694\Toastr\Facades\Toastr;

class LoginController extends Controller
{
    //
    use AuthenticatesUsers;


    public function __construct()
    {
      // $this->middleware('guest');
      // $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
      // $this->redirectTo = url()->previous();
      // $this->middleware('guest')->except('logout');
      $this->middleware('guest', ['except' => 'logout']);
    }

    public function getLogin()
    {
        return view('Login.formLogin');
    }

    public function postLogin(Request $request)
    {
      if (Auth::attempt([
          'email' => $request->EmailUsername,
          'password' => $request->password
        ])) {
        return redirect('/')->with('alert', 'Berhasil Login');
      }elseif (Auth::attempt([
        'username' => $request->EmailUsername,
        'password' => $request->password
        ])) {
        Session::flash('message', 'Berhasil Login');
        return redirect('/');
      }else {
        Session::flash('error', 'Akun Yang anda masukan Salah');
        return redirect()->back();
      }
    }

    // public function logout(){
    //     Session::flush();
    //     Auth::guard($this->getGuard())->logout();
    //     return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    // }

    // public function logout(Request $request)
    // {
    //     $this->guard()->logout();
    //     $request->session()->invalidate();
    //     return $this->loggedOut($request) ?: redirect()->back();
    // }

    // public function logout() {
    //         Auth::logout(); // logout user
    //         Session::flush();
    //         Redirect::back();
    //         return Redirect::to('/'); //redirect back to login
    // }

    // public function logout(){
        // Auth::logout();
        // return redirect('/login'); // ini untuk redirect setelah logout

    //     Auth()->logout();
    //     Session::flush();
    //     return redirect('/');
    // }

    // public function logout()
    //  {
    //          Auth::logout();
    //     return redirect()->route('login');
    // }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();
        Auth::logout();
        // Session::flash('message','User Just Logout');
        // return Redirect::to('/')->with('message', 'You have been logged out');
        return Redirect::to('/')->with('error', 'The error message here!');
    }
}
