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

    public function showStudentLoginForm(){
        return view('login_student');
    }

    public function staffLogin( Request $request )
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);
       
        if (Auth::guard('staff')->attempt(['email' => $request->email, 'password' => $request->password])) {

            if (Auth::guard('staff')->user()->is_admin == 1) {
                $request->session()->regenerate();
                return redirect('/login-as-admin-or-staff');
            }elseif (Auth::guard('staff')->user()->is_admin == 3) {
                $request->session()->regenerate();
                return redirect('/admin');
            }

            $request->session()->regenerate();
            return redirect()->intended('/staff');
        }
        return back()->with('warning','The provided credentials do not match our records.')->onlyInput('email');
    }

    public function studentLogin(Request $request )
    {
        $this->validate($request, [
            'reg_no'   => 'required',
            'password' => 'required'
        ]);
       
        if (Auth::guard('student')->attempt(['reg_no' => $request->reg_no, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/student');
        }
        return back()->with('warning','The provided credentials do not match our records.')->onlyInput('reg_no');
    }

    public function staffOut( Request $request )
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended('/');
    }

    public function adminOut( Request $request )
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended('/');
    }

    public function studentOut( Request $request )
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended('/');
    }

    public function loginAsAdminOrStaff(){
        return view('asking_login_user');
    }
}


