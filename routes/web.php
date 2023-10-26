<?php

//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\DoctoresController;
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


// DOCTORES CRUD
Route::get('/vistas/Doctores/doctoresShow', [DoctoresController::class,'index'])->middleware('auth');
Route::post('/vistas/Doctores/doctoresStore', [DoctoresController::class,'store'])->middleware('auth');
Route::get('/vistas/Doctores/doctoresEdit/{doctores}', [DoctoresController::class,'edit'])->middleware('auth');
Route::put('/vistas/Doctores/doctoresUpdate/{doctores}', [DoctoresController::class,'update'])->middleware('auth');
Route::delete('/vistas/Doctores/doctoresDestroy/{doctores}',[DoctoresController::class, 'destroy'])->middleware('auth');


// CITAS CRUD
Route::get('/vistas/Citas/citasShow', [CitasController::class,'index'])->middleware('auth');
Route::get('/vistas/Citas/citasCreate', [CitasController::class,'create'])->middleware('auth');
Route::post('/vistas/Citas/citasStore', [CitasController::class,'store'])->middleware('auth');
Route::get('/vistas/Citas/citasEdit/{citas}', [CitasController::class,'edit'])->middleware('auth');
Route::put('/vistas/Citas/citasUpdate/{citas}', [CitasController::class,'update'])->middleware('auth');
Route::delete('/vistas/Citas/citasDestroy/{citas}',[CitasController::class, 'destroy'])->middleware('auth');


// RECETAS CRUD
Route::get('/vistas/Recetas/recetasShow', [RecetaController::class,'index'])->middleware('auth');
Route::get('/vistas/Recetas/recetasCreate', [RecetaController::class,'create'])->middleware('auth');
Route::post('/vistas/Recetas/recetasStore', [RecetaController::class,'store'])->middleware('auth');
Route::get('/vistas/Recetas/recetasEdit/{recetas}', [RecetaController::class,'edit'])->middleware('auth');
Route::put('/vistas/Recetas/recetasUpdate/{recetas}', [RecetaController::class,'update'])->middleware('auth');
Route::delete('/vistas/Recetas/recetasDestroy/{recetas}',[RecetaController::class, 'destroy'])->middleware('auth');
Route::get('/vistas/Recetas/recetasfind/{id}', [RecetaController::class, 'find']);

// Pacientes CRUD
Route::get('/vistas/Pacientes/pacientesShow', [PacientesController::class,'index'])->middleware('auth');
Route::get('/vistas/Pacientes/pacientesCreate', [PacientesController::class,'create'])->middleware('auth');
Route::post('/vistas/Pacientes/pacientesStore', [PacientesController::class,'store'])->middleware('auth');
Route::get('/vistas/Pacientes/pacientesEdit/{pacientes}', [PacientesController::class,'edit'])->middleware('auth');
Route::put('/vistas/Pacientes/pacientesUpdate/{pacientes}', [PacientesController::class,'update'])->middleware('auth');
Route::delete('/vistas/Pacientes/pacientesDestroy/{pacientes}',[PacientesController::class, 'destroy'])->middleware('auth');




Route::get('/consultaEmpleados', [LoginController::class, 'consultaEmpleados'])->name('ConsultaEmpleados')->middleware('auth');


Auth::routes();

