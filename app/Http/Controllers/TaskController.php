<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;

class TaskController extends Controller
{
    public function index()
    {
        $list = DB::table('excersizes')->get();
        // echo var_dump($list);
        return view('excersize.task', ['userloged' => Auth::user()->username, 'exs' => $list]);
    }

    public function create()
    {
        return view('excersize.create', ['userloged' => Auth::user()->username]);
    }
    public function upload(Request $req)
    {
        if ($req->hasFile('fileUp')) {
            $file = $req->file('fileUp');
            $filename = $file->getClientOriginalName();
            if ($file->move('fileEx', $filename)) {
                $insertData = DB::table('excersizes')->insert([
                    'date_create' => now(), 'filename' => $filename, 'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
                if ($insertData) {
                    session()->flash('success', 'Tải lên thành công');
                } else {
                    session()->flash('error', 'Thất bại');
                }
            }
        } else {
            session()->flash('error', 'Hãy chọn file');
        }
        return redirect('/excersize');
    }

    function showListSub($id)
    {
        
        $ex = DB::table('excersizes')->where('id',$id)->get();
        $list = DB::table('excersize_submit')
            -> leftJoin('users','users.id', '=', 'excersize_submit.id_user') 
            ->where('id_ex',$ex[0]->id)
            ->get();
            // echo var_dump($list);
        return view('excersize.listsub',['list'=>$list, 'ex' => $ex[0], 'userloged' => Auth::user()->username ]);
    }

    function submit($id)
    {
        $ex = DB::table('excersizes')->where('id', $id)->get();
        // echo var_dump($ex[0]);
        return view('excersize.submit', ['userloged' => Auth::user()->username, 'ex'=> $ex[0]]);
    }
    function updateSubmit(Request $req)
    {
        if ($req->hasFile('fileUp')) {
            $file = $req->file('fileUp');
            $id_ex = $req->id_ex;
            $filename = $file->getClientOriginalName();
            if ($file->move('fileSub', $filename)) {
                $insertData = DB::table('excersize_submit')->insert([
                    'id_ex' => $id_ex,
                    'id_user' => Auth::user()->id,
                    'date_sub' => now(),
                    'created_at' => now(), 'filename' => $filename, 'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
                if ($insertData) {
                    session()->flash('success', 'Tải lên thành công');
                } else {
                    session()->flash('error', 'Thất bại');
                }
            }
        } else {
            session()->flash('error', 'Hãy chọn file');
        }
        return redirect('/excersize');
    }
}
