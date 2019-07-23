<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', 'ContactsController@contact');

/** -------------------Project Routes---------------------- **/


Route::resource('/projects', 'ProjectsController');

// Index Page
//Route::get('/projects', 'ProjectsController@index');

// Single Project Page
//Route::get('/projects/{project_id}', 'ProjectsController@show');

// Edit Project 
//Route::get('/projects/{project_id}/edit', 'ProjectsController@edit');

// Save Project
//Route::post('/projects', 'ProjectsController@store');

// Sends you to the page with a form to create the project
//Route::get('/projects/create', 'ProjectsController@create');

//Update Project
//Route::patch('/projects/{project_id}', 'ProjectsController@update');

//Delete Project
//Route::delete('/projects/{project_id}', 'ProjectsController@destroy');