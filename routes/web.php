<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AutobusController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RutasController;
use App\Http\Controllers\UserController;
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
})->name('inicio');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [LoginController::class, 'create'])->name('register');
Route::post('/register', [LoginController::class, 'store'])->name('auth.register');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::resource('roles', RoleController::class);
    Route::resource('usuarios', UserController::class);
    Route::resource('autobuses', AutobusController::class);
    Route::resource('rutas', RutasController::class);
    Route::resource('reservas', ReservasController::class);
    Route::resource('reportes', ReporteController::class);
    Route::resource('clientes', ClienteController::class);
    Route::get('/rutas-asientos/{id}', [RutasController::class, 'showDetalle'])->name('reservas.show_detalle');
});

Route::get('/get-asientos', [ReservasController::class, 'getAsientos'])->name('reservas.get_asientos');
