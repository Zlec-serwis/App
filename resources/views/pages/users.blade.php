@extends('layouts.app')

@section('content')
<h1>{{$title}}</h1>
<ul class="list-group">
  @foreach($doers as $doer)
        <li class="card list-group-item">{{ $doer->name }}</li>
  @endforeach


@endsection

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>