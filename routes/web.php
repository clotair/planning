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
    return view('accueil');
});
Route::get('/accueil', function () {
    return view('accueil');
});

Route::prefix('salle')->group(function () {
    Route::get('', function () {

        return view('salle.liste')->with(['salles'=> DB::table('salles')->join('types_emplacements','salles.type','=','types_emplacements.id')->select('salles.id','salles.code','salles.nom','types_emplacements.nom as type')->orderBy('salles.nom', 'asc')->get()]);
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
        
        return view('classe.liste')->with(['classes'=>DB::table('classes')->join('filieres','classes.filiere','=', 'filieres.id')->join('niveaux','classes.niveau','=', 'niveaux.id')->select('classes.id','classes.code','classes.nom','niveaux.nom as niveau','filieres.nom as filiere')->orderBy('filiere', 'asc')->get()]);
    });
});
Route::prefix('enseignant')->group(function () {
    Route::get('', function () {
        
        return view('enseignant.liste')->with(['enseignants'=>DB::table('enseignants')->join('grades','enseignants.grade','=','grades.id')->select('enseignants.id','enseignants.nom as prof','grades.nom as grade')->get()]);;
    });
});