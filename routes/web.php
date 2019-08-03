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

// Tasks Removal Route
Route::patch('/tasks/{task}', 'ProjectTaskController@update');

// Tasks Removal Route
Route::delete('/tasks/{task}', 'ProjectTaskController@delete');

// Tasks Creation Route
Route::post('/projects/{project}/tasks', 'ProjectTaskController@store');

//Profile Route
Route::resource('/profile', 'ProfilesController')->middleware('auth');

// Project Routes
Route::resource('/projects', 'ProjectsController')->middleware('auth'); //middleware('guest') is the opposite

// Authentication Routes
Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
