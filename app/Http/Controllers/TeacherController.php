<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    function index()
    {
        $users = DB::table('users')->where(['role' => 1])->get();
        if (count($users) > 0) {
            return view('user.teacher.teacher', ['users' => $users, 'userloged' => Auth::user()->username]);
        }
    }

    public function show($id)
    {
        $getData = DB::table('users')->where('id', $id)->get();
        // echo $getData;
        return view('user.teacher.show',['userloged' => Auth::user()->username])->with('getTeacherById', $getData);
    }

}
