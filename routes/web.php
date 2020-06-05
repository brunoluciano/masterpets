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

Route::get('dashboard/cadastros', 'CadastrosController')->name('cadastros')->middleware('auth');

// CADASTROS //
// Route::prefix('dashboard/cadastros')->group(function () {
//     Route::post('especie/store', 'EspecieController@store')->name('especie.store')->middleware('auth');
// });
Route::group(['prefix' => 'dashboard/cadastros', 'middleware' => ['auth']], function () {
    Route::prefix('animal')->group(function (){
        Route::post('especie/store', 'EspecieController@store')->name('especie.store');
        Route::post('raca/store', 'RacaController@store')->name('raca.store');
        Route::post('porte/store', 'PorteController@store')->name('porte.store');
        Route::post('cor/store', 'CorController@store')->name('cor.store');
        Route::post('pelo/store', 'PeloController@store')->name('pelo.store');
    });
    Route::post('servico/store', 'ServicoController@store')->name('servico.store');
    Route::post('tiposervico/store', 'TipoServicoController@store')->name('tiposervico.store');
});

Route::group(['prefix' => 'home/cliente', 'middleware' => ['auth']], function () {
    Route::post('animal/store', 'AnimalController@store')->name('animal.store');
    // Route::post('cliente/update', 'UserController@store')->name('cliente.update');

    Route::get('findEspecies', 'AnimalController@getEspecie');
    Route::get('findRacas', 'AnimalController@getRacas');
    Route::get('findCores', 'AnimalController@getCores');
});


