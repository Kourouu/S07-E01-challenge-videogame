<?php

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

$router->get('/admin', [
    'uses' => 'MainController@admin', // définit la méthode et le controller
    'as' => 'admin' // définit le nom de cette route
]);

$router->get('/', [
    'uses' => 'MainController@homeAction', // définit la méthode et le controller
    'as' => 'home' // définit le nom de cette route
]);