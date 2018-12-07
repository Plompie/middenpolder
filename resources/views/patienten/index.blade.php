@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    @if(count($patienten)>0)
        @foreach($patienten as $patient)
            <div class="well well-sm">
                <a href="/middenpolder/patienten/{{$patient->id}}">{{$patient->Achternaam}}</a>
            </div>
        @endforeach
        {{$patienten->links()}}
    @else
        <p>Geen patienten</p>
    @endif
@endsection