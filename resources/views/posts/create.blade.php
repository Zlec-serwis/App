@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    {!! Form::open(['action'=> 'PostController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
            {{Form::label('body', 'Body')}}</br>
            {{Form::textarea('body', '', ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Body Text'])}}</br>
            {{Form::submit('Submit', ['class'=> 'btn btn-default btn-outline-dark'])}}
        </div>
    {!!Form::close()!!}
@endsection

