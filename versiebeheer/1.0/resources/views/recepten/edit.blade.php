@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <!-- Forms toegevoegd aan laravel
         Formulier dat verwerkt wordt met POST in de update functie van personen controller
         In de form action een array om de id mee te geven 
    -->
    {!! Form::open(['action' => ['ReceptenController@update', $recept->id], 'method' => 'POST']) !!}
        <!-- Geen id veld (dat is auto increment) -->
        <div class="form-group form-group-sm">
                {{Form::label('id', 'patient')}}
                <!-- In voorbeelden op het internet staat als return waarde patienten[] (zodat je meerdere patienten kunt selecteren en terggeven).
                        We maken hier echter een 1 op 1 relatie. Dus 1 waarde is voldoende: patient
                        Het derde argument bepaald de waarde die geselecteerd is (bij create is deze leeg)
                -->
                {!!Form::select('patientID', $patienten, $recept->patientID, ['class' => 'form-control', 'placeholder'])!!}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('id', 'medicijn')}}
                <!-- In voorbeelden op het internet staat als return waarde patienten[] (zodat je meerdere patienten kunt selecteren en terggeven).
                        We maken hier echter een 1 op 1 relatie. Dus 1 waarde is voldoende: patient
                        Het derde argument bepaald de waarde die geselecteerd is (bij create is deze leeg)
                -->
                {!!Form::select('medicijnID', $medicijnen, $recept->medicijnID, ['class' => 'form-control', 'placeholder'])!!}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('id', 'status')}}
                <!-- In voorbeelden op het internet staat als return waarde patienten[] (zodat je meerdere patienten kunt selecteren en terggeven).
                        We maken hier echter een 1 op 1 relatie. Dus 1 waarde is voldoende: patient
                        Het derde argument bepaald de waarde die geselecteerd is (bij create is deze leeg)
                        Dus statusID is naam van veld in form, status is de waarde die uit recepten tabel komt
                        en $recept_status is de tabel die gebruikt wordt voor de select list
                        statusID wordt ook gebruikt bij de update functie in de controller
                -->
                {!!Form::select('statusID', $recept_status,  $recept->status, ['class' => 'form-control', 'placeholder'])!!}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('datum_uitgeschreven', 'datum_uitgeschreven')}}
                {{Form::date('datum_uitgeschreven',  $recept->datum_uitgeschreven)}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('datum_uitgifte', 'datum_uitgifte')}}
                {{Form::date('datum_uitgifte', $recept->datum_uitgifte)}}
        </div>
        <!-- Een hidden form element om een PUT actie te spoofen
        Hierdoor kunnen we de ROUTE PUT gebruiken (zie  'php artisan route: list') 
        -->
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Bewaar', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection