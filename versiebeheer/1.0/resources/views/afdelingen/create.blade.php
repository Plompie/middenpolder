@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <!-- Forms toegevoegd aan laravel
         Formulier dat verwerkt wordt met POST in de update functie van afdelingen controller
    -->
    {!! Form::open(['action' => 'MedicijnenController@store', 'method' => 'POST']) !!}
        <div class="form-group form-group-sm">
            {{Form::label('id', 'id')}}
            {{Form::text('id', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('naam', 'naam')}}
                {{Form::text('naam', '', ['class'=>'form-control', 'placeholder'])}}
        </div>
    {{Form::submit('Bewaar', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection