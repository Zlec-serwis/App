@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-3 p-4">
        <p>Oferta ważna do: {{$post->created_at->addDays(7)}} </p>
        <h3>{{$post->title}}</h3>
        <div>
            {!!$post->body!!}
        </div>
        <hr>
        <small>Kategoria</small>
        @foreach ($post->categories as $category)
            <small>
                <a href="{{ route('posts.index', ['category' => $category->id]) }}">{{ $category->name }}&nbsp;</a>
            </small>
        @endforeach
        <hr>
        <small>Dodane przez</small>
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

        <div class="btn-group" role="group" aria-label="Basic example">

            {!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{-- {{Form::submit('Delete', ['class' => 'btn btn-default btn-danger btn-sm'])}} --}}
            {!!Form::close()!!}

        </div>
        @endif
        @endif

    </div>
</div>
<div class="container">
    <div class="row mt-3">
        <h2>Złożone oferty</h2>
    </div>
    <div class="row mt-3">
        @foreach ($offers as $offer)
            <div class="col-md-4">
                <div class="card mb-2">
                    <div class="card-body">
                        <h4 class="card-title">{{$offer->doer->name}}</h4>
                        <p class="card-text">{{$offer->description}}</p>
                        <p class="card-text">Cena: {{$offer->price}}</p>
                        <p class="card-text">Czas wykonana: {{$offer->day}} dni</p>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
</div>
<div class="container">
    <div class="row mt-3">
        <h2>Firmy w twojej okolicy</h2>
    </div>
    <div class="row mt-3">

        @foreach ($doers as $doer)
            <div class="col-md-4">
                <div class="card mb-2">
                    <div class="card-body">
                        <h4 class="card-title">{{$doer->name}}</h4>
                        <p class="card-text">{{$doer->description}}</p>
                        <p><a class="btn btn-outline-dark" href="/users/{{$doer->id}}" role="button">Więcej »</a></p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
@endsection
