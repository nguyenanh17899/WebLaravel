<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    function index()
    {
        $users = DB::table('users')->where(['role' => 0])->get();
        if (count($users) > 0) {
            return view('user.student.student', ['users' => $users, 'userloged' => Auth::user()->username]);
        }
    }
    public function create()
    {
        return view('user.student.create',['userloged' => Auth::user()->username]);
    }
    public function store(Request $request)
    {
        //Set timezone
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $allRequest  = $request->all();
        $username  = $allRequest['username'];
        $fullname = $allRequest['fullname'];
        $email = $allRequest['email'];
        $phonenumber = $allRequest['phonenumber'];
        $password = Hash::make($allRequest['password']);
        $role = 0;

        //Gán giá trị vào array
        $dataInsertToDatabase = array(
            'username'  => $username,
            'fullname' => $fullname,
            'email' => $email,
            'phonenumber' => $phonenumber,
            'password' => $password,
            'role' => $role,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );

        $insertData = DB::table('users')->insert($dataInsertToDatabase);

        if ($insertData) {
            session()->flash('success', 'Thêm mới học sinh thành công!');
        } else {
            session()->flash('error', 'Thêm thất bại!');
        }

        return redirect('user/create');
    }

    public function edit($id)
    {
        $getData = DB::table('users')->where('id', $id)->get();
        // echo $getData;
        return view('user.student.edit',['userloged' => Auth::user()->username] )->with('getStudentById', $getData);
    }

    public function update(Request $request)
    {
        //Set timezone
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $updateData = DB::table('users')->where('id', $request->id)->update([
            'email' => $request->email,
            'phonenumber' => $request->phonenumber,
            'password' => Hash::make($request->password),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        if ($updateData) {
            session()->flash('success', 'Sửa thành công!');
        } else {
            session()->flash('error', 'Sửa thất bại!');
        }

        return redirect('/user/student');
    }
    public function destroy($id)
    {
        $deleteData = DB::table('users')->where('id', '=', $id)->delete();

        if ($deleteData) {
            session()->flash('success', 'Xóa thành công!');
        } else {
            session()->flash('error', 'Xóa thất bại!');
        }

        return redirect('/user/student');
    }
    public function show($id)
    {
        $getData = DB::table('users')->where('id', $id)->get();
        // echo $getData;
        return view('user.student.show',['userloged' => Auth::user()->username])->with('getStudentById', $getData);
    }
   
}
