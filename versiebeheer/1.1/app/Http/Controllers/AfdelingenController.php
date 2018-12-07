<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Afdeling;

class AfdelingenController extends Controller
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
            //'afdelingen' => Afdeling::all(),
            // als je wilt sorteren (bijvoorbeeld)
            'afdelingen' => Afdeling::orderBy('afdeling', 'asc')->paginate(8),
            'title' => 'Lijst met afdelingen' 
        );
        
        return view('afdelingen.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title' => 'Maak een nieuwe afdeling' 
        );
        return view('afdelingen.create')->with($data);
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
            'afdeling' => 'required'
        ]);
        // Maak een nieuwe medewerker (in database) mbv model
        $afdeling = new Afdeling;
        $afdeling->id = $request->input('id');
        $afdeling->afdeling = $request->input('afdeling');
        $afdeling->save();
        return redirect('/afdelingen')->with('success', 'Afdeling aangemaakt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // zoek een afdeling op id en stop in variabele afdeling
        $afdeling = Afdeling::find($id);
        // geef variabele aan view en toon view
        return view('afdelingen.show')->with('afdeling', $afdeling);
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
            // zoek een afdeling op id en stop in variabele afdeling
            'afdeling' => Afdeling::find($id),
            'title' => 'Lijst met afdelingen' 
        );
        // geef variabele aan view en toon view
        return view('afdelingen.edit')->with($data);
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
            'afdeling' => 'required'
        ]);
        // Werk de medewerker bij op basis van id
        $afdeling = Afdeling::find($id);
        $afdeling->id = $request->input('id');
        $afdeling->afdeling = $request->input('afdeling');
        $afdeling->save();
        return redirect('/afdelingen')->with('success', 'Afdeling gewijzigd');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $afdeling = Afdeling::find($id);
        $afdeling->delete();
        return redirect('/afdelingen')->with('success', 'Afdeling verwijderd');
    }
}
