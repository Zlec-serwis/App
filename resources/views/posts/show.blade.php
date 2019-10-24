@extends('layouts.app')

@section('content')

<div class="card">
    <h1>{{$post->title}}</h1>
    <div>
    {!!$post->body!!}
    </div>
    <hr>
        <small>Kategoria</small>
        @foreach ($post->categories as $category)
            <small>
                <a href="">{{ $category->name }}&nbsp;</a>
            </small>
        @endforeach
    <hr>
        <small>Dodane by</small>    
        <small>{{ $post->user->name }}</small>
    <hr>
        <small>Lokalizacja</small>    
        <small>{{ $post->address->city }}, {{ $post->address->province }}</small>
    <hr>
    



    <div class="btn-group " role="group" aria-label="Basic example">
        <a href="/posts" class="btn btn-default btn-outline-dark">Wstecz</a>
        @if(!Auth::guest())
            @if(Auth::user()->id == $post->user_id)

        <a href="/posts/{{$post->id}}/edit" class="btn btn-default btn-outline-dark">Edytuj</a>


    </div>

    

    {!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-default btn-danger btn-sm'])}}
    {!!Form::close()!!}

    
        @endif
    @endif
@endsection
</div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>