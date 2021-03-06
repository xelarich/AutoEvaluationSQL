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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
Route::get('/cours', 'CoursController@index')->name('cours');
Auth::routes();
Route::get('/coursPartie1', 'CourspiController@index')->name('courspi');
Route::get('/coursPartie2', 'CourspiiController@index')->name('courspii');
Route::get('/coursPartie3', 'CourspiiiController@index')->name('courspiii');

Auth::routes();
Route::get('/questionnaire', 'QuestionnaireController@index')->name('questionnaire');

Route::post('questionnaire', 'QuestionnaireController@requete')->name('questionnaire');

Route::post('questionnaireValidate', 'QuestionnaireController@validateNext')->name('questionnaireValidate');

Route::get('/questionnaire/{id}', 'QuestionnnaireController@lireQuestion')->name('lire_la_question');

