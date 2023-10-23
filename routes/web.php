<?php

//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PacientesController;

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


Route::get('/formEmpleado', [LoginController::class, 'create']);

Route::post('/ingresoEmpleados', [LoginController::class, 'store'])->name('ingresoEmpleados');

Route::get('/empleado/edit/{empleado}', [LoginController::class, 'empleadosEdit'])->middleware('auth');

Route::put('/empleado/update/{empleado}', [LoginController::class, 'update'])->name('actualizarEmpleado')->middleware('auth');

Route::get('/', [InicioController::class,'inicio'])->middleware('auth');

Route::get('/consultas', [InicioController::class, 'consultas'])->name('consultas')->middleware('auth');

Route::get('/doctores', [InicioController::class, 'doctores'])->name('doctores')->middleware('auth');

// CITAS RUTAS CON CRUD
Route::get('/vistas/Citas/citasShow', [CitasController::class,'index'])->middleware('auth');
Route::get('/vistas/Citas/citasCreate', [CitasController::class,'create'])->middleware('auth');
Route::post('/vistas/Citas/citasStore', [CitasController::class,'store'])->middleware('auth');
Route::get('/vistas/Citas/citasEdit/{citas}', [CitasController::class,'edit'])->middleware('auth');
Route::put('/vistas/Citas/citasUpdate/{citas}', [CitasController::class,'update'])->middleware('auth');
Route::delete('/vistas/Citas/citasDestroy/{citas}',[CitasController::class, 'destroy'])->middleware('auth');



Route::get('/recetas', [InicioController::class, 'recetas'])->name('recetas')->middleware('auth');

// Pacientes CRUD
Route::get('/vistas/Pacientes/pacientesShow', [PacientesController::class,'index'])->middleware('auth');
Route::get('/vistas/Pacientes/pacientesCreate', [PacientesController::class,'create'])->middleware('auth');
Route::post('/vistas/Pacientes/pacientesStore', [PacientesController::class,'store'])->middleware('auth');
Route::get('/vistas/Pacientes/pacientesEdit/{pacientes}', [PacientesController::class,'edit'])->middleware('auth');
Route::put('/vistas/Pacientes/pacientesUpdate/{pacientes}', [PacientesController::class,'update'])->middleware('auth');
Route::delete('/vistas/Pacientes/pacientesDestroy/{pacientes}',[PacientesController::class, 'destroy'])->middleware('auth');



Route::get('/consultaEmpleados', [LoginController::class, 'consultaEmpleados'])->name('ConsultaEmpleados')->middleware('auth');


Auth::routes();

