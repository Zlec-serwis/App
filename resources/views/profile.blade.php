@extends('layouts.app')

@section('content')
<br><br>
<img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px; ">
    <br><br><h2>Profil {{$user->name}}
    <a class="btn btn-default btn-outline-dark" href="/profile" role="button">Edycja</a>
    </h2>
    <br><br><br>
    <form enctype="multipart/form-data" action="profile" method="POST">
        <label>Zmiana</label>
        <input type="file" name="avatar">
        <input type="hidden" name="_token"  value="{{ csrf_token() }}">
        <input type="submit"  class="pull-right btn btn-sm btn-primary">
    </form>
    <br><br>
<td valign="top"><div align="left">Sekcja wykonwacy</div></td>
<table>
    <div class="clearfix"></div>
    <hr style="margin:5px 0 5px 0;">
    @if($user->doer==1)
        <td valign="top"><div align="left">Nazwa firmy</div></td>
        <td valign="top">{{$user->doerRelation->name}}</td>
        <td valign="top"><div align="left">Opis:</div></td>
        <td valign="top">{{$user->doerRelation->description}}</td>
        <td valign="top"><div align="left">Adres:</div></td>
        <td valign="top">{{$user->doerRelation->address->city}}</td>
    @else
        <td valign="top"><div>nie jesteś wykonawcą</td>
        </tr>
    @endif

</table>

<p align="center"><a href="index.php"></a></p>


@endsection

