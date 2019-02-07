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
Route::get('enseignant',function(Request $request){
    return DB::table('enseignants')->join('grades','enseignants.grade','=','grades.id')->select('enseignants.id','enseignants.nom as prof','grades.nom as grade')->get();
});
Route::get('matiere',function(Request $request){
    return DB::table('ues')->join('matieres','ues.matiere','=','matieres.id')->select('ues.id','ues.code','ues.intituler','matieres.nom as matiere')->get();
});
Route::get('classe',function(Request $request){
    return DB::table('classes')->join('filieres','classes.filiere','=', 'filieres.id')->join('niveaux','classes.niveau','=', 'niveaux.id')->select('classes.id','classes.code','classes.nom','niveaux.nom as niveau','filieres.nom as filiere')->get();
});
Route::get('salle/{id}',function(Request $request){
    return DB::table('salles')->join('types_emplacements','salles.type','=','types_emplacements.id')->select('salles.id','salles.code','salles.nom','types_emplacements.nom as type')->where('salles.id','=',$request->id)->get();
});
Route::get('enseignant/{id}',function(Request $request){
    return DB::table('enseignants')->join('grades','enseignants.grade','=','grades.id')->select('enseignants.id','enseignants.nom as prof','grades.nom as grade')->where('enseignants.id','=',$request->id)->get();
});
Route::get('matiere/{id}',function(Request $request){
    return DB::table('ues')->join('matieres','ues.matiere','=','matieres.id')->select('ues.id','ues.code','ues.intituler','matieres.nom as matiere')->where('matieres.id','=',$request->id)->get();
});
Route::get('classe/{id}',function(Request $request){
    return DB::table('classes')->join('filieres','classes.filiere','=', 'filieres.id')->join('niveaux','classes.niveau','=', 'niveaux.id')->select('classes.id','classes.code','classes.nom','niveaux.nom as niveau','filieres.nom as filiere')->where('classes.id','=',$request->id)->get();
});
Route::get('salle/{id}',function(Request $request){
    return DB::table('salles')->join('types_emplacements','salles.type','=','types_emplacements.id')->select('salles.id','salles.code','salles.nom','types_emplacements.nom as type')->where('salles.id','=',$request->id)->get();
});
Route::get('salle/planning/{id}',function(Request $request){
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
    foreach($pro as $key=>$val){
        foreach($cours as $cour){
            if($cour->date_debut<=$key && $cour->date_fin>=$key){
                array_push($pro[$key],[
                                        'heure_debut'=>$cour->heure_debut,
                                        'heure_fin'=>$cour->heure_fin,
                                        'type'=>'cour',
                                        'description'=>[
                                            'enseignant'=>DB::table('enseignants')->join('grades','enseignants.grade','=','grades.id')->select('enseignants.id','enseignants.nom as prof','grades.nom as grade')->where('enseignants.id','=',$cour->enseignant)->get(),
                                            'matiere'=>DB::table('ues')->join('matieres','ues.matiere','=','matieres.id')->select('ues.id','ues.code','ues.intituler','matieres.nom as matiere')->where('ues.id','=',$cour->matiere)->get(),
                                            'classe'=>DB::table('classes')->join('filieres','classes.filiere','=', 'filieres.id')->join('niveaux','classes.niveau','=', 'niveaux.id')->select('classes.id','classes.code','classes.nom','niveaux.nom as niveau','filieres.nom as filiere')->where('classes.id','=',$cour->classe)->get(),
                                            'salle'=>DB::table('salles')->join('types_emplacements','salles.type','=','types_emplacements.id')->select('salles.id','salles.code','salles.nom','types_emplacements.nom as type')->where('salles.id','=',$cour->salle)->get()
                                            ]
                                    ]
                            );
            }
        }
        foreach($events as $event){
            if($event->date_debut<=$key && $event->date_fin>=$key){
                array_push($pro[$key],[
                                        'heure_debut'=>$event->heure_debut,
                                        'heure_fin'=>$event->heure_fin,
                                        'type'=>'event',
                                        'description'=>[
                                            'evenement'=>DB::table('evenements')->join('evenement_type','evenements.type','=', 'evenement_type.id')->select('evenements.id','evenements.description','evenement_type.nom as type')->where('evenements.id','=',$event->evenement)->get(),
                                            'salle'=>DB::table('salles')->join('types_emplacements','salles.type','=','types_emplacements.id')->select('salles.id','salles.code','salles.nom','types_emplacements.nom as type')->where('salles.id','=',$event->salle)->get()
                                            ]
                                    ]
                            );
            }
        }
    }
    return $pro;
});
Route::get('classe/planning/{id}',function(Request $request){
    $cours = DB::table('planning_cours')->where('classe','=',$request->id)->get();
    $min_date = date('Y-m-d');
    $max_date = date('Y-m-d');
    foreach($cours as $cour){
        if($cour->date_fin > $max_date ){
            $max_date = $cour->date_fin;
        }
        if($cour->date_fin<$min_date){
            $min_date = $cour->date_fin;
        }
        
    };
    $date = $min_date;
    $i = 0;
    $pro = [];
    while($date <= $max_date){
        $pro[$date] = [];
        $date=strftime("%Y-%m-%d", strtotime("$date +1 day"));
    }
    foreach($pro as $key=>$val){
        foreach($cours as $cour){
            if($cour->date_debut<=$key && $cour->date_fin>=$key){
                array_push($pro[$key],[
                                        'heure_debut'=>$cour->heure_debut,
                                        'heure_fin'=>$cour->heure_fin,
                                        'type'=>'cour',
                                        'description'=>[
                                            'enseignant'=>DB::table('enseignants')->join('grades','enseignants.grade','=','grades.id')->select('enseignants.id','enseignants.nom as prof','grades.nom as grade')->where('enseignants.id','=',$cour->enseignant)->get(),
                                            'matiere'=>DB::table('ues')->join('matieres','ues.matiere','=','matieres.id')->select('ues.id','ues.code','ues.intituler','matieres.nom as matiere')->where('ues.id','=',$cour->matiere)->get(),
                                            'classe'=>DB::table('classes')->join('filieres','classes.filiere','=', 'filieres.id')->join('niveaux','classes.niveau','=', 'niveaux.id')->select('classes.id','classes.code','classes.nom','niveaux.nom as niveau','filieres.nom as filiere')->where('classes.id','=',$cour->classe)->get(),
                                            'salle'=>DB::table('salles')->join('types_emplacements','salles.type','=','types_emplacements.id')->select('salles.id','salles.code','salles.nom','types_emplacements.nom as type')->where('salles.id','=',$cour->salle)->get()
                                            ]
                                    ]
                            );
            }
        }
    }
    return $pro;
});
Route::get('enseignant/planning/{id}',function(Request $request){
    $cours = DB::table('planning_cours')->where('enseignant','=',$request->id)->get();
    $min_date = date('Y-m-d');
    $max_date = date('Y-m-d');
    foreach($cours as $cour){
        if($cour->date_fin > $max_date ){
            $max_date = $cour->date_fin;
        }
        if($cour->date_fin<$min_date){
            $min_date = $cour->date_fin;
        }
        
    };
    $date = $min_date;
    $i = 0;
    $pro = [];
    while($date <= $max_date){
        $pro[$date] = [];
        $date=strftime("%Y-%m-%d", strtotime("$date +1 day"));
    }
    foreach($pro as $key=>$val){
        foreach($cours as $cour){
            if($cour->date_debut<=$key && $cour->date_fin>=$key){
                array_push($pro[$key],[
                                        'heure_debut'=>$cour->heure_debut,
                                        'heure_fin'=>$cour->heure_fin,
                                        'type'=>'cour',
                                        'description'=>[
                                            'enseignant'=>DB::table('enseignants')->join('grades','enseignants.grade','=','grades.id')->select('enseignants.id','enseignants.nom as prof','grades.nom as grade')->where('enseignants.id','=',$cour->enseignant)->get(),
                                            'matiere'=>DB::table('ues')->join('matieres','ues.matiere','=','matieres.id')->select('ues.id','ues.code','ues.intituler','matieres.nom as matiere')->where('ues.id','=',$cour->matiere)->get(),
                                            'classe'=>DB::table('classes')->join('filieres','classes.filiere','=', 'filieres.id')->join('niveaux','classes.niveau','=', 'niveaux.id')->select('classes.id','classes.code','classes.nom','niveaux.nom as niveau','filieres.nom as filiere')->where('classes.id','=',$cour->classe)->get(),
                                            'salle'=>DB::table('salles')->join('types_emplacements','salles.type','=','types_emplacements.id')->select('salles.id','salles.code','salles.nom','types_emplacements.nom as type')->where('salles.id','=',$cour->salle)->get()
                                            ]
                                    ]
                            );
            }
        }
    }
    return $pro;
});
Route::get('evenement/planning/{id}',function(Request $request){

    $events = DB::table('planning_evenements')->where('evenement','=',$request->id)->get();
    $min_date = date('Y-m-d');
    $max_date = date('Y-m-d');
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
    foreach($pro as $key=>$val){
        foreach($events as $event){
            if($event->date_debut<=$key && $event->date_fin>=$key){
                array_push($pro[$key],[
                                        'heure_debut'=>$event->heure_debut,
                                        'heure_fin'=>$event->heure_fin,
                                        'type'=>'event',
                                        'description'=>[
                                            'evenement'=>DB::table('evenements')->join('evenement_type','evenements.type','=', 'evenement_type.id')->select('evenements.id','evenements.description','evenement_type.nom as type')->where('evenements.id','=',$event->evenement)->get(),
                                            'salle'=>DB::table('salles')->join('types_emplacements','salles.type','=','types_emplacements.id')->select('salles.id','salles.code','salles.nom','types_emplacements.nom as type')->where('salles.id','=',$event->salle)->get()
                                            ]
                                    ]
                            );
            }
        }
    }
    return $pro;
});
Route::get('materiel/planning/{id}',function(Request $request){
    $salle = DB::table('planning_materiels')->where('materiel','=',$request->id)->get();
    return DB::table('planning_materiels')->where('materiel','=',$request->id)->get();
});