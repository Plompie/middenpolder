@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <!-- Forms toegevoegd aan laravel
         Formulier dat verwerkt wordt met POST in de update functie van personen controller
         In de form action een array om de id mee te geven 
    -->
    {!! Form::open(['action' => ['PersonenController@update', $persoon->id], 'method' => 'POST']) !!}
        <div class="form-group form-group-sm">
                {{Form::label('id', 'id')}}
                {{Form::text('id', $persoon->id, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('vnaam', 'vnaam')}}
                {{Form::text('vnaam', $persoon->vnaam, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('tv', 'tv')}}
                {{Form::text('tv', $persoon->tv, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('anaam', 'anaam')}}
                {{Form::text('anaam', $persoon->anaam, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('titel', 'titel')}}
                {{Form::text('titel', $persoon->titel, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('straat', 'straat')}}
                {{Form::text('straat', $persoon->straat, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('hnr', 'hnr')}}
                {{Form::text('hnr', $persoon->hnr, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('postcode', 'postcode')}}
                {{Form::text('postcode', $persoon->postcode, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('plaats', 'plaats')}}
                {{Form::text('plaats', $persoon->plaats, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('telpriv', 'telpriv')}}
                {{Form::text('telpriv', $persoon->telpriv, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('PEmail', 'PEmail')}}
                {{Form::text('PEmail', $persoon->PEmail, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <!-- Een hidden form element om een PUT actie te spoofen
        Hierdoor kunnen we de ROUTE PUT gebruiken (zie  'php artisan route: list') 
        -->
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Bewaar', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection