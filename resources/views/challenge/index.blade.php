@extends('layout/master')

@section('title','Excersize page')

@section('content')
@section('loged', $userloged)


<h3>Danh sách thử thách</h3>

@if(Auth::user()->role === 1)
<a href="/challenge/create">Tạo thử thách </a>
@endif
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th scope="col">Thử thách</th>
            <th scope="col">Ngày đăng</th>
            @if(Auth::user()->role ===0)
            <th></th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($list as $challenge)
        <tr>
            <td>{{$challenge->challenge_name}}</td>
            <td>{{$challenge->date_create}}</td>
            @if(Auth::user()->role ===0)
            <td><a href="/challenge/{{$challenge->id}}/submit">Submit</a></td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
@endsection