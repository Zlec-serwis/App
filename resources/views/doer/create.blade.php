@extends('layouts.app')

@section('content')
    <h1>Zostań wykonawcą</h1>
    {!! Form::model($user,['action'=> 'UserController@store_doer', 'method' => 'POST']) !!}
    <div class="form-group">	
        <div class="col-md-0 control-label">	
            {!! Form::label('doer','Wykonawca')!!}	
            {{ Form::radio('doer', '1' , true) }}
        </div>	
    </div>	
    <div class="form-group">
        {!! Form::label('make', 'Opis firmy') !!}
        {!! Form::text('make', '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">

        {{Form::label('CategoryList', 'Kategoria firmy')}}</br>
        {{Form::select('CategoryList', $categories , null, ['class' => 'form-control'])}}</br> 

        {{Form::label('AddressesList', 'Adres')}}</br>
        {{Form::select('Addresses', $addresses , null, ['class' => 'form-control'])}}</br> 

        {{Form::submit('Submit', ['class'=> 'btn btn-default btn-outline-dark'])}}
    </div>
    {!!Form::close()!!}
@endsection

