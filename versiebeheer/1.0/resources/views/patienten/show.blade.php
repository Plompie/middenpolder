@extends('layouts.app')

@section('content')
    <a href="/middenpolder/patienten" class="btn btn-default">Ga terug naar overzicht</a>
    <h1>{{$patient->Achternaam}}</h1>
    <small>patiëntennummer: {{$patient->id}}</small>
    <div>
        <table class="table table table-striped">
                <tbody>
                    <tr>
                        <td>voornaam</td>
                        <td>{{$patient->Voornaam}}</td>
                    </tr>
                    <tr>
                        <td>tussenvoegsel</td>
                        <td>{{$patient->Tussenvoegsel}}</td>
                    </tr>
                    <tr>
                        <td>achternaam</td>
                        <td>{{$patient->Achternaam}}</td>
                    </tr>
                    <tr>
                        <td>straat en huisnummer</td>
                        <td>{{$patient->Straat}} {{$patient->Nummer}}</td>
                    </tr>
                    <tr>
                        <td>postode en woonplaats</td>
                        <td>{{$patient->Postcode}} {{$patient->Woonplaats}}</td>
                    </tr>
                    <tr>
                        <td>geboorte datum</td>
                        <td>{{$patient->Geb_datum}}</td>
                    </tr>
                </tbody>
        </table>
    </div>
    <a href="/middenpolder/patienten/{{$patient->id}}/edit" class="btn btn-default">Wijzig</a>
    {!!Form::open(['action' => ['PatientenController@destroy', $patient->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Verwijder', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection