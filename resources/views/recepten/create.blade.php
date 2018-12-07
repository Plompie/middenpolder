@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <!-- Forms toegevoegd aan laravel
         Formulier dat verwerkt wordt met POST in de update functie van recepten controller
    -->
    {!! Form::open(['action' => 'ReceptenController@store', 'method' => 'POST']) !!}
        <!-- Geen id veld (dat is auto increment) -->
        <div class="form-group form-group-sm">
                {{Form::label('id', 'patient')}}
                <!-- In voorbeelden op het internet staat als return waarde patienten[] (zodat je meerdere patienten kunt selecteren en terggeven).
                        We maken hier echter een 1 op 1 relatie. Dus 1 waarde is voldoende: patient
                        Het derde argument bepaald de waarde die geselecteerd is (bij create is deze leeg)
                -->
                {!!Form::select('patientID', $patienten, '', ['class' => 'form-control', 'placeholder'])!!}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('id', 'medicijn')}}
                <!-- In voorbeelden op het internet staat als return waarde patienten[] (zodat je meerdere patienten kunt selecteren en terggeven).
                        We maken hier echter een 1 op 1 relatie. Dus 1 waarde is voldoende: patient
                        Het derde argument bepaald de waarde die geselecteerd is (bij create is deze leeg)
                -->
                {!!Form::select('medicijnID', $medicijnen, '', ['class' => 'form-control', 'placeholder'])!!}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('id', 'status')}}
                <!-- In voorbeelden op het internet staat als return waarde patienten[] (zodat je meerdere patienten kunt selecteren en terggeven).
                        We maken hier echter een 1 op 1 relatie. Dus 1 waarde is voldoende: patient
                        Het derde argument bepaald de waarde die geselecteerd is (bij create is deze leeg)
                -->
                {!!Form::select('statusID', $recept_status, '', ['class' => 'form-control', 'placeholder'])!!}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('datum_uitgeschreven', 'datum_uitgeschreven')}}
                {{Form::date('datum_uitgeschreven', \Carbon\Carbon::now()), ['class' => 'pull-right']}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('datum_uitgifte', 'datum_uitgifte')}}
                {{Form::date('datum_uitgifte', \Carbon\Carbon::now())}}
        </div>
        {{Form::submit('Bewaar', ['class' => 'btn btn-primary'])}}
   {!! Form::close() !!}
@endsection