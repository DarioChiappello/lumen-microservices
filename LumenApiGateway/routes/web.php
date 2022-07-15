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

$router->group(['middleware' => 'client.credentials'], function () use ($router) {
    $router->get('/authors', 'AuthorsController@index');
    $router->post('/authors', 'AuthorsController@store');
    $router->get('/authors/{author}', 'AuthorsController@show');
    $router->put('/authors/{author}', 'AuthorsController@update');
    $router->patch('/authors/{author}', 'AuthorsController@update');
    $router->delete('/authors/{author}', 'AuthorsController@destroy');

    $router->get('/books', 'BookController@index');
    $router->post('/books', 'BookController@store');
    $router->get('/books/{book}', 'BookController@show');
    $router->put('/books/{book}', 'BookController@update');
    $router->patch('/books/{book}', 'BookController@update');
    $router->delete('/books/{book}', 'BookController@destroy');

    $router->get('/users', 'UserController@index');
    $router->post('/users', 'UserController@store');
    $router->get('/users/{user}', 'UserController@show');
    $router->put('/users/{user}', 'UserController@update');
    $router->patch('/users/{user}', 'UserController@update');
    $router->delete('/users/{user}', 'UserController@destroy');

    // API
    // Authors
    $router->get('/api/authors', 'AuthorsController@index');
    $router->post('/api/authors', 'AuthorsController@store');
    $router->get('/api/authors/{author}', 'AuthorsController@show');
    $router->put('/api/authors/{author}', 'AuthorsController@update');
    $router->patch('/api/authors/{author}', 'AuthorsController@update');
    $router->delete('/api/authors/{author}', 'AuthorsController@destroy');
    // Books
    $router->get('/api/books', 'BookController@index');
    $router->post('/api/books', 'BookController@store');
    $router->get('/api/books/{book}', 'BookController@show');
    $router->put('/api/books/{book}', 'BookController@update');
    $router->patch('/api/books/{book}', 'BookController@update');
    $router->delete('/api/books/{book}', 'BookController@destroy');
    // Users
    $router->get('/api/users', 'UserController@index');
    $router->post('/api/users', 'UserController@store');
    $router->get('/api/users/{user}', 'UserController@show');
    $router->put('/api/users/{user}', 'UserController@update');
    $router->patch('/api/users/{user}', 'UserController@update');
    $router->delete('/api/users/{user}', 'UserController@destroy');

});



/**
 * User credentials protected routes.
 */
$router->group(['middleware' => 'auth:api'], function () use ($router) {
    $router->get('/users/me', 'UserController@me');
    
    // API
    // Users
    $router->get('/api/users/me', 'UserController@me');
    
    
});
