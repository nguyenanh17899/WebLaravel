@extends('layout/master')

@section('title','Submit page')
@section('loged', $userloged)


@section('content')

<form method="post" action="/challenge/checksubmit" enctype="multipart/form-data" style="width:45%;">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id_ch" value="{{ $challenge[0]->id }}">

    <h2>Submit Challenge</h2>
    <p>Challenge: {{$challenge[0]->challenge_name}}</a></p>
    <div class="form-group row">
        <input type="text" name="answer" />
    </div>
    <div class="form-group row">
        <input type="submit" name="uploadclick" value="Submit" />
    </div>
</form>


@endsection