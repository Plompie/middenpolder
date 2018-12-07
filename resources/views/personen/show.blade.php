@extends('layouts.app')

@section('content')
    <a href="/middenpolder/personen" class="btn btn-default">Ga terug naar overzicht</a>
    <h1>persoonnummer: {{$persoon->id}}</h1>
    <small></small>
    <div>
        <table class="table table table-striped">
            <tbody>
                <tr>
                    <td>voornaam</td>
                    <td>{{$persoon->vnaam}}</td>
                </tr>
                <tr>
                    <td>tussenvoegsel</td>
                    <td>{{$persoon->tv}}</td>
                </tr>
                <tr>
                    <td>achternaam</td>
                    <td>{{$persoon->anaam}}</td>
                </tr>
                <tr>
                    <td>titel</td>
                    <td>{{$persoon->titel}}</td>
                </tr>
                <tr>
                    <td>adres</td>
                    <td>{{$persoon->straat}} {{$persoon->hnr}}</td>
                </tr>   
                <tr>
                    <td>postcode en plaats</td>
                    <td>{{$persoon->postcode}} {{$persoon->plaats}}</td>
                </tr>
                <tr>
                    <td>Telefoon</td>
                    <td>{{$persoon->telpriv}}</td>
                </tr>
                <tr>
                    <td>e-mail</td>
                    <td>{{$persoon->PEmail}}</td>
                </tr>
                <tr>
                    <td>geboortedatum</td>
                    <td>{{$persoon->gebdat}}</td>
                </tr>
            </tbody>
        </table>        
    </div>
    <a href="/middenpolder/personen/{{$persoon->id}}/edit" class="btn btn-default">Wijzig</a>
    {!!Form::open(['action' => ['PersonenController@destroy', $persoon->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Verwijder', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection