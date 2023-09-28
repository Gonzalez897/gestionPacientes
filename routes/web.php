<?php

use App\Http\Controllers\InicioController;
use App\Http\Controllers\LoginController;
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

Route::get('/formEmpleado', [LoginController::class, 'index']);

Route::post('/ingresoEmpleados', [LoginController::class, 'store'])->name('ingresoEmpleados');

Route::get('/', [InicioController::class,'inicio']);

Route::get('/consultas', [InicioController::class, 'consultas'])->name('consultas');

Route::get('/doctores', [InicioController::class, 'doctores'])->name('doctores');

Route::get('/citas', [InicioController::class, 'citas'])->name('citas');

Route::get('/recetas', [InicioController::class, 'recetas'])->name('recetas');

Route::get('/login', [InicioController::class, 'login'])->name('login');

Route::get('/consultaEmpleados', [InicioController::class, 'consultaEmpleados'])->name('ConsultaEmpleados');
