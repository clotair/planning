<?php
use App\Admin\Controllers;
use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->get('/reunion', 'HomeController@reunion');
    $router->get('/salle', 'HomeController@cour');
    $router->get('/materiel', 'HomeController@materiel');
    Route::resource('/matiere', 'MatiereController');

});
