@extends('layout/master')

@section('title','Student page')
@section('loged', $userloged)


@section('content')

<form action="{{ url('/user/create') }}" method="post" style ="width:45%; margin:0 auto;">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h2>Thêm sinh viên</h2>
        <div class="form-group">
            <label for="exampleInputEmail1">Tên đăng nhập</label>
            <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Họ và tên</label>
            <input name="fullname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Số điện thoại</label>
            <input name="phonenumber" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Mật khẩu</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
@endsection