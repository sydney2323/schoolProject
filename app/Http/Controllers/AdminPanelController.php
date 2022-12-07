<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function index(){
        // $modules = Module::all();
        return view('index');
    }

    public function login(){
        // $modules = Module::all();
        return view('login');
    }
}
