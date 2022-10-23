<?php

use App\Http\Controllers\Articulo\ArticuloController;
use App\Http\Controllers\Clase\ClaseController;
use App\Http\Controllers\Clase\ClaseFamiliaController;
use App\Http\Controllers\Departamento\DepartamentoClaseController;
use App\Http\Controllers\Departamento\DepartamentoController;
use App\Http\Controllers\Familia\FamiliaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('departamentos', DepartamentoController::class)->only(['index']);
Route::resource('departamentos.clases', DepartamentoClaseController::class)->only(['index']);
Route::resource('clases.familias', ClaseFamiliaController::class)->only(['index']);
Route::resource('articulos', ArticuloController::class)->except(['edit', 'create', 'index']);
