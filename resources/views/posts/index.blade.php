@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col">

        <h2>Oferty</h2>

        @foreach ($posts as $post)
        <!-- Single post -->
        <a href="{{ url('posts', $post->id) }}">
            <li class="card list-group-item">
                {{$post -> title}}
            </li>
        </a>
        @endforeach
    </div>
    <div class="col">

        <h2> Wykonawcy </h2>
        @foreach ($doers as $doer)
        <!-- Single post -->
        <a href="{{ url('users', $doer->id) }}">
            <li class="card list-group-item">
                {{$doer -> name}}
                <img width="30" height="30" class="d-inline-block rounded float-right"  src="uploads/avatars/{{$doer->avatar}}" >
            </li>
        </a>
        @endforeach
    </div>
</div>

@endsection
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>s