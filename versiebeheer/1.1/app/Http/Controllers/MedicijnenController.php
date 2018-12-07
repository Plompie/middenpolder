<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicijn; // gebruik model
use App\PersoonMedewerkerUser;

class MedicijnenController extends Controller
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
            //'medicijnen' => Medicijn::all(),
            // als je wilt sorteren (bijvoorbeeld)
            'medicijnen' => Medicijn::orderBy('naam', 'asc')->paginate(8),
            'title' => 'Lijst met medicijnen' 
        );
        
        return view('medicijnen.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // controleer of gebruiker apotheker is
        // De view PersoonMedewerkerUser heeft een functie kolom
        // Indien die functie apotheker is dan mag iemand hieraan werken
        $currentUserID =  auth()->user()->id;
        $functie = PersoonMedewerkerUser::select('functie')->where('usersid', $currentUserID)->get();
        $json = json_decode($functie);
        if ($json[0]->functie !== "apotheek"){
            return redirect('/recepten')->with('error', 'Niet geautoriseerde toegang voor iemand met functie '.$json[0]->functie);
        }
        $data = array(
            'title' => 'Maak een nieuw medicijn' 
        );
        return view('medicijnen.create')->with($data);
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
            'naam' => 'required'
        ]);
        // Maak een nieuwe medewerker (in database) mbv model
        $medicijn = new Medicijn;
        $medicijn->id = $request->input('id');
        $medicijn->naam = $request->input('naam');
        $medicijn->save();
        return redirect('/medicijnen')->with('success', 'Medicijn aangemaakt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // zoek een medicijn op id en stop in variabele medicijn
        $medicijn = Medicijn::find($id);
        // geef variabele aan view en toon view
        return view('medicijnen.show')->with('medicijn', $medicijn);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // controleer of gebruiker apotheker is
        // De view PersoonMedewerkerUser heeft een functie kolom
        // Indien die functie apotheker is dan mag iemand hieraan werken
        $currentUserID =  auth()->user()->id;
        $functie = PersoonMedewerkerUser::select('functie')->where('usersid', $currentUserID)->get();
        $json = json_decode($functie);
        if ($json[0]->functie !== "apotheek"){
            return redirect('/recepten')->with('error', 'Niet geautoriseerde toegang voor iemand met functie '.$json[0]->functie);
        }
        $data = array(
            // zoek een afdeling op id en stop in variabele afdeling
            'medicijn' => Medicijn::find($id),
            'title' => 'Lijst met medicijnen' 
        );
        // geef variabele aan view en toon view
        return view('medicijnen.edit')->with($data);
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
        // controleer of gebruiker apotheker is
        // De view PersoonMedewerkerUser heeft een functie kolom
        // Indien die functie apotheker is dan mag iemand hieraan werken
        $currentUserID =  auth()->user()->id;
        $functie = PersoonMedewerkerUser::select('functie')->where('usersid', $currentUserID)->get();
        $json = json_decode($functie);
        if ($json[0]->functie !== "apotheek"){
            return redirect('/recepten')->with('error', 'Niet geautoriseerde toegang voor iemand met functie '.$json[0]->functie);
        }
        // validatie
        $this -> validate($request,[
            'id' => 'required',
            'naam' => 'required'
        ]);
        // Maak een nieuwe medewerker (in database) mbv model
        $medicijn = Medicijn::find($id);
        $medicijn->id = $request->input('id');
        $medicijn->naam = $request->input('naam');
        $medicijn->save();
        return redirect('/medicijnen')->with('success', 'Medicijn gewijzigd');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // controleer of gebruiker apotheker is
        // De view PersoonMedewerkerUser heeft een functie kolom
        // Indien die functie apotheker is dan mag iemand hieraan werken
        $currentUserID =  auth()->user()->id;
        $functie = PersoonMedewerkerUser::select('functie')->where('usersid', $currentUserID)->get();
        $json = json_decode($functie);
        if ($json[0]->functie !== "apotheek"){
            return redirect('/recepten')->with('error', 'Niet geautoriseerde toegang voor iemand met functie '.$json[0]->functie);
        }
        $medicijn = Medicijn::find($id);
        $medicijn->delete();
        return redirect('/medicijnen')->with('success', 'Medicijn verwijderd');
    }
}
