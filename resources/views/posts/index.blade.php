@extends('layouts.app')


@section('content')
@foreach ($posts as $post)

    <!-- Single post -->
    <a href="{{ url('posts', $post->id) }}">
        <li class="card list-group-item">{{$post -> title}}</li>
    </a>
@endforeach
@endsection
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>