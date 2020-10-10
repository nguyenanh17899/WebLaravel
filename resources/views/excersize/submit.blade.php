@extends('layout/master')

@section('title','Submit page')
@section('loged', $userloged)


@section('content')

<form method="post" action="/excersize/updateSub" enctype="multipart/form-data" style="width:45%;margin:0 auto;">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <h2>Nộp bài tập</h2>
    <p>Bài tập: <a href="{{ asset('fileEx/'.$ex->filename) }}">{{$ex->filename}}</a></p>
    <input type="hidden" name="id_ex" value="{{$ex->id}}">
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