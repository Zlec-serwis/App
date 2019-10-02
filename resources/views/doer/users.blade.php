@extends('layouts.app')

@section('content')
<h1>{{$title}}</h1>
<ul class="list-group">
  <div class="row">

    @foreach($doers as $doer)
    <!-- Single doer -->
    <div class="col-xs-12 col-md-6 col-lg-4 single-doer">
        <div class="card">
        
            <div class="embed-responsive embed-responsive-16by9">
                <img class="embed-responsive-item" src="uploads/avatars/{{$doer->avatar}}" >
            </div>
            <div class="card-content">
            <a href="users/{{$doer->id}}">
                <h4>{{$doer->name}}</h4>
                </a>
                <p>{{$doer->description}}</p>
                <span class="doer-saince">{{$doer->created_at}}</span>
            </div>
        </div>
    </div>
     @endforeach
  </div>
 
@endsection

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>