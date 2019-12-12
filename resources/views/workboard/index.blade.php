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
                            <th>
                                <a href="{{ url('posts/' . $post->id . '/apply') }}" class="btn btn-primary">Złóż ofertę</a>
                            </th>
                        </tr>
                        @endforeach
                     </table>
                     <div class="panel-body text-left">
                        <a class="btn btn-outline-dark" href="/posts/create">Create Posts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
