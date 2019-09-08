@extends('layouts.app')


@section('content')
<div>
    <h1>Zlecenia</h1>
    @if(count($posts) > 0)
        @foreach ($posts as $post)
            <div class="card">
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <h5>{{$post->user->name}}</h5>
            <small>Dodane {{$post->created_at}}</small>
            </div>
        @endforeach
        {{$posts->links()}}
    @else 
        <p>No Posts</p>
    @endif  
@endsection
</div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>