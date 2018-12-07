@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <!-- Forms toegevoegd aan laravel
         Formulier dat verwerkt wordt met POST in de update functie van afdelingen controller
    -->
    {!! Form::open(['action' => ['AfdelingenController@update', $medicijn->id], 'method' => 'POST']) !!}
        <div class="form-group form-group-sm">
            {{Form::label('id', 'id')}}
            {{Form::text('id', '$medicijn->id', ['class'=>'form-control', 'placeholder'])}}
        </div>
        <div class="form-group form-group-sm">
                {{Form::label('naam', 'naam')}}
                {{Form::text('naam', $medicijn->naam, ['class'=>'form-control', 'placeholder'])}}
        </div>
        <!-- Een hidden form element om een PUT actie te spoofen
        Hierdoor kunnen we de ROUTE PUT gebruiken (zie  'php artisan route: list') 
        -->
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Bewaar', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
