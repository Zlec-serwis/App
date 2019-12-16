@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card-body">
                <div class="card-header">
                  <h1>Moje ogłoszenia</h1>
                </div>
                <div class="jumbotron text-center">
                    <h3>Aktywne ogłoszenia</h3>
                    <table class="table table-striped">
                        <tr>
                            <th>Ogłoszenie</th>
                            <th>Oferty</th>
                            <th colspan="2">Zarządzanie ogłoszeniem</th>
                        </tr>

                         @foreach($posts as $post)
                        <tr>
                            <th>{{$post->title}}</th>
                            <th><a href="/posts/{{$post->id}}/offers" class="btn btn-default btn-outline-dark">Pokaż oferty</a></th>
                            <th>
                                <a href="/posts/{{$post->id}}/edit" class="btn btn-default btn-outline-dark">Edytuj</a>
                                <a href="/posts/{{$post->id}}" class="btn btn-default btn-outline-dark">Podgląd</a>
                            </th>
                            <th>
                                {!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'button'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Usuń ogłoszenie', ['class' => 'btn btn-danger'])}}
                                {!!Form::close()!!}
                            </th>
                        </tr>
                        @endforeach
                     </table>
                     <div class="panel-body text-left">
                        <a class="btn btn-outline-dark" href="/posts/create">Dodaj ogłoszenie</a>
                    </div>
                </div>
                <div class="jumbotron text-center">
                    <h3>Zaakceptowane ogłoszenia</h3>
                    <table class="table table-striped">
                        <tr>
                            <th>Ogłoszenie</th>
                            <th>Ocena</th>

                        </tr>

                        @foreach($accepted as $accept)
                            <tr>
                                <th>{{$accept->title}}</th>
                                <th><a href="/posts/users/offers" class="btn btn-default btn-outline-dark">Oceń wykonawcę</a></th>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
