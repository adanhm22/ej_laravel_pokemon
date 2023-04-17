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

//pokemones
Route::get('pokemon/{id}', [PokemonController::class, 'show']);
Route::get('pokemons', [PokemonController::class, 'index']);
Route::post('newpokemons', [PokemonController::class, 'store']);
Route::delete('borrarpokemon/{id}', [PokemonController::class, 'destroy']);

//habilidades
Route::get('habilidad/{id}', [HabilidadController::class, 'show']);
Route::get('habilidades', [HabilidadController::class, 'index']);
Route::post('newhabilidades', [HabilidadController::class, 'store']);
Route::delete('borrarhabilidad/{id}', [HabilidadController::class, 'destroy']);