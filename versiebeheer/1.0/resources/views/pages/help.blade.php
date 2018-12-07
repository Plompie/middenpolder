@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    @if(count($opties) > 0)
        <ul class = "list-group">
            @foreach($opties as $optie)
                <li class = "list-group-item">{{$optie}}</li>
            @endforeach
        </ul>
    @endif
@endsection
