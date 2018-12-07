<?php
// In deze controller maken we gebruik van een view die de gegevens van personen en medewerkers combineert
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PersoonMedewerker; // gebruik model

class PersoonMedewerkersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            //'medewerkers' => Persoon_medewerker::all(), // gebruik model
            // Enkel medewerkers die in_dienst zijn (geen zin om de juiste eloquent op te zoeken dus raw)
            'medewerkers' => PersoonMedewerker::whereRaw('in_dienst IS NOT NULL AND uit_dienst IS NULL')->paginate(8),
            'title' => 'Medewerkers informatie uitgebreid met persoon informatie' 
        );
        
        return view('persoonMedewerkers.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $medewerker = PersoonMedewerker::find($id);
        // geef variabele aan view en toon view
        return view('persoonMedewerkers.show')->with('medewerker', $medewerker);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
