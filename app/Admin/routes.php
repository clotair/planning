<?php
use App\Admin\Controllers;
use Illuminate\Routing\Router;

Admin::registerAuthRoutes();
use App\Models\Jour;

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->get('/reunion', 'HomeController@reunion');
    $router->get('/salle', 'HomeController@cour');
    Route::resource('/filiere', 'FiliereController');
    Route::resource('/typeemplacement', 'TypeEmplacementController');
    Route::resource('/classe', 'ClasseController');
    Route::resource('/enseignement', 'EnseignementController');
    Route::resource('/jour', 'JourController');
    Route::resource('/frequence', 'FrequenceController');
    Route::resource('/materiel', 'MaterielController');
    Route::resource('/matiere', 'MatiereController');
    Route::resource('/grade', 'GradeController');
    Route::get('/api/jour',function(){   
        return Jour::find();
    });
});
