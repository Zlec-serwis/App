@extends('layouts.app')

@section('content')
    <h1>Edite Post</h1>
    {!! Form::open(['action'=> ['PostController@update', $post->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body')}}</br>
        {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Body Text'])}}</br>
    </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=> 'btn btn-default btn-outline-dark'])}}
    {!!Form::close()!!}
@endsection

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>