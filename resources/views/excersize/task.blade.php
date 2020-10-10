@extends('layout/master')

@section('title','Excersize page')

@section('content')
@section('loged', $userloged)


<h3>Danh sách bài tập</h3>

@if(Auth::user()->role === 1)
<a href="/excersize/create">Thêm bài tập</a>
@endif
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th scope="col">Bài tập</th>
            <th scope="col">Ngày đăng</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($exs as $ex)
        <tr>
            
            <td><a href="{{ asset('fileEx/'. $ex->filename) }}">{{ $ex->filename }}</a></td>
            <td>{{$ex->date_create}}</td>

            @if(Auth::user()->role === 1)
            <td><a href="/excersize/{{$ex->id}}/listsub">Xem</a></td>
            @else
            <td><a href="/excersize/{{$ex->id}}/submit">Nộp bài</a>
                @endif

        </tr>
        @endforeach
    </tbody>
</table>
@endsection