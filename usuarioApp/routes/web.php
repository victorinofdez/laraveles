<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PruebaController;
use App\Http\Middleware\PruebaMiddleware;

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
Route::get('rutaconmiddleware', [App\Http\Controllers\PruebaController::class, 'ruta'])->middleware('prueba');
Route::get('rcm', [App\Http\Controllers\PruebaController::class, 'rutaProtegida']);
Route::get('onlyroot', [App\Http\Controllers\PruebaController::class, 'onlyroot']);

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
