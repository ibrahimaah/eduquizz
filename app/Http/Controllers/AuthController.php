<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('site.auth.login');
    }
    public function showRegisterForm()
    {
        return view('site.auth.register');
    }

    public function login()
    {
        
    }
}
