<?php

//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth;
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


Route::get('/formEmpleado', [LoginController::class, 'create']);

Route::post('/ingresoEmpleados', [LoginController::class, 'store'])->name('ingresoEmpleados');

Route::get('/empleado/edit/{empleado}', [LoginController::class, 'empleadosEdit'])->middleware('auth');

Route::put('/empleado/update/{empleado}', [LoginController::class, 'update'])->name('actualizarEmpleado')->middleware('auth');

Route::get('/', [InicioController::class,'inicio'])->middleware('auth');

Route::get('/consultas', [InicioController::class, 'consultas'])->name('consultas');

Route::get('/doctores', [InicioController::class, 'doctores'])->name('doctores');

// CITAS RUTAS CON CRUD
Route::get('/vistas/Citas/citasShow', [CitasController::class,'index']);
Route::get('/vistas/Citas/citasCreate', [CitasController::class,'create']);
Route::post('/vistas/Citas/citasStore', [CitasController::class,'store']);
Route::get('/vistas/Citas/citasEdit/{citas}', [CitasController::class,'edit']);
Route::put('/vistas/Citas/citasUpdate/{citas}', [CitasController::class,'update']);
Route::delete('/vistas/Citas/citasDestroy/{citas}',[CitasController::class, 'destroy']);



Route::get('/recetas', [InicioController::class, 'recetas'])->name('recetas');

Route::get('/Pacientes', [InicioController::class, 'Pacientes'])->name('Pacientes');

Route::get('/consultaEmpleados', [LoginController::class, 'consultaEmpleados'])->name('ConsultaEmpleados');


//Route::get('/login', [LoginController::class, 'index'])->name('loginNuevo');

Route::post('/loginValidar', [LoginController::class, 'validacionLogin'])->name('validarUsuario');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
