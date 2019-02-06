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

Route::get('/', function () {
    flash('dsdsdsds')->warning();
    return view('accueil');
});
Route::get('/accueil', function () {
    return view('accueil');
});

Route::prefix('salle')->group(function () {
    Route::get('', function () {
       
        return view('salle.liste')->with(['salles'=>DB::table('salles')->get()]);
    });
});
Route::prefix('temps')->group(function () {
    Route::get('', function () {
       
        return view('temps.liste');
    });
});
Route::prefix('materiel')->group(function () {
    Route::get('', function () {
        
        return view('materiel.liste')->with(['materiels'=>DB::table('materiels')->get()]);
    });
});
Route::prefix('classe')->group(function () {
    Route::get('', function () {
        
        return view('classe.liste')->with(['classes'=>DB::table('classes')->get()]);
    });
});
Route::prefix('enseignant')->group(function () {
    Route::get('', function () {
        
        return view('enseignant.liste')->with(['enseignants'=>$enseignant = DB::table('enseignants')
      
        ->select('enseignants.nom', 'enseignants.id', 'grades.nom')
        ->join('grades', 'grades.id', '=', 'enseignants.grade')
        ->get()]);;
    });
});