@extends('layouts.app')


@section('content')
<div class="card">
    <h1>{{$post->title}}</h1>
    <h2>{{$post->user->name}}</h2>
    <div>
    {!!$post->body!!}
    </div>
    <hr>
    <small>Dodane {{$post->created_at}}by {{$post->user->name}}</small>
    <hr>
    <a href="/posts" class=""><button type="button" class="card btn btn-default btn-outline-dark">Wstecz</Button></a>

    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-default btn-outline-dark">Edit</a>
            {!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection
</div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>