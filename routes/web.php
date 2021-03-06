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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/lang/{language}', function($language) {
    App::setLocale($language);
});

Route::get('/olympiads/{olympiad}/select/', 'OlympiadController@select')->name('olympiads.select');
Route::resource('/olympiads', 'OlympiadController');

Route::post('/students/import', 'StudentController@import')->name('students.import');
Route::resource('/students', 'StudentController');

Route::post('/schools/import', 'SchoolController@import')->name('schools.import');
Route::resource('/schools', 'SchoolController');

Route::post('/rooms/import', 'RoomController@import')->name('rooms.import');
Route::resource('/rooms', 'RoomController');

Route::post('/participants/import', 'ParticipantController@import')->name('participants.import');
Route::post('/participants/search', 'ParticipantController@search')->name('participants.search');
Route::post('/participants/assign/{student}', 'ParticipantController@assignRoom')->name('participants.assign');
Route::resource('/participants', 'ParticipantController');

Route::resource('/users', 'UserController');