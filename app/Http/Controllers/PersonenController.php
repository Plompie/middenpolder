<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persoon;

class PersonenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            // gebruik model en eloquent
            //'personen' => Persoon::all(),
            // als je wilt sorteren
            'personen' => Persoon::orderBy('anaam', 'asc')->paginate(8),
            'title' => 'Lijst met personen' 
        );
        
        return view('personen.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Maak een nieuwe persoon' 
        );
        return view('personen.create')->with($data);
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
            'id' => 'required'
        ]);
        // Maak een nieuwe persoon (in database) mbv model
        $persoon = new Persoon;
        $persoon->id = $request->input('id');
        $persoon->anaam = $request->input('anaam');
        $persoon->vnaam = $request->input('vnaam');
        $persoon->tv = $request->input('tv');
        $persoon->straat = $request->input('straat');
        $persoon->hnr = $request->input('hnr');
        $persoon->plaats = $request->input('plaats');
        $persoon->postcode = $request->input('postcode');
        $persoon->telpriv = $request->input('telpriv');
        $persoon->PEmail = $request->input('PEmail');
        $persoon->save();
        return redirect('/personen')->with('success', 'Persoon aangemaakt');
    }  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // zoek een patient op id en stop in variabele patient
        $persoon = Persoon::find($id);
        // geef variabele aan view en toon view
        return view('personen.show')->with('persoon', $persoon);
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
            'title' => 'Wijzig persoonsgegevens',
            // zoek een medewerker op id en stop in variabele medewerker
            'persoon' => Persoon::find($id)
        );
        // geef variabelen aan view en toon view
        return view('personen.edit')->with($data);
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
            'id' => 'required'
        ]);
        // Werk de persoon bij op basis van id
        $persoon = Persoon::find($id);
        $persoon->id = $request->input('id');
        $persoon->anaam = $request->input('anaam');
        $persoon->vnaam = $request->input('vnaam');
        $persoon->tv = $request->input('tv');
        $persoon->straat = $request->input('straat');
        $persoon->hnr = $request->input('hnr');
        $persoon->plaats = $request->input('plaats');
        $persoon->postcode = $request->input('postcode');
        $persoon->telpriv = $request->input('telpriv');
        $persoon->PEmail = $request->input('PEmail');
        $persoon->save();
        return redirect('/personen')->with('success', 'Persoon gewijzigd');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persoon = Persoon::find($id);
        $persoon->delete();
        return redirect('/personen')->with('success', 'Persoon verwijderd');
    }
}
