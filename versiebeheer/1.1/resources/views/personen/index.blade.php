@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    @if(count($personen)>0)
        @foreach($personen as $persoon)
            <div class="well well-sm">
                <a href="/middenpolder/personen/{{$persoon->id}}">{{$persoon->anaam}}</a>
            </div>
        @endforeach
        {{$personen->links()}}
    @else
        <p>Geen personen</p>
    @endif
@endsection