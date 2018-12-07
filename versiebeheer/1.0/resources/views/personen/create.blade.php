@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <!-- Forms toegevoegd aan laravel
         Formulier dat verwerkt wordt met POST in de create functie van personen controller
    -->
    {!! Form::open(['action' => 'PersonenController@store', 'method' => 'POST']) !!}
        <div class="form-group form-group-sm">
            {{Form::label('id', 'id')}}
            {{Form::text('id', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('vnaam', 'vnaam')}}
            {{Form::text('vnaam', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('tv', 'tv')}}
                {{Form::text('tv', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('anaam', 'anaam')}}
            {{Form::text('anaam', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('titel', 'titel')}}
                {{Form::text('titel', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                    {{Form::label('straat', 'straat')}}
                    {{Form::text('straat', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('hnr', 'hnr')}}
                {{Form::text('hnr', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('postcode', 'postcode')}}
            {{Form::text('postcode', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('plaats', 'plaats')}}
            {{Form::text('plaats', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('telpriv', 'telpriv')}}
            {{Form::text('telpriv', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
            {{Form::label('PEmail', 'PEmail')}}
            {{Form::text('PEmail', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        {{Form::submit('Bewaar', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection

