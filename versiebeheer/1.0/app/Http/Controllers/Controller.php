<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Hier start de gekopieerde code
    /**
     * Create a new controller instance.
     * Met de authenticatie (gekopieerd uit de dashboard controller)
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    // Hier stopt de gekopieerde code

}
