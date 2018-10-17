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

/*Route::get('/', function () {
    echo "hello123";
   // return view('welcome');
});


//Autentificate routes
Auth::routes();


//Tasks routes
Route::get('/tasks','TasksController@getTasks');//->middleware('auth');


//Home routes

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/login', 'Auth\LoginController@index');
Route::post('/login', 'Auth\LoginController@login');
//Auth::routes();
*/
/*Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/login', 'Auth\LoginController@index');
Route::post('/login', 'Auth\LoginController@login');*/
Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/projects', 'ProjectsController@index');
Route::get('/projects/new/form', 'ProjectsController@newProjectForm');
Route::post('/projects/new', 'ProjectsController@newProject');