@extends('layouts.app')

@section('content')
    <h1>Złóż ofertę</h1>
    {!! Form::open(['method' => 'POST', 'action' => ['PostController@apply', $post->id]]) !!}
    <div class="form-group">
        {{ Form::label('price', 'Cena') }}
        {{ Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Cena']) }}
    </div>
    <div class="form-group">
        {{ Form::label('day', 'Liczba dni') }}
        {{ Form::text('day', null, ['class' => 'form-control', 'placeholder' => 'Liczba dni']) }}
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Opis') }}
        {{ Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Opis']) }}
    </div>
    {{ Form::submit('Submit', ['class'=> 'btn btn-default btn-outline-dark']) }}
    {!! Form::close() !!}
@endsection
