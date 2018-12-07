<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient; // gebruik model

class PatientenController extends Controller
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
            //'patienten' => Patient::all(),
            // als je wilt sorteren
            'patienten' => Patient::orderBy('Achternaam', 'asc')->paginate(8),
            'title' => 'Lijst met patienten' 
        );
        
        return view('patienten.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Maak een nieuwe patiënt' 
        );
        return view('patienten.create')->with($data);
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
        // Maak een nieuwe patient (in database) mbv model
        $patient = new Patient;
        $patient->id = $request->input('id');
        $patient->Voornaam = $request->input('Voornaam');
        $patient->Achternaam = $request->input('Achternaam');
        $patient->Tussenvoegsel = $request->input('Tussenvoegsel');
        $patient->Straat = $request->input('Straat');
        $patient->Nummer = $request->input('Nummer');
        $patient->Woonplaats = $request->input('Woonplaats');
        $patient->Postcode = $request->input('Postcode');
        $patient->Geb_datum = $request->input('Geb_datum');
        $patient->save();
        return redirect('/patienten')->with('success', 'Patiënt aangemaakt');
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
        $patient = Patient::find($id);
        // geef variabele aan view en toon view
        return view('patienten.show')->with('patient', $patient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
            'title' => 'Wijzig patiëntgegevens',
            // zoek een patient op id en stop in variabele patient
            'patient' => Patient::find($id)
        );
        // geef variabelen aan view en toon view
        return view('patienten.edit')->with($data);
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
        // Werk de patient bij op basis van id
        $patient = Patient::find($id);
        $patient->id = $request->input('id');
        $patient->Voornaam = $request->input('Voornaam');
        $patient->Achternaam = $request->input('Achternaam');
        $patient->Tussenvoegsel = $request->input('Tussenvoegsel');
        $patient->Straat = $request->input('Straat');
        $patient->Nummer = $request->input('Nummer');
        $patient->Woonplaats = $request->input('Woonplaats');
        $patient->Postcode = $request->input('Postcode');
        $patient->Geb_datum = $request->input('Geb_datum');
        $patient->save();
        return redirect('/patienten')->with('success', 'Patiënt gewijzigd');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        return redirect('/patienten')->with('success', 'Patiënt verwijderd');
    }
}
