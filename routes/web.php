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
});

Route::get('/concluido', function () {
    return view('concluido');
})->name('concluido');

Route::get('/login', function () {
    return view('login');
})->name('user.login.view');


Route::post('/user/register/', 'UsersController@actionRegister')->name('user.register');
Route::post('/user/login/', 'UsersController@actionLogin')->name('user.login');

Route::get('/response/register/', 'ResponsesController@actionRegister')->name('response.register');
Route::get('/response/option/new/', 'ResponsesController@newOption')->name('response.new.option');

Route::post('/startup/register/', 'StartupsController@actionRegister')->name('startup.register');
Route::get('/startup/update/{startup_id?}/{state?}/{city?}/{category?}/', 'StartupsController@actionUpdate')->name('startup.update');
Route::get('/startup/{startup_id}/registro/', 'StartupsController@viewRegister')->name('startup.register.view');

