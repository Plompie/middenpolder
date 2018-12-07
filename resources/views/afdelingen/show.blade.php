@extends('layouts.app')

@section('content')
    <a href="/middenpolder/afdelingen" class="btn btn-default">Ga terug naar overzicht</a>
    <h1>{{$afdeling->afdeling}}</h1>
    <small>Afdelingnummer: {{$afdeling->id}}</small>
    <hr>
    <a href="/middenpolder/afdelingen/{{$afdeling->id}}/edit" class="btn btn-default">Wijzig</a>
    {!!Form::open(['action' => ['AfdelingenController@destroy', $afdeling->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Verwijder', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection