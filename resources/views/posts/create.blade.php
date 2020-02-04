@extends('layouts.app')

@section('content')
    <div class="card m-4 p-4">
        <h1>Stwórz zlecenie</h1>
        {!! Form::open(['action'=> 'PostController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Tytuł')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Tytuł'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Opis')}}</br>
            {{Form::textarea('body', '', ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Opis'])}}</br>

            {{Form::label('CategoryList', 'Kategorie')}}</br>
            {{Form::select('CategoryList', $categories , null, ['class' => 'form-control'])}}</br>

            {{Form::label('AddressesList', 'Adres')}}</br>
            {{Form::select('Addresses', $addresses , null, ['class' => 'form-control'])}}</br>

            {{Form::submit('Submit', ['class'=> 'btn btn-default btn-outline-dark'])}}
        </div>
        {!!Form::close()!!}
    </div>

@endsection

