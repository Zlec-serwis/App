@extends('layouts.app')

@section('content')
    <h1>Edite Post</h1>
    {!! Form::model($post, ['action'=> ['PostController@update', $post->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body')}}</br>
        {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Body Text'])}}</br>

        {{Form::label('CategoryList', 'Category List')}}</br>
        {{Form::select('CategoryList', $categories , $post->category_list ?? null,
            ['class' => 'form-control'])}}</br>
    </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=> 'btn btn-default btn-outline-dark'])}}
    {!!Form::close()!!}
@endsection
