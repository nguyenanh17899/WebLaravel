@extends('layout/master')

@section('title','Student page')

@section('content')
@section('loged', $userloged)

@if(Auth::user()->role === 1)
<a href="/user/create">Thêm</a>
@endif


<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th scope="col">Username</th>
            <th scope="col">Fullname</th>
            <th scope="col">Phonenumber</th>
            <th scope="col">Email</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->username}}</td>
            <td>{{$user->fullname}}</td>
            <td>{{$user->phonenumber}}</td>
            <td>{{$user->email}}</td>
            <td><a href="/user/{{$user->id}}/show">Chi tiết 
                @if(Auth::user()->role === 1)
                    <a href="/user/{{$user->id}}/edit">| Sửa</a>|<a href="/user/{{$user->id}}/delete">Xóa</a>
                @endif
            </td>

        </tr>
        @endforeach

    </tbody>
</table>
@endsection