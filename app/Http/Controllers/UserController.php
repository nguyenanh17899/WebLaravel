<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showProfile($id)
    {
        $getData = DB::table('users')->where('id', $id)->get();
        // echo $getData;
        return view('user.profile.showInfor',['userloged' => Auth::user()->username])->with('getStudentById', $getData);
    }

    public function editProfile($id)
    {
        $getData = DB::table('users')->where('id', $id)->get();
        // echo $getData;
        return view('user.profile.editProfile',['userloged' => Auth::user()->username])->with('getStudentById', $getData);
    }
    public function updateProfile(Request $request)
    {
        //Set timezone
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $updateData = DB::table('users')->where('id', $request->id)->update([
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        if ($updateData) {
            session()->flash('success', 'Sửa thành công!');
        } else {
            session()->flash('error', 'Sửa thất bại!');
        }

        return back();
    }

    public function changepassProfile($id)
    {
        $getData = DB::table('users')->where('id', $id)->get();
        // echo $getData;
        return view('user.profile.changepassProfile',['userloged' => Auth::user()->username])->with('getStudentById', $getData);
    }

    public function updatePwd(Request $req)
    {
        $id = $req->input('id');
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $getData = DB::table('users')->where('id', $id)->get();
        $pass=  $getData[0]->password;
        $cur_pass = $req->input('cur_pass');
        $new_pass = $req->input('new_pass');
        $new_pass2 = $req->input('re_new_pass');
        if (Hash::check($cur_pass, $pass)) {
            // echo "ok";
            if ($new_pass === $new_pass2) {
                $updateData = DB::table('users')->where('id', $id)->update([
                    'password' => Hash::make($new_pass),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
                if ($updateData) {
                    session()->flash('success', 'Sửa thành công!');
                } else {
                    session()->flash('error', 'Sửa thất bại!');
                }
            } else {
                session()->flash('error', 'Mật khẩu không khớp');
            }
        } else {
            session()->flash('error', 'Mật khẩu hiện tại không đúng');
        }

        return back();
    }
}
