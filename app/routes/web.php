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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::post('/clubs', 'ClubsController@store');
Route::resource('/clubs', 'ClubsController');
Route::resource('/teams', 'TeamsController');
Route::get('/classes/groups/generate', 'GenerateGroupsController@generateAllGroups');
Route::resource('/classes', 'TournamentclassController');

Route::get('classes/{tournamentclass}/groups/generate',             'GroupsController@generate');
Route::get('classes/{tournamentclass}/groups/{group}',              'GroupsController@index');

Route::get( 'classes/{tournamentclass}/regenerate/groups/confirm',  'GenerateGroupsController@reconfirm');
Route::get( 'classes/{tournamentclass}/regenerate/groups',          'GenerateGroupsController@restart');
Route::post('classes/{tournamentclass}/regenerate/groups',          'GenerateGroupsController@regenerate');