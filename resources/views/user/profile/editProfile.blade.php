@extends('layout.master')

@section('title','Student page')
@section('loged', $userloged)


@section('content')



<form action="{{ url('/user/updateProfile/') }}" method="post" style ="width:45%; margin:0 auto;">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" id="id" name="id" value="{!! $getStudentById[0]->id !!}" />
    <h2>Sửa thông tin cá nhân</h2>
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
        <input name="email" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $getStudentById[0]->email }}" />
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Số điện thoại</label>
        <input name="phonenumber" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $getStudentById[0]->phonenumber }}" />
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection