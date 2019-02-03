<?php
use App\Admin\Controllers;
use Illuminate\Routing\Router;
use Illuminate\Http\Request;

Admin::registerAuthRoutes();
use App\Models\Jour;

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->get('/reunion', 'HomeController@reunion');
    
    Route::resource('/filiere', 'FiliereController');
    Route::resource('/emplacementtype', 'TypeEmplacementController');
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
    Route::prefix('planning')->group(function(){
        //Route::resource('/salle', 'SalleController');
        Route::resource('/cour', 'CourPlanningController');
    });
    Route::post('/api/etallage','EtalleController@add');
    Route::get('/api/jour',function(){   
        return Jour::find();
    });
});
