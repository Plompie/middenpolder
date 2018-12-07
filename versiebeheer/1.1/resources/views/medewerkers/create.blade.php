@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <!-- Forms toegevoegd aan laravel
         Formulier dat verwerkt wordt met POST in de create functie van medewerkers controller
    -->
    {!! Form::open(['action' => 'MedewerkersController@store', 'method' => 'POST']) !!}
        <div class="form-group form-group-sm">
            {{Form::label('id', 'id')}}
            {{Form::text('id', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <!-- De volgende regels zijn overbodig door het gebruik van de select daaronder
        <div class="form-group form-group-sm">
                {{Form::label('persnr', 'persnr')}}
                {{Form::text('persnr', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        -->
        <div class="form-group form-group-sm">
            <!-- In voorbeelden op het internet staat als return waarde personen[] (zodat je meerdere personen kunt selecteren en terggeven).
                 We maken hier echter een 1 op 1 relatie. Dus 1 waarde is voldoende: persoon
            -->
            {!!Form::select('persoon', $personen, null, ['class' => 'form-control', 'placeholder'])!!}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('in_dienst', 'in_dienst')}}
            {{Form::text('in_dienst', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('uit_dienst', 'uit_dienst')}}
                {{Form::text('uit_dienst', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('afdeling', 'afdeling')}}
                {{Form::text('afdeling', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                    {{Form::label('functie', 'functie')}}
                    {{Form::text('functie', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('userId', 'userId')}}
                {{Form::text('userId', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        {{Form::submit('Bewaar', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection