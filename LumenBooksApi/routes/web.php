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


$router->get('/books', 'BookController@index');
$router->post('/books', 'BookController@store');
$router->get('/books/{book}', 'BookController@show');
$router->put('/books/{book}', 'BookController@update');
$router->patch('/books/{book}', 'BookController@update');
$router->delete('/books/{book}', 'BookController@destroy');

// API
$router->get('/api/books', 'BookController@index');
$router->post('/api/books', 'BookController@store');
$router->get('/api/books/{book}', 'BookController@show');
$router->put('/api/books/{book}', 'BookController@update');
$router->patch('/api/books/{book}', 'BookController@update');
$router->delete('/api/books/{book}', 'BookController@destroy');
