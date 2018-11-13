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
Route::group(['middleware' =>'auth'], function(){
    Route::get('/home', 'HomeController@index');
    Route::get('/projects', 'ProjectsController@index');
    Route::get('/projects/new/form', 'ProjectsController@newProjectForm');
    Route::post('/projects/new', 'ProjectsController@newProject');
    Route::get('/project/{id}/settings', 'ProjectsController@settings');
    Route::get('/project/{id}/board', 'ProjectsController@board');
    Route::get('/project/{id}/analytics', 'AnalyticsController@index');
    Route::delete('/projects/{id}', 'ProjectsController@delete');

   // Route::resource('/issues', 'IssuesController');
    Route::get('/issues/approve', 'IssuesController@listToBeApprove');
    Route::post('/issues/new', 'IssuesController@store');
    Route::get('/issues/{id}', 'IssuesController@show');
    Route::delete('/issues/{id}', 'IssuesController@delete');
    Route::post('/issues/{id}', 'IssuesController@update');
    Route::post('/issues/{id}/approve', 'IssuesController@approve');
    Route::post('/issues/{id}/return', 'IssuesController@return');
    Route::post('/issues/{id}/rate', 'IssuesController@rate');
    Route::get('/issue/statuses', function(){
        return response(\App\Models\IssueStatus::all(), 200);
    });

    Route::get('/', 'ProjectsController@index');
    Route::get('/users', 'UsersController@index');
    Route::get('/users/new/form', 'UsersController@newUserForm');
    Route::post('/users/new', 'UsersController@newUser');
});
Route::get('/users/{email}/finish_registration', 'UsersController@showFinishRegistrationForm');
Route::post('/users/{email}/finish_registration', 'UsersController@finishRegistration');