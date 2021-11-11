<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

// Route::middleware(['checkTest'])->group(function(){
 
//  Route::get('/home', 'HomeController@index');
 
//  }); 

// Route::get("check-md",["uses"=>"HomeController@checkMD","middleware"=>"checkTest"]);
// Route::get("/home",["uses"=>"HomeController@index","middleware"=>"checkTest"]);
Route::get('/home', 'HomeController@index')->middleware(['checkTest']);

Route::get('/api1', 'HomeController@api1');


Route::get("tasks", "TaskController@index");
Route::post("task", "TaskController@store");
Route::get("task/{id}/complete", "TaskController@complete");
Route::get("task/{id}/delete", "TaskController@destroy");
Route::get("task/{id}/edit", "TaskController@edit");




Route::get("/request-admin/show", "RequestController@index");
Route::post("/request-admin/create", "RequestController@store");
Route::put('/request-admin/update/{id}', 'RequestController@update');

Route::get("request-show", "SixEightController@index");
Route::post("request", "SixEightController@store");
Route::put('/request/{id}', 'SixEightController@update');
Route::post('/request/completion/{id}', 'SixEightController@completion');







Route::get("regs", "RegController@index");
Route::post("reg", "RegController@store");

// 'middleware' => 'web' (remove from RouteServiceProvider.php)
Route::group(['middleware' => ['web']], function () {
    Route::get('/hamba', function () {
	    return view('welcome');
	});
	Route::auth();
});