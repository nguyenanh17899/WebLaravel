<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // use Auth;
    function index()
    {
        if (Auth::check()) {
            return View::make('user.student');
        } else {
            return View::make('index');
        }
    }
    function login(Request $req)
    {
        $username = $req->input('username');
        $password = $req->input('password');
    
        if (Auth::attempt(array('username' => $username, 'password' => $password))) {
            return Redirect::to('user/student')->with('success', 'Dang nhap thanh cong');
        } else {
            return Redirect::to('/login')->with('failed', 'Sai thong tin dang nhap');
        }
    }
    
}
