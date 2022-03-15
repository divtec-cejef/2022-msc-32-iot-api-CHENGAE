<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});
// Création du groupr api : http://localhost:8000/api/
$router->group(['prefix' => 'api'], function () use ($router) {

    // Tous les devices
    $router->get('devices',  ['uses' => 'ThermometreController@showAllDevices']);

    // Détail d'un device
    $router->get('devices/{id}', ['uses' => 'ThermometreController@showOneDevice']);

    // Toutes les mesures d'un device
    $router->get('devices/{id}/measures', ['uses' => 'ThermometreController@showAllMeasuresPerDevice']);

    // Toutes les mesures
    $router->get('measures', ['uses' => 'ThermometreController@showAllMeasures']);

    // Toutes les salles
    $router->get('rooms', ['uses' => 'ThermometreController@showAllRooms']);

    // Ajout d'une mesure
    $router->post('devices/{identifier}/measures', ['uses' => 'ThermometreController@create']);

    // Modification d'une mesure
    $router->put('measures/{id}', ['uses' => 'ThermometreController@update']);

    // Suppression d'une mesure
    $router->delete('measures/{id}', ['uses' => 'ThermometreController@delete']);
});
