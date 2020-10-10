@extends('layout.master')

@section('title','Student page')
@section('loged', $userloged)


@section('content')



<form action="/profile/updatePwd" method="post" style ="width:45%; margin:0 auto;">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" id="id" name="id" value="{!! $getStudentById[0]->id !!}" />
    <h2>Đổi mật khẩu</h2>
    <div class="form-group">
        <label for="exampleInputEmail1">Mật khẩu cũ</label>
        <input  name="cur_pass" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  />
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Mật khẩu mới</label>
        <input name="new_pass" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"/>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Nhập lại mật khẩu  mới</label>
        <input name="re_new_pass" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection