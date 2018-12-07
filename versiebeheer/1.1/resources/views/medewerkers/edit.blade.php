@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <!-- Forms toegevoegd aan laravel
         Formulier dat verwerkt wordt met POST in de update functie van medewerkers controller
         In de form action een array om de id mee te geven 
    -->
    {!! Form::open(['action' => ['MedewerkersController@update', $medewerker->id], 'method' => 'POST']) !!}
        <div class="form-group form-group-sm">
            {{Form::label('id', 'werknemersnummer')}}
            {{Form::text('id', $medewerker->id, ['class'=>'form-control', 'placeholder'])}}
        <!-- code zonder select vervangen door de select daaronder
        <div class="form-group form-group-sm">
        </div>
                {{Form::label('persnr', 'persnr')}}
                {{Form::text('persnr', $medewerker->persnr, ['class'=>'form-control', 'placeholder'])}}
        </div>
        -->
        <div class="form-group form-group-sm">
                {{Form::label('id', 'persoon')}}
                <!-- In voorbeelden op het internet staat als return waarde personen[] (zodat je meerdere personen kunt selecteren en terggeven).
                        We maken hier echter een 1 op 1 relatie. Dus 1 waarde is voldoende: persoon
                        Het derde argument bepaald de waarde die geselecteerd is.
                -->
                {!!Form::select('persnr', $personen, $medewerker->persnr, ['class' => 'form-control', 'placeholder'])!!}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('in_dienst', 'in_dienst')}}
            {{Form::text('in_dienst', $medewerker->in_dienst, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('uit_dienst', 'uit_dienst')}}
                {{Form::text('uit_dienst', $medewerker->uit_dienst, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('afdeling', 'afdeling')}}
                {{Form::text('afdeling', $medewerker->afdeling, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                    {{Form::label('functie', 'functie')}}
                    {{Form::text('functie', $medewerker->functie, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('userId', 'userId')}}
                {{Form::text('userId', $medewerker->userId, ['class'=>'form-control', 'placeholder'])}}
        </div>
<!-- Een hidden form element om een PUT actie te spoofen
     Hierdoor kunnen we de ROUTE PUT gebruiken (zie  'php artisan route: list') 
-->
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Bewaar', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection