@extends('layout.master')

@section('title','Student page')
@section('loged', $userloged)

@section('content')
<h4 style="margin-left:50px;">Tin nhắn với: <span style="color:blue">{{$user_chat->username}}</span></h4>

<div class="message" style="width:450px; height:350px; border: 1px solid black; margin-left:30px; overflow: scroll;">
    <form action="" method="post">
        @foreach($listMess as $mess)
        @if($mess->id_user_send === Auth::user()->id)
        <input type="hidden"  value="{{$mess->id}}">
        <small>{{$mess->username}}{{$mess->date_send}}</small></br>
        <input type="text" name="id{{$mess->id}}" value="{{$mess->message}}"><a href="/message/{{$mess->id}}/edit">Sửa</a>|<a href="/message/{{$mess->id}}/delete">Xóa</a></br>
        @else
        <input type="hidden" value="{{$mess->id}}">

        <small>{{$mess->username}}{{$mess->date_send}}</small></br>
        <input disabled type="text" name="id{{$mess->id}}" value="{{$mess->message}}" style="background-color:pink;"></br>
        @endif
        @endforeach
    </form>
</div>
<form action="/send" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" value="{{$id_recv}}" name="id_recv">

    <input style="margin-left:30px;" type="text" placeholder="Nhập tin nhắn" name="message" style="width:200px; height:30px;">
    <input type="submit" value="Gửi">
</form>
@endsection