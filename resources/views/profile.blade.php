@extends('layouts.app')

@section('content')
<img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px; ">
    <h2>Profil {{$user->name}}
    <a class="btn btn-default btn-outline-dark" href="/profile" role="button">Avatar</a>
    </h2>
    <form enctype="multipart/form-data" action="profile" method="POST">
        <label>Zmiana Avatara</label>
        <input type="file" name="avatar">
        <input type="hidden" name="_token"  value="{{ csrf_token() }}">
        <input type="submit"  class="pull-right btn btn-sm btn-primary">
    </form>

@endsection
