@extends('layouts.app')

@section('content')
    <a href="/middenpolder/persoonMedewerkers" class="btn btn-default">Ga terug naar overzicht</a>
    <h1>Persoonsnummer: <a href="/middenpolder/medewerkers/{{$medewerker->id}}">{{$medewerker->id}}</a></h1>
    <small>Medewerkernummer: <a href="/middenpolder/personen/{{$medewerker->persnr}}">{{$medewerker->persnr}}</a></small>
    <div>
        <table class="table table table-striped">
            <tbody>
                <tr>
                    <td>voornaam</td>
                    <td>{{$medewerker->vnaam}}</td>
                </tr>
                <tr>
                    <td>tussenvoegsel</td>
                    <td>{{$medewerker->tv}}</td>
                </tr>
                <tr>
                    <td>achternaam</td>
                    <td>{{$medewerker->anaam}}</td>
                </tr>
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
                    <td><a href="/middenpolder/afdelingen/{{$medewerker->afdnr}}">{{$medewerker->afdeling}}</a></td>
                </tr>
            </tbody>
        </table>
    </div>
<h5>Voor het bewerken/verwijderen van gegevens: klik op de gewenste link.</h5>
@endsection