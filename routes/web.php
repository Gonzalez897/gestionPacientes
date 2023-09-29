<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InicioController;

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

// CITAS RUTAS SIN CRUD
Route::get('/citasCreate', [InicioController::class, 'citasCreate'])->name('citas');
Route::get('/citasShow', [InicioController::class, 'citasShow'])->name('citas');
Route::get('/citasUpdate', [InicioController::class, 'citasUpdate'])->name('citas');

// CITAS RUTAS CON CRUD
Route::get('/vistas/Citas/citasShow', [CitasController::class,'index']);
Route::get('/vistas/Citas/citasCreate', [CitasController::class,'create']);
Route::post('/vistas/Citas/citasStore', [CitasController::class,'store']);
// Route::get('/tareas/edit/{tareas}', [TareaController::class,'edit']);
// Route::put('/tareas/update/{tareas}', [TareaController::class,'update']);
// Route::delete('/tareas/destroy/{tareas}',[TareaController::class, 'destroy']);



Route::get('/recetas', [InicioController::class, 'recetas'])->name('recetas');

Route::get('/Pacientes', [InicioController::class, 'Pacientes'])->name('Pacientes');

Route::get('/login', [InicioController::class, 'login'])->name('login');

Route::get('/consultaEmpleados', [InicioController::class, 'consultaEmpleados'])->name('ConsultaEmpleados');
