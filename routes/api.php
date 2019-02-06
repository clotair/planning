<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('salle/{id}',function(Request $request){
    $cours = DB::table('planning_cours')->where('salle','=',$request->id)->get();
    $events = DB::table('planning_evenements')->where('evenement','=',$request->id)->get();
    $min_date = date('Y-m-d');
    $max_date = date('Y-m-d');
    foreach($cours as $cour){
        if($cour->date_fin > $max_date ){
            $max_date = $cour->date_fin;
        }
        if($cour->date_fin<$min_date){
            $min_date = $cour->date_fin;
        }
        
    }
    foreach($events as $event){
        if($event->date_debut > $max_date ){
            $max_date = $event->date_debut;
        }
        if($event->date_debut<$min_date){
            $min_date = $event->date_debut;
        }
        
    }
    $date = $min_date;
    $i = 0;
    $pro = [];
    while($date <= $max_date){
        $pro[$date] = [];
        $date=strftime("%Y-%m-%d", strtotime("$date +1 day"));
    }
  
    return $pro;
});
Route::get('classe/{id}',function(Request $request){
    $salle = DB::table('planning_cours')->where('classe','=',$request->id)->get();
    return DB::table('planning_cours')->where('classe','=',$request->id)->get();
});
Route::get('enseignant/{id}',function(Request $request){
    $salle = DB::table('planning_cours')->where('enseignant','=',$request->id)->get();
    return DB::table('planning_cours')->where('enseignant','=',$request->id)->get();
});
Route::get('evenement/{id}',function(Request $request){
    $salle = DB::table('planning_evenements')->where('evenement','=',$request->id)->get();
    return DB::table('planning_evenements')->where('evenement','=',$request->id)->get();
});
Route::get('materiel/{id}',function(Request $request){
    $salle = DB::table('planning_materiels')->where('materiel','=',$request->id)->get();
    return DB::table('planning_materiels')->where('materiel','=',$request->id)->get();
});