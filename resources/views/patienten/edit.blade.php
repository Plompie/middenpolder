@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <!-- Forms toegevoegd aan laravel
         Formulier dat verwerkt wordt met POST in de update functie van patienten controller
         In de form action een array om de id mee te geven 
    -->
    {!! Form::open(['action' => ['PatientenController@update', $patient->id], 'method' => 'POST']) !!}
        <div class="form-group form-group-sm">
                {{Form::label('id', 'id')}}
                {{Form::text('id', $patient->id, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('Voornaam', 'Voornaam')}}
                {{Form::text('Voornaam', $patient->Voornaam, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('Tussenvoegsel', 'Tussenvoegsel')}}
                {{Form::text('Tussenvoegsel', $patient->Tissenvoegsel, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('Achternaam', 'Achternaam')}}
                {{Form::text('Achternaam', $patient->Achternaam, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('Straat', 'Straat')}}
                {{Form::text('Straat', $patient->Straat, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                        {{Form::label('Nummer', 'Nummer')}}
                        {{Form::text('Nummer', $patient->Nummer, ['clasNummers'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('Postcode', 'Postcode')}}
                {{Form::text('Postcode', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('Woonplaats', 'Woonplaats')}}
                {{Form::text('Woonplaats', $patient->Postcode, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('Geb_datum', 'Geb_datum')}}
                {{Form::text('Geb_datum', $patient->Geb_datum, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <!-- Een hidden form element om een PUT actie te spoofen
        Hierdoor kunnen we de ROUTE PUT gebruiken (zie  'php artisan route: list') 
        -->
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Bewaar', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection