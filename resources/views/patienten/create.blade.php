@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <!-- Forms toegevoegd aan laravel
         Formulier dat verwerkt wordt met POST in de create functie van patienten controller
    -->
    {!! Form::open(['action' => 'PatientenController@store', 'method' => 'POST']) !!}
        <div class="form-group form-group-sm">
            {{Form::label('id', 'id')}}
            {{Form::text('id', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('Voornaam', 'Voornaam')}}
            {{Form::text('Voornaam', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('Tussenvoegsel', 'Tussenvoegsel')}}
                {{Form::text('Tussenvoegsel', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('Achternaam', 'Achternaam')}}
            {{Form::text('Achternaam', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('Straat', 'Straat')}}
                {{Form::text('Straat', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                    {{Form::label('Nummer', 'Nummer')}}
                    {{Form::text('Nummer', '', ['clasNummers'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('Postcode', 'Postcode')}}
                {{Form::text('Postcode', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('Woonplaats', 'Woonplaats')}}
            {{Form::text('Woonplaats', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('Geb_datum', 'Geb_datum')}}
            {{Form::text('Geb_datum', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        {{Form::submit('Bewaar', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection

