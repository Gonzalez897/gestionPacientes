<?php

//use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\DoctoresController;
use App\Http\Controllers\ConsultasController;
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


// CONSULTAS CRUD
Route::get('/vistas/Consultas/consultasShow', [ConsultasController::class,'index'])->middleware('auth');
Route::get('/vistas/Consultas/consultasCreate', [ConsultasController::class,'create'])->middleware('auth');
Route::post('/vistas/Consultas/consultasStore', [ConsultasController::class,'store'])->middleware('auth');
Route::get('/vistas/Consultas/consultasEdit/{consultas}', [ConsultasController::class,'edit'])->middleware('auth');
Route::put('/vistas/Consultas/consultasUpdate/{consultas}', [ConsultasController::class,'update'])->middleware('auth');
Route::delete('/vistas/Consultas/consultasDestroy/{consultas}',[ConsultasController::class, 'destroy'])->middleware('auth');


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





Auth::routes();

