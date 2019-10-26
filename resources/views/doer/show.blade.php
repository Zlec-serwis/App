@extends('layouts.app')
@section('content')

<h2>Witaj na stronie firmy {{$doer->name}}</h2>
<div class="row">


    <!-- left col. -->
    <div class="col-xs-12 col-md-4 single-left">
        
        <!-- category -->
        <div class="card">
            <div class="left-col-box categories-box">
                <h4>Kategorie</h4>

                <!-- do zrobienia pętla z kategoriami obsługiwanych przez firme -->
                <ul class="list-group">
                    <li class="list-group-item">
                        <h5>id kategori</h5>
                        <span>ilość</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- rating -->
        <div class="card">
            <div class="left-col-box">
                <h4>Oceny</h4>

                <!-- do dopisania dynamiczne wartosci -->
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="badge">1342</span>Zrealizowanych
                    </li>
                    <li class="list-group-item">
                        <span class="badge">18</span>Niezrealizowanych
                    </li>
                    <li class="list-group-item">
                        <span class="badge">7800</span>Podjętych
                    </li>
                    <li class="list-group-item">
                        <span class="badge">832</span>Negatywnych
                    </li>
                </ul>                            
            </div>
        </div>
    </div>
    <!-- right col. -->
    <div class="col-xs-12 col-md-8">
        
        <div class="card">
            <div class="embed-responsive embed-responsive-16by9">
                <img class="embed-responsive-item" src="/uploads/avatars/{{$doer->avatar}}" >
            </div>
                <h4>Czym się zajmujemy</h4>
                <p>{{$doer->description}}</p>
                <div class="edit-button">
                    <button class="btn btn-primary btn-lg">
                        Napisz
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>