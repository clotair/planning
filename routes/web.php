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
       
        return view('salle.liste');
    });
});
Route::prefix('materiel')->group(function () {
    Route::get('', function () {
        
        return view('materiel.liste');
    });
});
Route::prefix('enseignant')->group(function () {
    Route::get('', function () {
        
        return view('enseignant.liste');
    });
});