@extends('layouts.app')


@section('content')
    <a href="/posts" class=""><button type="button" class="card btn btn-default btn-outline-dark">Back</Button></a>
    <h1>{{$post->title}}</h1>
    <div>
    {!!$post->body!!}
    </div>    
    <hr>
    <small>Written on {{$post->created_at}}</small>
    <hr>
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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>