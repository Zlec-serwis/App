@extends('layouts.app')


@section('content')

    <h1>Zlecenia</h1>
    @if(count($posts) > 0)
        @foreach ($posts as $post)
            <div class="">
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            <small>Written on {{$post->created_at}}</small>
            </div>
        @endforeach
        {{$posts->links()}}
    @else 
        <p>No Posts</p>
    @endif  
@endsection


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>