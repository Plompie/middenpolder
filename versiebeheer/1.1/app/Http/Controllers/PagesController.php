<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welkom bij Middenpolder ziekenhuis';
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = 'Welkom bij de info pagina van de recepten database';
        return view('pages.about')->with('title', $title);
    }

    public function help(){
        $data = array(
            'title' => 'Help',
            'opties' => ['eventueel te vervangen', 'door gegvens uit een tabel', 'als een soort FAQ']
        );
        return view('pages.help')->with($data);
    }
}
