<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    // public function __construct()
    // {
    //     // $this->middleware('guest')->except('logout');
    //     $this->middleware('guest:admin')->except('logout');
    //     $this->middleware('guest:staff')->except('logout');
    //     $this->middleware('guest:student')->except('logout');
    // } return redirect()->route('home');

    public function showStaffLoginForm(){
        return view('login_staff');
    }


    public function checkLoggedInUser(Request $request)
    {
        if(Auth::guard('staff')->check()){
            Auth::logout();
            $request->session()->invalidate();
            $this->staffLogin();
        }        
    }

    public function staffLogin( Request $request )
    {
        // Auth::logout();
        // Auth::guard('staff')->logout();

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);
       
        if (Auth::guard('staff')->attempt(['email' => $request->email, 'password' => $request->password])) {

            if (Auth::guard('staff')->user()->is_admin == 1) {
                $request->session()->regenerate();
                return redirect('/login-as-admin-or-staff');
            }

            $request->session()->regenerate();
            return redirect()->intended('/staff');
        }
        // return back()->withInput($request->only('email', 'remember'));
        return back()->with('warning','The provided credentials do not match our records.')->onlyInput('email');
    }

    public function staffOut( Request $request )
    {
        // if(Auth::guard('student')->check()){
        //     Auth::guard('student')->logout();
        //     return redirect()->route('home');
        // }elseif (Auth::guard('staff')->check()) {
        //     Auth::guard('staff')->logout();
        //     return redirect()->route('home');
        // }

        Auth::logout();
        $request->session()->invalidate();
        return redirect()->intended('/');

        // Session::flush();
        
        // Auth::logout();
    }

    public function loginAsAdminOrStaff(){
        return view('asking_login_user');
    }
}


