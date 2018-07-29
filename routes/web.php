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
Route::get('/register', 'Auth\RegisterController@selecao')->name('register');
Route::get('/register/cliente', 'Auth\RegisterController@cliente')->name('register.cliente');
Route::get('/register/psicologo', 'Auth\RegisterController@psicologo')->name('register.psicologo');
