<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\UserReceptPatient;
use App\PersoonMedewerkerUser;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Gebruik user is om de naam te achterhalen
        // gebruik persoonmedewerkeruser
        $currentUserID = auth()->user()->id;

        $result = PersoonMedewerkerUser::select('vnaam','anaam','tv')->where('usersid', $currentUserID)->get();

        $naam = json_decode($result);
        $data = array(
            'vnaam' => PersoonMedewerkerUser::select('vnaam','anaam','tv')->where('usersid', $currentUserID)->first()->vnaam,
            'tv' => PersoonMedewerkerUser::select('vnaam','anaam','tv')->where('usersid', $currentUserID)->first()->tv,
            'anaam' => PersoonMedewerkerUser::select('vnaam','anaam','tv')->where('usersid', $currentUserID)->first()->anaam,
            // leeg zoekveld
            'patienten' => ""
        );

        return view('dashboard')->with($data);
    }

    // Zoek functie vanuit web route (dashboard view)
    public function search(){
        // Code vanuit de index
        $currentUserID = auth()->user()->id;
        $result = PersoonMedewerkerUser::select('vnaam','anaam','tv')->where('usersid', $currentUserID)->get();
        $naam = json_decode($result);        
        // Zoekreeks vanuit form
        // gebruik hiervoor: use Illuminate\Support\Facades\Input;
        $q = Input::get('q');
        if($q != ""){
            $patienten = UserReceptPatient::whereRaw('achternaam LIKE "%' . $q . '%" AND user_id=' . $currentUserID . " COLLATE utf8_unicode_ci;")->get();
            $data = array(
                'vnaam' => PersoonMedewerkerUser::select('vnaam','anaam','tv')->where('usersid', $currentUserID)->first()->vnaam,
                'tv' => PersoonMedewerkerUser::select('vnaam','anaam','tv')->where('usersid', $currentUserID)->first()->tv,
                'anaam' => PersoonMedewerkerUser::select('vnaam','anaam','tv')->where('usersid', $currentUserID)->first()->anaam,
                'patienten' => $patienten
            );
        }else{
            $data = array(
                'vnaam' => PersoonMedewerkerUser::select('vnaam','anaam','tv')->where('usersid', $currentUserID)->first()->vnaam,
                'tv' => PersoonMedewerkerUser::select('vnaam','anaam','tv')->where('usersid', $currentUserID)->first()->tv,
                'anaam' => PersoonMedewerkerUser::select('vnaam','anaam','tv')->where('usersid', $currentUserID)->first()->anaam,
                'patienten' => ""
            );
        }
        return view('dashboard')->with($data);
    }
}
