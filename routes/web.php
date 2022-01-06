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

Route::get('/', 'TacheController@index');
Route::post('/tache', 'TacheController@ajouter');
Route::delete('/tache/{tache}', 'TacheController@supprimer');
Route::put('/tache/{tache}', 'TacheController@valider');
Route::put('/tache/{tache}/edit', 'TacheController@modifier');