<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medewerker; // gebruik model
// Wanneer je normale sql wilt gebruiken:
// use DB;
use App\Persoon; // dit model gebruiken we bij select lists tijdens edit en create functie


class MedewerkersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // medewerkers ophalen met db functie zonder een array
        // $medewerkers = DB::select('SELECT * FROM medewerkers');
        $data = array(
            // medewerkers ophalen met db functie (vergeet niet use DB):
            // 'medewerkers' => DB::select('SELECT * FROM medewerkers'),
            // medewerkers ophalen met eloquent:
            'medewerkers' => Medewerker::orderBy('id', 'asc')->paginate(8), // gebruik model
            'title' => 'Medewerkers' 
        );
        return view('medewerkers.index')->with($data);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            // haal alle personen op voor de select list
            'personen' => Persoon::orderBy('anaam', 'asc')->pluck('anaam', 'id'),
            'title' => 'Maak een nieuwe medewerker' 
        );
        return view('medewerkers.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validatie
        $this -> validate($request,[
            'id' => 'required',
            'persoon' => 'required'
        ]);
        // Maak een nieuwe medewerker (in database) mbv model
        $medewerker = new Medewerker;
        $medewerker->id = $request->input('id');
        // persoon is de id waarde uit de select
        $medewerker->persnr = $request->input('persoon');
        // $medewerker->persnr = $request->input('persnr');
        $medewerker->in_dienst = $request->input('in_dienst');
        $medewerker->uit_dienst = $request->input('uit_dienst');
        $medewerker->afdeling = $request->input('afdeling');
        $medewerker->functie = $request->input('functie');        
        $medewerker->userid = $request->input('userid');
        $medewerker->save();
        return redirect('/medewerkers')->with('success', 'Medewerker aangemaakt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // zoek een medewerker op id en stop in variabele medewerker
        $medewerker = Medewerker::find($id);
        // geef variabele aan view en toon view
        return view('medewerkers.show')->with('medewerker', $medewerker);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // haal alle personen op voor de select list
        $data = array(
            'title' => 'Wijzig medewerker gegevens',
            // haal alle personen op voor de select list
            'personen' => Persoon::orderBy('anaam', 'asc')->pluck('anaam', 'id'),
            // zoek een medewerker op id en stop in variabele medewerker
            'medewerker' => Medewerker::find($id)
        );
        // geef variabelen aan view en toon view
        return view('medewerkers.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validatie
        $this -> validate($request,[
            'id' => 'required',
            'persnr' => 'required'
        ]);
        // Werk de medewerker bij op basis van id
        $medewerker = Medewerker::find($id);
        $medewerker->id = $request->input('id');
        $medewerker->persnr = $request->input('persnr');
        $medewerker->in_dienst = $request->input('in_dienst');
        $medewerker->uit_dienst = $request->input('uit_dienst');
        $medewerker->afdeling = $request->input('afdeling');
        $medewerker->functie = $request->input('functie');        
        $medewerker->userid = $request->input('userid');
        $medewerker->save();
        return redirect('/medewerkers')->with('success', 'Medewerker bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medewerker = Medewerker::find($id);
        $medewerker->delete();
        return redirect('/medewerkers')->with('success', 'Medewerker verwijderd');
    }
}
