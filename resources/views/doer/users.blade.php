@extends('layouts.app')

@section('content')

@include('inc.button', ['url' => url('users')])

<div class="row m-3">
<h1 class="display-5">Wykonawcy</h1>
</div>

<div class="container">
    <div class="row">
        @foreach($doers as $doer)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm text-center p-2">
                    <div class="card-body">
                        <img class="rounded-circle mb-2" src="/uploads/avatars/{{$doer->user->avatar}}" alt="Company logo" width="120" height="120">
                        <h3 class="card-title">{{$doer->name}}</h3>
                        <p class="card-text">{{$doer->description}}</p>
                        <p><a class="btn btn-outline-dark" href="users/{{$doer->id}}" role="button">Więcej »</a></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
