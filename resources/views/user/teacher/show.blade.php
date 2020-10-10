@extends('layout.master')

@section('title','Student page')
@section('loged', $userloged)

@section('content')



<div style="display:flex">
    <form action="" method="" style="width:45%;">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" id="id" name="id" value="{!! $getTeacherById[0]->id !!}" />
        <h2>Thông tin giáo viên</h2>
        <div class="form-group">
            <label for="exampleInputEmail1">Tên đăng nhập</label>
            <input disabled name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $getTeacherById[0]->username }}" />
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Họ và tên</label>
            <input disabled name="fullname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $getTeacherById[0]->fullname }}" />
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input disabled name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $getTeacherById[0]->email }}" />
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Số điện thoại</label>
            <input disabled name="phonenumber" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $getTeacherById[0]->phonenumber }}" />
        </div>
        <div class="form-group">
            <a href="/user/{{$getTeacherById[0]->id}}/send_mess">Gửi tin nhắn</a>
            <!-- <input  name="message" type="submit" class="form-control" value="Gửi tin nhắn" /> -->
        </div>
    </form>
    <!-- <div>
        <h4 style="margin-left:50px;">Tin nhắn</h4>
        <div class="message">
            <div style="width:450px; height:350px; border: 1px solid black; margin-left:30px;"></div>
            <input style="margin-left:30px;" type="text" placeholder="Nhập tin nhắn" name="message" style="width:200px; height:30px;">
            <input type="submit" value="Gửi" name="send" />
        </div>
    </div> -->
</div>
@endsection