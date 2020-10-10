@extends('layout.master')

@section('title','Infor')
@section('loged', $userloged)


@section('content')

    <form action="" method="" style="width:45%; margin: 0 auto;">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" id="id" name="id" value="{!! $getStudentById[0]->id !!}" />
        <h2>Thông tin cá nhân</h2>
        <div class="form-group">
            <label for="exampleInputEmail1">Tên đăng nhập</label>
            <input disabled name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $getStudentById[0]->username }}" />
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Họ và tên</label>
            <input disabled name="fullname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $getStudentById[0]->fullname }}" />
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input disabled name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $getStudentById[0]->email }}" />
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Số điện thoại</label>
            <input disabled name="phonenumber" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $getStudentById[0]->phonenumber }}" />
        </div>
        <a href="/user/profile/{{ Auth::user()->id }}/edit" style="width:100px;padding:10px; background-color:black; color:white">Sửa thông tin</a>
        <a href="/user/profile/{{ Auth::user()->id }}/changepass" style="width:100px;padding:10px; background-color:black; color:white; margin-left:30px;">Đổi mật khẩu</a>

    </form>
@endsection