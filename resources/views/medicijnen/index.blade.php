@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    @if(count($medicijnen)>0)
        @foreach($medicijnen as $medicijn)
            <div class="well well-sm">
                <a href="/middenpolder/medicijnen/{{$medicijn->id}}">{{$medicijn->naam}}</a>
            </div>
        @endforeach
        {{$medicijnen->links()}}
    @else
        <p>Geen medicijnen</p>
    @endif
@endsection