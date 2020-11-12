<?php

use Illuminate\Support\Facades\Route;

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



Route::redirect('/', '/login');
Route::get('/cadastro', function () {
    return view('home');
})->name('home');
Route::get('/files', function () {
    return true;
})->name('files');

Route::get('/email', function () {
    return view('emails/emailresposta');
})->name('email');

Route::get('/concluido', function () {
    return view('concluido');
})->name('concluido');

Route::get('/login', function () {
    return view('login');
})->name('user.login.view');

//ACTION ROUTES USER
Route::post('/user/register/', 'UsersController@actionRegister')->name('user.register');
Route::post('/user/login/', 'UsersController@actionLogin')->name('user.login');
Route::post('/user/add/', 'UsersController@actionAdd')->name('user.add');
Route::post('/user/{user_id}/edit/', 'UsersController@actionEdit')->name('user.edit');
Route::get('/user/logout/', 'UsersController@actionLogout')->name('user.logout');

//VIEW ROUTES USER
Route::get('/usuarios', 'UsersController@actionList')->name('user.list');
Route::get('/usuarios/registro', 'UsersController@viewAdd')->name('user.add.view');
Route::get('/usuarios/{user_id}/editar', 'UsersController@viewEdit')->name('user.edit.view');
Route::get('/painel-usuario', 'UsersController@viewPainel')->name('user.painel.view');
Route::get('/painel-usuario/atratividade', 'UsersController@viewAttractive')->name('user.attractive.view');


//ACTION ROUTES REPONSES
Route::get('/response/register/', 'ResponsesController@actionRegister')->name('response.register');
Route::post('/response/register/attractive', 'ResponsesController@actionRegisterAttractive')->name('response.register.attractive');
Route::match(['GET', 'POST'],'/response/register/attractive/dinamic', 'ResponsesController@saveDinamicResponse')->name('response.register.attractive.dinamic');
Route::get('/response/option/new/', 'ResponsesController@newOption')->name('response.new.option');
Route::get('/atratividade/{startup_id}', 'ResponsesController@viewAttractiveResponses')->name('attractive.response.view');


//ACTION ROUTES STARTUPS
Route::post('/startup/register/', 'StartupsController@actionRegister')->name('startup.register');
Route::get('/startup/update/{startup_id?}/{state?}/{city?}/{category?}/', 'StartupsController@actionUpdate')->name('startup.update');
Route::get('/startup/csv/', 'StartupsController@gerCsvStartups')->name('startup.csv');
Route::get('/startup/remove-participant/{participant_id?}/', 'StartupsController@removeParticipant')->name('remove.participant');

//VIEW ROUTES STARTUPS
Route::get('/projeto/{startup_id}/registro/', 'StartupsController@viewRegister')->name('startup.register.view');
Route::get('/projeto/{startup_id}/', 'StartupsController@viewStartup')->name('startup.view');
Route::get('/painel', 'StartupsController@viewPainel')->name('painel');
Route::get('/projetos', 'StartupsController@listStartups')->name('startup.list');


//ACTION ROUTES RATING
Route::post('/startup/rating/', 'RatingController@actionRating')->name('startup.rating');
Route::post('/startup/rating/attractive', 'RatingController@actionRatingAttractive')->name('startup.rating.attractive');
Route::get('/startup/{startup_id}/aprov/', 'RatingController@actionAprov')->name('startup.aprov');
Route::get('/startup/{startup_id}/reprov/', 'RatingController@actionReprov')->name('startup.reprov');

//VIEW ROUTES RATING
Route::get('/projeto/{startup_id}/avaliacao/', 'RatingController@viewRatingAction')->name('startup.rating.view.action');
Route::get('/projeto/{startup_id}/avaliacao-atratividade/', 'RatingController@viewRatingAttractive')->name('startup.rating.attractive.view');
Route::get('/projeto/{startup_id}/avaliacao/{user_id}/', 'RatingController@viewRating')->name('startup.rating.view');
Route::get('/projeto/{startup_id}/avaliacao/{user_id}/atratividade', 'RatingController@viewgAttractiveRatin')->name('attractive.rating.view');
Route::get('/avaliacoes', 'RatingController@listRating')->name('rating.list');

