@extends('layouts.app')

@section('content')

<div class="row m-3">
    <h1 class="display-5">{{$title}}</h1>
</div>
<div class="row">

    <!-- Single doer -->
{{--        <div class="col-xs-12 col-md-6 col-lg-4 single-doer">--}}
{{--            <div class="card" style="width: 14rem;">--}}

{{--                <div class="embed-responsive embed-responsive-16by9">--}}
{{--                    <img class="embed-responsive-item" src="/uploads/avatars/{{$doer->user->avatar}}" >--}}
{{--                </div>--}}
{{--                <div class="card-content">--}}
{{--                    <a href="users/{{$doer->id}}">--}}
{{--                        <h4></h4>--}}
{{--                    </a>--}}
{{--                    <p>{{$doer->description}}</p>--}}
{{--                    <span class="doer-saince">{{$doer->created_at}}</span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
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



</div>

@endsection
