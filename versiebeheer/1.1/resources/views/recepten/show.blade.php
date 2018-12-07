@extends('layouts.app')

@section('content')
    <a href="/middenpolder/recepten" class="btn btn-default">Ga terug naar overzicht van recepten</a>
    <h1>receptennummer: {{$recept->id}}</h1>
    <small></small>
    <div>
        <table class="table table table-striped">
            <tbody>
                <tr>
                    <td>patiëntennummer</td>
                    <td><a href="/middenpolder/patienten/{{$recept->patientID}}">{{$recept->patientID}}</a></td>
                </tr>
                <tr>
                    <td>medicijnennummer</td>
                    <td><a href="/middenpolder/medicijnen/{{$recept->medicijnID}}">{{$recept->medicijnID}}</a></td>
                </tr>
            </tbody>
        </table>     
    </div>
    <!--
    knop om te editen
    -->
    <a href="/middenpolder/recepten/{{$recept->id}}/edit" class="btn btn-default">Wijzig</a>
    <!--
        knop om te deleten
        action bestaat uit een array met functie(destroy) en id
        de method is POST maar zal gespoofed worden naar een DELETE
    -->
    {!!Form::open(['action' => ['ReceptenController@destroy', $recept->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Verwijder', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}    
@endsection