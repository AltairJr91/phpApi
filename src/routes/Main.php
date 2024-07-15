<?php


use App\Http\Routes;
//Routes for user
Routes::get('/users', 'UserController@index');
Routes::get('/users/{id}', 'UserController@show');
Routes::post('/create-user', 'UserController@store');
Routes::put('/edit-users/{id}', 'UserController@update');
Routes::delete('/remove-users/{id}', 'UserController@destroy');

//Routes for color
Routes::get('/colors', 'ColorController@index');
Routes::post('/create-colors', 'ColorController@store');
Routes::get('/colors/{id}', 'ColorController@show');
Routes::put('/edit-colors/{id}', 'ColorController@update');
Routes::delete('/remove-colors/{id}', 'ColorController@destroy');

//Routes to colors-users
Routes::get('/colors-users', 'ColorUserController@index');
Routes::post('/create-colors-users', 'ColorUserController@store');
Routes::get('/colors-users/{id}', 'ColorUserController@show');
Routes::put('/edit-colors-users/{id}', 'ColorUserController@update');
Routes::delete('/remove-colors-users/{id}', 'ColorUserController@destroy');


