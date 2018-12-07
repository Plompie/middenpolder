<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Om controller te gebruiken
1. Controller aanmaken in cmd
php artisan make:controller PagesController
2. Hierna kun je controller vullen met functie:
bijv:
public function index(){
    return 'INDEX';
}
of we gebruiken een view
public function index(){
    return view('pages.index');
}
(view wel aanmaken)
3. Gebruik controller hier:

Route::get('/', function () {
    return view('welcome');
});
Vervangen door controller:
Route::get('/', PagesController@index);
*/


// Route::get('/', 'PagesController@index');
Route::get('/', 'DashboardController@index');
Route::get('/about', 'PagesController@about');
Route::get('/help', 'PagesController@help');

Route::resource('medewerkers','MedewerkersController');
Route::resource('medicijnen','MedicijnenController');
Route::resource('recepten','ReceptenController');
Route::resource('patienten','PatientenController');
Route::resource('persons','PersonenController');
Route::resource('persoonMedewerkers', 'PersoonMedewerkersController');
Route::resource('afdelingen','AfdelingenController');

// restful api
// Route::post
// Route::delete
/*
voorbeeld met parameters
Route::get('/users/{id}/{name}', function ($id, $name) {
        return 'this is user '.$name. ' with an id of '.$id;
});
gebruiken als:
localhost/users/3/jan
*/

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
// Zoek route vanuit dashboard
Route::post('/search', 'DashboardController@search');
