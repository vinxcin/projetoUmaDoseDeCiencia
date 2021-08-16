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
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ArtigoController;

Route::get('/', [EventoController::class, 'index']);
Route::get('/', [ArtigoController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/events/create', [EventoController::class, 'create']);

Route::get('/events/show/', [EventoController::class, 'show']); 

Route::post('/events', [EventoController::class, 'store']);

Route::get('/dashboard_Eventos', [EventoController::class, 'dashboard'])->middleware('auth');

Route::delete('/events/{id}', [EventoController::class, 'destroy'])->middleware('auth');

Route::get('/events/edit/{id}', [EventoController::class, 'edit']);

Route::put('/events/update/{id}', [EventoController::class, 'update'])->middleware('auth');

//------------------------------- ARTIGOS

Route::get('/artigos/create', [ArtigoController::class, 'create']);

Route::get('/artigos/show/' , [ArtigoController::class, 'show']); 

Route::post('/artigos', [ArtigoController::class, 'store']);

Route::get('/dashboard_Artigos', [ArtigoController::class, 'dashboard'])->middleware('auth');

Route::delete('/artigos/{id}', [ArtigoController::class, 'destroy'])->middleware('auth');

Route::get('/artigos/edit/{id}', [ArtigoController::class, 'edit']);

Route::put('/artigos/update/{id}', [ArtigoController::class, 'update'])->middleware('auth');

