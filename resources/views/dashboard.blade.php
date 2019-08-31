@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="card-body">
                <div class="card-header">
                  <h1><strong>Panel</strong></h1>
                </div>
                <div class="jumbotron text-center">
                    <h3>Twoje Zlecenia</h3>
                    <table class="table table-striped">
                        <tr>
                            <th>Tytuł</th>
                            <th></th>
                            <th></th>
                            
                        </tr>
                        @foreach($posts as $post)
                        <tr>
                            <th>{{$post->title}}</th>
                            <th><a href="/posts/{{$post->id}}/edit" class="btn btn-default btn-outline-dark">edit</a></th>
                            <th>    {!!Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'POST', 'class' => 'button'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}</th>
                        </tr>
                        @endforeach
                     </table>
                     <div class="panel-body text-left">
                        <a class="btn btn-outline-dark" href="/posts/create">Nowe Zlecenie</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>