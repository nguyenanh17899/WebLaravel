<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function index()
    {
        $list = DB::table('challenge')->get();
        return view('challenge.index', ['userloged' => Auth::user()->username, 'list'=> $list]);
    }

    public function create()
    {
        return view('challenge.create', ['userloged' => Auth::user()->username]);
    }
    public function update(Request $req)
    {
        if ($req->hasFile('fileUp')) {
            $challengeName = $req->challengeName;
            $file = $req->file('fileUp');
            $filename = $file->getClientOriginalName();
            $file_ext = $file->getClientOriginalExtension();

            if ($file->move('fileChallenge', $filename)) {
                if ($file_ext === 'txt') {
                    $insertData = DB::table('challenge')->insert([
                        'date_create' => now(), 'challenge_name' => $challengeName, 'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                    if ($insertData) {
                        session()->flash('success', 'Tải lên thành công');
                    } else {
                        session()->flash('error', 'Thất bại');
                    }
                } else {
                    session()->flash('error', 'Sai định dạng, đuổi phải là .txt');
                }
            } else {
                session()->flash('error', 'Thất bại');
            }
        } else {
            session()->flash('error', 'Hãy chọn file');
        }
        return back();
    }

    public function submit($id){
        $challenge = DB::table('challenge')->where('id', $id)->get();
        // echo $challenge;
        return view('challenge.submit',['userloged' => Auth::user()->username, 'challenge'=> $challenge]);
    }

    function check(Request $req){
        $asw = $req->answer;
        $id_ch = $req->id_ch;
        $challenge = DB::table('challenge')->where('id',$id_ch)->get();
        $filename = $asw.'.txt';
        $dir = public_path('/fileChallenge/'.$filename);
        $content="";
        if(file_exists($dir)){
            $content = File::get($dir);
            // echo $file;
            session()->flash('success', 'chính xác');

        }
        else{
            session()->flash('error', 'Không chính xác');
        }
        return view('challenge.success',['userloged' => Auth::user()->username, 'challenge'=>$challenge,'content'=>$content]);

    }
}
