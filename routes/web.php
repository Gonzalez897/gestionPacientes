<?php

//use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
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


Route::get('/usersIngreso', [LoginController::class, 'create']);

Route::post('/userInsert', [LoginController::class, 'store'])->name('userInsert');

Route::get('/formEmpleado', [LoginController::class, 'formEmpleados'])->name('formEmpleados')->middleware('auth');

Route::post('/ingresoEmpleados', [LoginController::class, 'ingresarEmpleados'])->name('ingresoEmpleados');

Route::get('/olvidoClave', [LoginController::class, 'olvidoPassword'])->name('olvidoClave')->middleware('guest');

Route::post('/verificarCorreo', [LoginController::class, 'verificarCorreo'])->name('verificarCorreo')->middleware('guest');

Route::get('/reseteoClave/{token}/{email}', [LoginController::class, 'reseteoClave'])->name('reseteoClave')->middleware('guest');

Route::put('/updateClave', [loginController::class, 'updatePassword'])->name('updatePassword')->middleware('guest');

Route::get('/consultaEmpleados', [LoginController::class, 'consultaEmpleados'])->name('consultaEmpleados')->middleware('auth');

Route::get('/empleado/edit/{empleado}', [LoginController::class, 'empleadosEdit'])->name('formEmpleadoUpdate')->middleware('auth');

Route::put('/empleado/userUpdate/{user}', [LoginController::class, 'userUpdate'])->name('userUpdate')->middleware('auth');

Route::put('/empleado/empleadoUpdate/{empleado}', [LoginController::class, 'empleadoUpdate'])->name('empleadoUpdate')->middleware('auth');

Route::delete('/empleado/empleadoDelete/{empleado}', [LoginController::class, 'empleadoDelete'])->name('empleadoDelete')->middleware('auth');


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

Route::get('/Pacientes', [InicioController::class, 'Pacientes'])->name('Pacientes')->middleware('auth');


Auth::routes();

