@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card-body">
                <div class="card-header">
                  <h1>Moje ogłoszenia</h1>
                </div>
                <div class="col card-body">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Aktywne</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Zakończone</a>
                        </div>
                    </nav>
                <div class="tab-content" id="nav-tabContent">

                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                        <div class="jumbotron text-center">
                            <h3>Aktywne ogłoszenia</h3>
                            <table class="table table-striped">
                                <tr>
                                    <th>Ogłoszenie</th>
                                    <th>Oferty</th>
                                    <th>Zarządzanie ogłoszeniem</th>
                                </tr>

                                @foreach($posts as $post)
                                    <tr>
                                        <th>{{$post->title}}</th>
                                        <th><a href="/posts/{{$post->id}}/offers" class="btn btn-default btn-outline-dark">Pokaż oferty</a></th>
                                        <th>
                                            {!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'button'])!!}

                                            <a href="/posts/{{$post->id}}" class="btn btn-default btn-outline-success">Podgląd</a>
                                            <a href="/posts/{{$post->id}}/edit" class="btn btn-default btn-outline-primary">Edytuj</a>

                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Usuń ogłoszenie', ['class' => 'btn btn-outline-danger'])}}
                                            {!!Form::close()!!}
                                        </th>
                                    </tr>
                                @endforeach
                            </table>
                            <div class="panel-body text-left">
                                <a class="btn btn-outline-dark" href="/posts/create">Dodaj ogłoszenie</a>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                        <div class="jumbotron text-center">
                            <h3>Zaakceptowane ogłoszenia</h3>
                            <table class="table table-striped">
                                <tr>
                                    <th>Ogłoszenie</th>
                                    <th>Firma</th>
                                    <th>Ocena</th>
                                </tr>

                                @foreach($accepted as $accept)
                                    <tr>
                                        <th>{{$accept->post->title}}</th>
                                        <th>{{$accept->doer->name}}</th>
                                        <th><a href="/users/{{$accept->doer->id}}" class="btn btn-default btn-outline-dark">Oceń wykonawcę</a></th>
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


@endsection
