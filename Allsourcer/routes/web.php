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

Auth::routes();

Route::get('/', function () {

    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/createTask','TaskController@createTask');
Route::post('/createTask','TaskController@saveTask');
Route::get('/taskclaimed/{task}/{commenter}','TaskController@claimTask');
Route::get('/taskView/{id}','TaskController@viewTask')->name('task.view');

Route::get('/comment/{taskid}','TaskController@comment');

Route::post('/comment/{task}','TaskController@saveComment');

Route::get('/profileUpdate','HomeController@profile')->name('profileUpdate');
Route::post('/profile','HomeController@update');

// // todo
// add search engine uptimization
// add sitemap 
//add a flavicon
//add a logo
Route::get('/sitemap.xml','TaskController@sitemap');//todo

//social media login
// Route::get('login/{provider}',function(){
// 	return 'hello';
// });
Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
