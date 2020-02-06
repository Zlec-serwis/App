@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card-body">
                <div class="card-header">
                  <h1><strong>Moje zlecenia</strong></h1>
                </div>

                <div class="col card-body">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Dostępne</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Złożone</a>
                            <a class="nav-item nav-link" id="nav-accepted-tab" data-toggle="tab" href="#nav-accepted" role="tab" aria-controls="nav-accepted" aria-selected="false">Zaakceptowane</a>
                            <a class="nav-item nav-link" id="nav-rejected-tab" data-toggle="tab" href="#nav-rejected" role="tab" aria-controls="nav-rejected" aria-selected="false">Odrzucone</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">

                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                            <div class="jumbotron text-center">
                                <h3>Dostępne zlecenia</h3>
                                <table class="table table-striped">
                                    <tr>
                                        <th>Zlecenie</th>
                                        <th colspan="3"> Zarządzanie zleceniem</th>
                                    </tr>

                                    @foreach($posts as $post)
                                        <tr>
                                            <th>{{$post->title}}</th>
                                            <th></th>
                                            <th>
                                                <a href="{{ url('posts/' . $post->id ) }}" class="btn btn-primary">Podgląd zlecenia</a>
                                            </th>
                                            <th>
                                                @if($post->offers->count() != 0)
                                                    @foreach($post->offers as $offer)
                                                        @if($offer->doer_id == Auth::user()->doerRelation->id)
                                                            <button class="btn btn-primary" disabled>Oferta została złożona</button>
                                                        @elseif($offer->doer_id != Auth::user()->doerRelation->id)
                                                            <a href="{{ url('posts/' . $post->id . '/apply') }}" class="btn btn-primary">Złóż ofertę</a>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <a href="{{ url('posts/' . $post->id . '/apply') }}" class="btn btn-primary">Złóż ofertę</a>
                                                @endif
                                            </th>
                                        </tr>
                                    @endforeach
                                </table>

                            </div>

                        </div>

                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                            <div class="jumbotron text-center">
                                <h3>Złożone oferty zlecenia</h3>
                                <table class="table table-striped">
                                    <tr>
                                        <th>Zlecenie</th>
                                        <th>Użytkownik</th>
                                        <th>Zarządzanie zleceniem</th>
                                        <th>Status</th>
                                    </tr>

                                    @foreach($offers as $offer)
                                        <tr>
                                            <th>{{$offer->post->title}}</th>
                                            <th>{{$offer->user->name}}</th>
                                            <th>
                                                <a href="{{ url('posts/' . $offer->post->id ) }}" class="btn btn-primary">Podgląd oferty</a>
                                            </th>
                                            <th><p class="text-info">{{$offer->status->name}}</p></th>

                                        </tr>
                                    @endforeach
                                </table>

                            </div>

                        </div>

                        <div class="tab-pane fade" id="nav-accepted" role="tabpanel" aria-labelledby="nav-accepted-tab">

                            <div class="jumbotron text-center">
                                <h3>Zakceptowane zlecenia</h3>
                                <table class="table table-striped">
                                    <tr>
                                        <th>Zlecenie</th>
                                        <th>Użytkownik</th>
                                        <th>Zarządzanie zleceniem</th>
                                        <th>Status</th>
                                    </tr>

                                    @foreach($accepted as $offer)
                                        <tr>
                                            <th>{{$offer->post->title}}</th>
                                            <th>{{$offer->user->name}}</th>
                                            <th>
                                                <a href="{{ url('posts/' . $offer->post->id) }}" class="btn btn-primary">Podgląd oferty</a>
                                            </th>
                                            <th><p class="text-info">{{$offer->status->name}}</p></th>

                                        </tr>
                                    @endforeach
                                </table>

                            </div>

                        </div>

                        <div class="tab-pane fade" id="nav-rejected" role="tabpanel" aria-labelledby="nav-rejected-tab">

                            <div class="jumbotron text-center">
                                <h3>Odrzucone zlecenia</h3>
                                <table class="table table-striped">
                                    <tr>
                                        <th>Zlecenie</th>
                                        <th>Użytkownik</th>
                                        <th>Zarządzanie zleceniem</th>
                                        <th>Status</th>
                                    </tr>

                                    @foreach($rejected as $offer)
                                        <tr>
                                            <th>{{$offer->post->title}}</th>
                                            <th>{{$offer->user->name}}</th>
                                            <th>
                                                <a href="{{ url('posts/' . $offer->post->id ) }}" class="btn btn-primary">Podgląd oferty</a>
                                            </th>
                                            <th><p class="text-info">{{$offer->status->name}}</p></th>

                                        </tr>
                                    @endforeach
                                </table>

                            </div>

                        </div>

                    </div>
                </div>






            </div>
        </div>
    </div>
</div>
@endsection
