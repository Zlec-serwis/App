@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card-body">
                    <div class="jumbotron text-center">
                        <h3>Dostępne oferty</h3>
                        <table class="table table-striped">
                            <tr>
                                <th>Id</th>
                                <th>Użytkownik</th>
                                <th>Cena</th>
                                <th>Liczba dni</th>
                                <th>Opis</th>
                                <th>Akcje</th>
                            </tr>
                            @foreach($offers as $offer)
                                <tr>
                                    <td>{{ $offer->id }}</td>
                                    <td>{{ $offer->doer->name }}</td>
                                    <td>{{ $offer->price }}</td>
                                    <td>{{ $offer->day }}</td>
                                    <td>{{ $offer->description }}</td>
                                    @if($offers->where('accepted', 1)->count() === 0)
                                        <td><a href="{{ url('offers/' . $offer->id . '/accept') }}" class="btn btn-primary">Zaakceptuj</a></td>
                                    @elseif($offers->where('accepted', 1)->first()->id === $offer->id)
                                        <td><button class="btn btn-primary" disabled>Ta oferta została zaakceptowana</button></td>
                                    @else
                                        <td><button class="btn btn-primary" disabled>Nie można już zaakceptować</button></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



