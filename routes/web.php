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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// add tester and test center officer
Route::post('/addTester', 'HomeController@addTester')->name('addTester');
Route::put('/tester/update', 'HomeController@updateTester');
Route::delete('/tester/delete', 'HomeController@destroy');

// testkit
Route::post('/testkit/add', 'TestKitController@store')->name('addTestkit');
Route::put('/testkit/update', 'TestKitController@update');
Route::delete('/testkit/delete', 'TestKitController@destroy');

//test center
Route::post('/testcenter/add', 'TestCenterController@store');
Route::put('/testcenter/update', 'TestCenterController@update');
Route::delete('/testcenter/delete', 'TestCenterController@destroy');