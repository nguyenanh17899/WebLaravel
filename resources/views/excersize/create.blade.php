@extends('layout/master')

@section('title','Student page')
@section('loged', $userloged)


@section('content')

<form method="post" action="/upload" enctype="multipart/form-data" style="width:45%;margin:0 auto;">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <h2>Thêm bài tập</h2>
    <div class="form-group row">
        <label>Chọn file: </label>

        <input type="file" name="fileUp">
    </div>
    <div class="form-group row">
        <input type="submit" name="uploadclick" value="Tải lên" />
    </div>
    <!-- <button type="submit" class="btn btn-primary">Tải lên</button> -->
</form>


@endsection