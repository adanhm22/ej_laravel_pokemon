<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\HabilidadController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('pokemon', [PokemonController::class, 'index']);
Route::get('habilidad/{id}', [HabilidadController::class, 'show']);
Route::post('newpokemon', [PokemonController::class, 'store']);
Route::delete('borrarpokemon/{id}', [PokemonController::class, 'destroy']);