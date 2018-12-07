@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    @if(count($medewerkers)>0)
        @foreach($medewerkers as $medewerker)
            <div class="well well-sm">
                <a href="/middenpolder/persoonMedewerkers/{{$medewerker->id}}">{{$medewerker->vnaam}} {{$medewerker->tv}} {{$medewerker->anaam}}</a>
                (In dienst: {{$medewerker->in_dienst}})
            </div>
        @endforeach
        {{$medewerkers->links()}}
    @else
        <p>Geen medewerkers</p>
    @endif
@endsection