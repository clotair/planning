<?php
use App\Admin\Controllers;
use Illuminate\Routing\Router;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Jour;
Admin::registerAuthRoutes();


Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->get('/reunion', 'HomeController@reunion');
    
    Route::resource('/filiere', 'FiliereController');
    Route::resource('/salletype', 'TypeEmplacementController');
    Route::resource('/classe', 'ClasseController');
    Route::resource('/enseignement', 'EnseignementController');
    Route::resource('/jour', 'JourController');
    Route::resource('/frequence', 'FrequenceController');
    Route::resource('/materiel', 'MaterielController');
    Route::resource('/matiere', 'MatiereController');
    Route::resource('/grade', 'GradeController');
    Route::resource('/enseignant', 'EnseignantController');
    Route::resource('/niveau', 'NiveauController');
    Route::resource('/ue', 'UeController');
    Route::resource('/enseignementtype', 'EnseignementTypeController');
    Route::resource('/salle', 'SalleController');
    Route::resource('/evenement', 'EvenementController');
    Route::resource('/evenementtype', 'EvenementTypeController');
    Route::prefix('planning')->group(function(){
 
        Route::resource('/cour', 'CourPlanningController');
        Route::resource('/evenement', 'EvenementPlanningController');
        Route::resource('/materiel', 'MaterielPlanningController');
        
    });
    Route::prefix('api')->group(function(){
        //Route::resource('/salle', 'SalleController');
        Route::post('/cour/add','HomeController@add_cour');
        Route::post('/evenement/add','EtalleController@add_event');
        Route::post('/materiel/add','EtalleController@add_materiel');
    });
    Route::get('/api/jour',function(){   
        return Jour::find();
    });
});
