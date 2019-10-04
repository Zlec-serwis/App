@extends('layouts.app')
@section('content')
<img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px; ">
    <h2>Profil {{$user->name}}
    <a class="btn btn-default btn-outline-dark" href="/profile" role="button">Avatar</a>
    <a class="btn btn-default btn-outline-dark" href="/profile/doer" role="button">Wykonawca</a>
    </h2>
<div class="row">	
    <div class="col-md-0 col-md-offset-2">	
        <div class="panel-body">	
            <!-- change profile data -->
            {!! Form::model($user, ['method'=>'POST', 'class'=>'form-horizontal','action'=>['UserController@doer_profile']]) !!}
            <div class="form-group">	
                <div class="col-md-0 control-label">	
                    {!! Form::label('doer','Wykonawca')!!}	
                    {!! Form::hidden('doer', '0', ['class'=>'form-cntrol'])!!}	
                    {!! Form::checkbox('doer', '1',  ['class'=>'form-cntrol'])!!}	
                </div>	
            </div>	
            <div class="form-group">	
                <div class="col-md-0 control-label">	
                    {!! Form::label('description','Opis:')!!}	
                </div>	
                <div class="col-md-0">	
                    {!! Form::textarea('description', null, ['class'=>'form-cntrol'])!!}	
                </div>	
            </div>	
            <div class="form-group">	
                <div class="col-md-0 col-md-offset-4">	
                    {!! Form::submit('Aktualizuj', null, ['class'=>'btn btn-primary'])!!}	
                </div>	
             {!!Form::close()!!}
            </div>	
        </div>
    </div>	
</div>
@endsection

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>