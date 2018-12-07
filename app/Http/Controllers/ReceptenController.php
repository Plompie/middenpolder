<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recept; // gebruik model
use App\Patient;
use App\Medicijn;
use App\Recept_status;
use App\PersoonMedewerkerUser;

class ReceptenController extends Controller
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
            //'recepten' => Recepten::all(),
            // als je wilt sorteren (bijvoorbeeld)
            'recepten' => Recept::orderBy('id', 'asc')->paginate(8),
            'title' => 'Lijst met recepten' 
        );
        
        return view('recepten.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // controleer of gebruiker arts is
        // De view PersoonMedewerkerUser heeft een functie kolom
        // Indien die functie arts is dan mag iemand hieraan werken
        $currentUserID =  auth()->user()->id;
        $functie = PersoonMedewerkerUser::select('functie')->where('usersid', $currentUserID)->get();
        $json = json_decode($functie);
        if ($json[0]->functie !== "arts"){
            return redirect('/recepten')->with('error', 'Niet geautoriseerde toegang voor iemand met functie '.$json[0]->functie);
        }
        // autorisatie();
        $data = array(
            // haal alle patienten, medicijnen en statussen op voor de select lists
            'medicijnen' => Medicijn::orderBy('naam', 'asc')->pluck('naam', 'id'),
            'patienten' => Patient::orderBy('achternaam', 'asc')->pluck('achternaam', 'id'),
            'recept_status' => Recept_status::orderBy('id', 'asc')->pluck('status', 'id'),
            'title' => 'Maak een nieuw recept' 
        );
        return view('recepten.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // controleer of gebruiker arts is
        // De view PersoonMedewerkerUser heeft een functie kolom
        // Indien die functie arts is dan mag iemand hieraan werken
        $currentUserID =  auth()->user()->id;
        $functie = PersoonMedewerkerUser::select('functie')->where('usersid', $currentUserID)->get();
        $json = json_decode($functie);
        if ($json[0]->functie !== "arts"){
            return redirect('/recepten')->with('error', 'Niet geautoriseerde toegang voor iemand met functie '.$json[0]->functie);
        }
        // Maak een nieuw recept (in database) mbv model
        $recept = new Recept;
        // ID is een auto increment dus geen invoer id
        // $recept->id = $request->input('id');

        // waarde komt uit select
        $recept->patientID = $request->input('patientID');
        // waarde komt uit select
        $recept->medicijnID = $request->input('medicijnID');
        // waarde komt uit select
        $recept->status = $request->input('statusID');
        $recept->datum_uitgeschreven = $request->input('datum_uitgeschreven');
        $recept->datum_uitgifte = $request->input('datum_uitgifte');
        // eerst met artisan migrate (of rechtstreeks met phpmyadmin) een extra kolom in recepten aangemaakt
        // voor het registreren welke gebruiker een recept aanmaakt
        // op deze plek vullen we dat veld met de id van diegen die is ingelogd
        // we doen dit enkel bij de store functie (het mag niet meer veranderen)
        $recept->user_id = auth()->user()->id;
        $recept->save();
        return redirect('/recepten')->with('success', 'Recept aangemaakt');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // zoek een recept op id en stop in variabele recept
        $recept = Recept::find($id);
        // geef variabele aan view en toon view
        return view('recepten.show')->with('recept', $recept);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // controleer of gebruiker arts is
        // De view PersoonMedewerkerUser heeft een functie kolom
        // Indien die functie arts is dan mag iemand hieraan werken
        $currentUserID =  auth()->user()->id;
        $functie = PersoonMedewerkerUser::select('functie')->where('usersid', $currentUserID)->get();
        $json = json_decode($functie);
        if ($json[0]->functie !== "arts"){
            return redirect('/recepten')->with('error', 'Niet geautoriseerde toegang voor iemand met functie '.$json[0]->functie);
        }
        $data = array(
            'title' => 'Wijzig recept gegevens',
            // haal alle patienten, medicijnen en statussen op voor de select lists
            'medicijnen' => Medicijn::orderBy('naam', 'asc')->pluck('naam', 'id'),
            'patienten' => Patient::orderBy('achternaam', 'asc')->pluck('achternaam', 'id'),
            'recept_status' => Recept_status::orderBy('status', 'asc')->pluck('status', 'id'),
            // zoek een recept op id en stop in variabele recept
            'recept' => Recept::find($id)
        );
        
        // geef variabelen aan view en toon view
        return view('recepten.edit')->with($data);
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
            //'id' => 'required'
        ]);
        $recept = Recept::find($id);
        // waarde komt uit select
        $recept->patientID = $request->input('patientID');
        // waarde komt uit select
        $recept->medicijnID = $request->input('medicijnID');
        // waarde komt uit select
        $recept->status = $request->input('statusID');
        $recept->datum_uitgeschreven = $request->input('datum_uitgeschreven');
        $recept->datum_uitgifte = $request->input('datum_uitgifte');
        $recept->save();
        return redirect('/recepten')->with('success', 'Recept bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // controleer of gebruiker arts is
        // De view PersoonMedewerkerUser heeft een functie kolom
        // Indien die functie arts is dan mag iemand hieraan werken
        $currentUserID =  auth()->user()->id;
        $functie = PersoonMedewerkerUser::select('functie')->where('usersid', $currentUserID)->get();
        $json = json_decode($functie);
        if ($json[0]->functie !== "arts"){
            return redirect('/recepten')->with('error', 'Niet geautoriseerde toegang voor iemand met functie '.$json[0]->functie);
        }
        $recept = Recept::find($id);
        $recept->delete();
        return redirect('/recepten')->with('success', 'Recept verwijderd');
    }
}