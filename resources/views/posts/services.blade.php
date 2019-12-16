@extends('layouts.app')

@section('content')
    <h1>Kategorie</h1>
    <ul class="list-group">
        @foreach($categories as $category)
            <li class="card list-group-item mt-2">
                <a href="{{ route('posts.index', ['category' => $category->id]) }}">{{ $category->name }}&nbsp;</a>
            </li>
        @endforeach

@endsection
