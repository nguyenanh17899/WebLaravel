@extends('layout/master')

@section('title','Excersize submit')

@section('content')
@section('loged', $userloged)


<h3>Danh sách bài làm</h3>
<p>Bài tập: <a href="{{ asset('fileEx/'.$ex->filename) }}">{{$ex->filename}}</a></p>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th scope="col">Sinh viên</th>
            <th scope="col">Bài làm</th>
            <th scope="col">Ngày nộp</th>
        </tr>
    </thead>
    <tbody>
        @foreach($list as $sub)
        <tr>

            <td>{{$sub->fullname}}</td>
            <td><a href="{{asset('fileSub/'.$sub->filename)}}">{{$sub->filename}}</a></td>
            <td>{{$sub->date_sub}}</td>
        </tr>

        @endforeach
    </tbody>
</table>
@endsection