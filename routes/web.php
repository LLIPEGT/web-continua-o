<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\EixoController;
//use App\Http\Controllers\CursoController;

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
})->name('home');

Route::resource('/eixo', 'App\Http\Controllers\EixoController');
Route::resource('/curso', 'App\Http\Controllers\CursoController');
//Route::get('/eixo/create', 'App\Http\Controllers\EixoController@create')->name('eixo.create');
//Route::post('/eixo', 'App\Http\Controllers\EixoController@store')->name('eixo.store');*/
//Route::resource('/eixo', EixoController::class);
Route::get('/report/eixos/{eixo_id}', 'App\Http\Controllers\EixoController@report')->name('eixo.report');
Route::get('/graph/eixos', 'App\Http\Controllers\EixoController@graph')->name('eixo.graph');

//Route::resource('/curso', CursoController::class);
