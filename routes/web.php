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
    return view('index');
})->name('index');

Route::view('cadastrar', 'website.cadastrar');
Route::view('produtos', 'website.produtos');
Route::view('sobre', 'website.sobre');
Route::view('contato', 'website.contato');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('home/cliente', 'ClienteHomeController@index')->name('cliente')->middleware('auth');
Route::get('dashboard', 'PrincipalHomeController@index')->name('dashboard')->middleware('auth');
// Route::resource('home', 'PrincipalHomeController');
