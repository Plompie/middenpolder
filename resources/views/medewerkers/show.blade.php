@extends('layouts.app')

@section('content')
    <a href="/middenpolder/medewerkers" class="btn btn-default">Ga terug naar overzicht</a>
    <h1>{{$medewerker->id}}</h1>
    <small>personeelsnummer: <a href="/middenpolder/personen/{{$medewerker->persnr}}">{{$medewerker->persnr}}</a></small>
    <div>
        <table class="table table table-striped">
            <tbody>
                <tr>
                    <td>in dienst</td>
                    <td>{{$medewerker->in_dienst}}</td>
                </tr>
                <tr>
                    <td>uit dienst</td>
                    <td>{{$medewerker->uit_dienst}}</td>
                </tr>
                <tr>
                    <td>afdeling</td>
                    <td><a href="/middenpolder/afdelingen/{{$medewerker->afdeling}}">{{$medewerker->afdeling}}</a></td>
                </tr>
                <tr>
                    <td>functie</td>
                    <td>{{$medewerker->functie}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr>
<!--
    knop om te editen
-->
    <a href="/middenpolder/medewerkers/{{$medewerker->id}}/edit" class="btn btn-default">Wijzig</a>
<!--
    knop om te deleten
    action bestaat uit een array met functie(destroy) en id
    de method is POST maar zal gespoofed worden naar een DELETE
-->
    {!!Form::open(['action' => ['MedewerkersController@destroy', $medewerker->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Verwijder', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection