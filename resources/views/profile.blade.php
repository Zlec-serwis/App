@extends('layouts.app')

@section('content')
<img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px; ">
    <h2>Profil {{$user->name}}</h2>
    <form enctype="multipart/form-data" action="profile" method="POST">
        <label>Zmiana Avatara</label>
        <input type="file" name="avatar">
        <input type="hidden" name="_token"  value="{{ csrf_token() }}">
        <input type="submit"  class="pull-right btn btn-sm btn-primary">
    </form>

<div class="row">
    <div class="col-md-0 col-md-offset-2">
            <div class="panel-body">
            <!-- change profile data -->
                {!! Form::model($user, ['method'=>'POST', 'class'=>'form-horizontal','action'=>['UserController@update']]) !!}
                   
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
                            {!! Form::text('description', null, ['class'=>'form-cntrol'])!!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-0 col-md-offset-4">
                            {!! Form::submit('Aktualizuj', null, ['class'=>'btn btn-primary'])!!}
                        </div>
                    </div>
                    
                {!!Form::close()!!}

            </div>
        </div>
    </div>
</div>

@endsection

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>