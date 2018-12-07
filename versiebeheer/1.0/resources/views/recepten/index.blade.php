@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    @if(count($recepten)>0)
        @foreach($recepten as $recept)
            <div class="well well-sm">
                <a href="/middenpolder/recepten/{{$recept->id}}">{{$recept->id}}</a>
            </div>
        @endforeach
        {{$recepten->links()}}
    @else
        <p>Geen recepten</p>
    @endif
@endsection