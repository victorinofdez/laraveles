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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::delete('admin/{id}', [\App\Http\Controllers\AdminController::class, 'destroy'])->name('destroy');


//Route::get('admin', [\App\Http\Controllers\AdminController::class, 'index'])->name('index');
//Route::get('show/{id}', [\App\Http\Controllers\AdminController::class, 'show'])->name('show');
//Route::get('admin/{id}', [\App\Http\Controllers\AdminController::class, 'edit'])->name('edit');
//Route::put('admin/{id}/edit', [AdminController::class, 'update'])->name('update');
Route::resource('admin', \App\Http\Controllers\AdminController::class);


Route::put('user/password', [\App\Http\Controllers\UserManagementController::class, 'password'])->name('user.password');
Route::put('user/update', [\App\Http\Controllers\UserManagementController::class, 'update'])->name('user.update');

Route::get('onlyroot', [\App\Http\Controllers\PruebaController::class, 'onlyroot']);
Route::get('profile', [\App\Http\Controllers\UserManagementController::class, 'profile'])->name('profile');
Route::get('root', [\App\Http\Controllers\UserManagementController::class, 'root'])->name('root');
Route::get('rutaconmiddleware', [\App\Http\Controllers\PruebaController::class, 'ruta'])->middleware('prueba');
Route::get('rcm', [\App\Http\Controllers\PruebaController::class, 'ruta']);
Route::get('rutaprotegida', [\App\Http\Controllers\PruebaController::class, 'rutaProtegida']);
Route::get('rutaprotegida2', [\App\Http\Controllers\PruebaController::class, 'rutaProtegida']);
Route::get('rutaverificado', [\App\Http\Controllers\PruebaController::class, 'rutaVerificado']);

// Route::get('user/admin', [\App\Http\Controllers\UserManagementController::class, 'admin'])->name('admin');
//Route::resource('admin', \App\Http\Controllers\AdminController::class);


/*
Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('rutaconmiddleware', [\App\Http\Controllers\PruebaController::class, 'ruta'])->middleware('prueba');

Route::get('rcm', [\App\Http\Controllers\PruebaController::class, 'ruta']);
Route::get('rutaprotegida', [\App\Http\Controllers\PruebaController::class, 'rutaProtegida']);
Route::get('rutaprotegida2', [\App\Http\Controllers\PruebaController::class, 'rutaProtegida']);
Route::get('rutaverificado', [\App\Http\Controllers\PruebaController::class, 'rutaVerificado']);
Route::get('onlyroot', [\App\Http\Controllers\PruebaController::class, 'onlyroot']);
Route::get('profile', [\App\Http\Controllers\UserManagementController::class, 'profile'])->name('profile');
Route::get('root', [\App\Http\Controllers\UserManagementController::class, 'root'])->name('root');
Route::get('/list', [\App\Http\Controllers\AdminController::class, 'index'])->name('index');
Route::get('admin/{id}', [\App\Http\Controllers\AdminController::class, 'destroy'])->name('destroy');
Route::put('user/update', [\App\Http\Controllers\UserManagementController::class, 'update'])->name('user.update');
Route::put('user/password', [\App\Http\Controllers\UserManagementController::class, 'password'])->name('user.password');
//Route::get('user/admin', [\App\Http\Controllers\UserManagementController::class, 'admin'])->name('admin');
Route::resource('admin', \App\Http\Controllers\AdminController::class);
*/