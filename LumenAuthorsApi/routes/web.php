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

$router->get('/authors', 'AuthorsController@index');
$router->post('/authors', 'AuthorsController@store');
$router->get('/authors/{author}', 'AuthorsController@show');
$router->put('/authors/{author}', 'AuthorsController@update');
$router->patch('/authors/{author}', 'AuthorsController@update');
$router->delete('/authors/{author}', 'AuthorsController@destroy');

// API
$router->get('/api/authors', 'AuthorsController@index');
$router->post('/api/authors', 'AuthorsController@store');
$router->get('/api/authors/{author}', 'AuthorsController@show');
$router->put('/api/authors/{author}', 'AuthorsController@update');
$router->patch('/api/authors/{author}', 'AuthorsController@update');
$router->delete('/api/authors/{author}', 'AuthorsController@destroy');
