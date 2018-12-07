@extends('layouts.app')

@section('content')
    <a href="/middenpolder/medicijnen" class="btn btn-default">Ga terug naar overzicht</a>
    <h1>{{$medicijn->naam}}</h1>
    <small>Medicijn nummer: {{$medicijn->id}}</small>

    <a href="/middenpolder/medicijnen/{{$medicijn->id}}/edit" class="btn btn-default">Wijzig</a>
    {!!Form::open(['action' => ['MedicijnenController@destroy', $medicijn->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Verwijder', ['class' => 'btn btn-danger'])}}
{!!Form::close()!!}
@endsection