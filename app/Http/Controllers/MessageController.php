<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Inputs;
use Session;
use Illuminate\Support\Facades\Hash;

class MessageController extends Controller
{
    function showMess($id)
    {
        //listmess A nhận từ B
        $idrecv =$id;
        $idsend = Auth::user()->id;
        $listMess = DB::table('messages')
            ->leftJoin('users', 'users.id', '=', 'messages.id_user_send')
            ->leftJoin(DB::raw('users as u2'), 'u2.id', '=', 'messages.id_user_recv')
            ->where('id_user_send',$idsend)
            ->where('id_user_recv',$idrecv)
            ->orWhere('id_user_send',$idrecv)
            ->where('id_user_recv',$idsend)
            ->orderBy('date_send')
            ->select('messages.*', 'users.username')
            ->get();
        $user_chat = DB::table('users')->where('id', $id)->get();
        // echo $listMess;
        return view('message.show', ['userloged' => Auth::user()->username, 'id_recv' => $id, 'user_chat' => $user_chat[0], 'listMess' =>  $listMess]);
    }
    function sendMess(Request $req)
    {
        $mess = $req->message;
        $id_user_send = Auth::user()->id;
        $id_user_recv = $req->id_recv;
        // echo $id_user_recv;
        //echo $mess;
        $insert = DB::table('messages')->insert(
            [
                'id_user_send' => $id_user_send,
                'id_user_recv' => $id_user_recv,
                'message' => $mess, 'date_send' => now()
            ]
        );

        return back();
    }

    function destroyMess($id)
    {
        $kq = DB::table('messages')->where('id', $id)->delete();
        if ($kq) {
            session()->flash('success', 'Đã xóa tin');
        }
        return back();
    }

    function editMess(Request $req, $id)
    {
        // echo 'id'.$id;
        // $mess = $req->input('id'.$id);
        // echo $mess;
        // $rs= DB::table('messages')
        //     ->update(['message']=>)
    }
}
