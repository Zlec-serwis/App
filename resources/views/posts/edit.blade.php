@extends('layouts.app')

@section('content')
    <div class="card m-4 p-4">
        <h1>Edytuj zlecenie</h1>
        {!! Form::model($post, ['action'=> ['PostController@update', $post->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Tytuł')}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Tytuł'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Opis')}}</br>
            {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Opis'])}}</br>

            {{Form::label('CategoryList', 'Kategoria')}}</br>
            {{Form::select('CategoryList', $categories , $post->category_list ?? null,
                ['class' => 'form-control'])}}</br>
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=> 'btn btn-default btn-outline-dark'])}}
        {!!Form::close()!!}
    </div>

@endsection
