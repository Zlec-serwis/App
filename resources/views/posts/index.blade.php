@extends('layouts.app')


@section('content')
@foreach ($posts as $post)

    <!-- Single post -->
    <li class="card list-group-item">{{$post -> title}}</li>

@endforeach
@endsection
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>