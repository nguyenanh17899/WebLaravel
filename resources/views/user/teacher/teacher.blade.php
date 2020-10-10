@extends('layout/master')

@section('title','Teacher page')

@section('content')
@section('loged', $userloged)



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
            <td><a href="/user/teacher/{{$user->id}}/show">Chi tiết </td>

        </tr>
        @endforeach

    </tbody>
</table>
@endsection