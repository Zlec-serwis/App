@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card-body">
                <div class="card-header">
                  <h1><strong>Tablica zleceń</strong></h1>
                </div>
                <div class="jumbotron text-center">
                    <h3>Dostępne zlecenia</h3>
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>

                         @foreach($posts as $post)
                        <tr>
                            <th>{{$post->title}}</th>
                            <th></th>
                            <th>
                                <a href="{{ url('posts/' . $post->id ) }}" class="btn btn-primary">Podgląd oferty</a>
                            </th>
                            <th>
                            @if($post->offers->count() != 0)
                                @foreach($post->offers as $offer)
                                    @if($offer->doer_id == Auth::user()->doerRelation->id)
                                        <button class="btn btn-primary" disabled>Oferta została złożona</button>
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
        </div>
    </div>
</div>
@endsection
