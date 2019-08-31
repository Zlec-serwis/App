@extends('layouts.app')
@section('content')
<div class="jumbotron text-center">
    <h1>{{$title}}</h1>
    <p>Praca inzynierska</p>
   <p><a href="/login" class="btn btn-primary btn-lg" role="button">Login</a> <a href="/login" class="btn btn-success btn-lg" role="button">Register</a></p>
</div>  

@endsection


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>