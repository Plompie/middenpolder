@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            {{         Auth::logout() }}
            {{ Session::flush() }}
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welkom {{$vnaam}} {{$tv}} {{$anaam}}<br><br>
                    Zoek naar persoon en geboortedatum: 
                    <form action="/middenpolder/search" method="POST" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="q"
                                placeholder="Search users"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    Zoek
                                </button>
                            </span>
                        </div>
                    </form>
                    @if($patienten != "")
                    De namen van uw patienten en de bijbehorende receptnummers (klik op receptnummer om te wijzigen):
                    <div class=""mx-auto">
                        <table class="table table-striped">
                            <th>voornaam</th><th>tv</th><th>achternaam</th><th>geboortedatum</th><th>receptnr</th>
                            @foreach($patienten as $patient)
                                <tr><td>{{$patient->Voornaam}}</td><td>{{$patient->Tussenvoegsel}}</td><td>{{$patient->Achternaam}}</td><td>{{$patient->Geb_datum}}</td><td><a href="/middenpolder/recepten/{{$patient->receptID}}">{{$patient->receptID}}</a></td></tr>
                            @endforeach
                        </table>
                    </div>
                    @endif
                    <div class="col-md-12">
                        <a href="/middenpolder/personen/create" class="btn btn-primary btn-block">Nieuwe persoon</a>
                        <a href="/middenpolder/medewerkers/create" class="btn btn-primary btn-block">Nieuwe medewerker</a>
                        <a href="/middenpolder/afdelingen/create" class="btn btn-primary btn-block">Nieuwe afdeling</a>
                        <a href="/middenpolder/medicijnen/create" class="btn btn-primary btn-block">Nieuw medicijn</a>
                        <a href="/middenpolder/recepten/create" class="btn btn-primary btn-block">Nieuw recept</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
