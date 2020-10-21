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



Route::redirect('/', '/cadastro');
Route::get('/cadastro', function () {
    return view('home');
})->name('home');

Route::get('/concluido', function () {
    return view('concluido');
})->name('concluido');

Route::get('/login', function () {
    return view('login');
})->name('user.login.view');

Route::post('/user/register/', 'UsersController@actionRegister')->name('user.register');
Route::post('/user/login/', 'UsersController@actionLogin')->name('user.login');
Route::post('/user/add/', 'UsersController@actionAdd')->name('user.add');
Route::post('/user/{user_id}/edit/', 'UsersController@actionEdit')->name('user.edit');
Route::get('/user/logout/', 'UsersController@actionLogout')->name('user.logout');
Route::get('/usuarios', 'UsersController@listUsers')->name('user.list');
Route::get('/usuarios/registro', 'UsersController@viewAdd')->name('user.add.view');
Route::get('/usuarios/{user_id}/editar', 'UsersController@viewEdit')->name('user.edit.view');
Route::get('/painel-usuario', 'UsersController@viewPainel')->name('user.painel');

Route::get('/response/register/', 'ResponsesController@actionRegister')->name('response.register');
Route::get('/response/option/new/', 'ResponsesController@newOption')->name('response.new.option');

Route::post('/startup/register/', 'StartupsController@actionRegister')->name('startup.register');
Route::get('/startup/update/{startup_id?}/{state?}/{city?}/{category?}/', 'StartupsController@actionUpdate')->name('startup.update');
Route::get('/projeto/{startup_id}/registro/', 'StartupsController@viewRegister')->name('startup.register.view');
Route::get('/projeto/{startup_id}/', 'StartupsController@viewStartup')->name('startup.view');

Route::get('/painel', 'StartupsController@viewPainel')->name('painel');
Route::get('/projetos', 'StartupsController@listStartups')->name('startup.list');

Route::post('/startup/rating/', 'RatingController@actionRating')->name('startup.rating');
Route::get('/projeto/{startup_id}/avaliacao/', 'RatingController@viewRatingAction')->name('startup.rating.view.action');
Route::get('/projeto/{startup_id}/avaliacao/{user_id}/', 'RatingController@viewRating')->name('startup.rating.view');
Route::get('/avaliacoes', 'RatingController@listRating')->name('rating.list');
Route::get('/startup/{startup_id}/aprov/', 'RatingController@actionAprov')->name('startup.aprov');

