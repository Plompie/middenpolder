@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    @if(count($medewerkers)>0)
        @foreach($medewerkers as $medewerker)
            <div class="well well-sm">
                <a href="/middenpolder/medewerkers/{{$medewerker->id}}">{{$medewerker->id}}</a>
            </div>
        @endforeach
        {{$medewerkers->links()}}
    @else
        <p>Geen medewerkers</p>
    @endif
@endsection