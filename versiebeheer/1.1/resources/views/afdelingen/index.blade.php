@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    @if(count($afdelingen)>0)
        @foreach($afdelingen as $afdeling)
            <div class="well well-sm">
                <a href="/middenpolder/afdelingen/{{$afdeling->id}}">{{$afdeling->afdeling}}</a>
            </div>
        @endforeach
        {{$afdelingen->links()}}
    @else
        <p>Geen afdelingen</p>
    @endif
@endsection