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


Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/cadastro', function () {
    return view('home');
});

Route::post('/user/register/', 'UsersController@register')->name('user.register');
Route::post('/startup/register/', 'StartupsController@register')->name('startup.register');

Route::get('/inscricao', 'ResponsesController@questionsList');