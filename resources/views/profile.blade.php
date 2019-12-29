@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row card-body bg-white">
        <div class="col-sm-12 mt-4 ml-5">
            <h1>{{ $user->name }}</h1>
        </div>
        <div class="col-sm-3">
            <div class="text-center m-3">
                <img src="/uploads/avatars/{{ $user->avatar }}" class="img-thumbnail" alt="avatar">
                <h6>Zmień awatar</h6>
                <form enctype="multipart/form-data" action="profile" method="POST">
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token"  value="{{ csrf_token() }}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                </form>
            </div> <br> <hr>

            @if($user->doer==1)
            <div class="card">
                <div class="card-header">Firma</div>
                <div class="card-body"><a href="/users/{{ $user->doerRelation['id'] }}">{{$user->doerRelation['name'] }}</a></div>
            </div> <br><hr>
            @endif

            <ul class="list-group">
                <li class="list-group-item text-muted">Aktywność</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Posty</strong></span> {{ $user->posts->count() }}</li>
            </ul>
        </div>

        <div class="col-sm-9">
            <nav>
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">O mnie</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Moja firma</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">

                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                    <div class="row mt-3 p-3">
                        <div class="col-md-6">
                            <label>Name</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$user->name}}</p>
                        </div>
                    </div>

                    <div class="row mt-3 p-3">
                        <div class="col-md-6">
                            <label>E-mail</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$user->email}}</p>
                        </div>
                    </div>

                </div>

                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                    @if($user->doer==1)
                    <div class="row mt-3 p-3">
                        <div class="col-md-6">
                            <label>Nazwa firmy</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$user->doerRelation->name}}</p>
                        </div>
                    </div>

                    <div class="row mt-3 p-3">
                        <div class="col-md-6">
                            <label>Opis</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$user->doerRelation->description}}</p>
                        </div>
                    </div>

                    <div class="row mt-3 p-3">
                        <div class="col-md-6">
                            <label>Adres</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$user->doerRelation->address->city}}, {{$user->doerRelation->address->province}}</p>
                        </div>
                    </div>
                    @else
                    <div class="row mt-3 p-3">
                        <div class="col text-center">
                            <a class="btn btn-default btn-outline-danger btn-lg" href="/doer/create" role="button">Zostań wykonawcą</a>
                        </div>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>


@endsection


