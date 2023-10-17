<?php

namespace App\Http\Controllers;

use App\Models\DoctorModel;
use App\Models\EmpleadoModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vistas/loginView');
    }

    public function validacionLogin(Request $request) {
        
        $datos = request()->validate([
            'usuario' => 'required',
            'clave' => 'required'
        ]);
        
        $credencials = request()->only('usuario', 'clave');

        if (Auth::attempt($credencials)) {
            
            request()->session()->regenerate();

            return redirect('/');
        }

        return redirect()->route('loginNuevo');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vistas/Empleados/ingresoEmpleados');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = request()->validate([
            'usuario' => 'required',
            'clave' => 'required',
            'conf_clave' => 'required|same:clave',
            'nombre_empleado' => 'required',
            'apellido_empleado' => 'required',
            'dui_empleado' => 'required',
            'cargo_empleado' => 'required',
            'fecha_nacimiento' => 'required'
        ]);

        $empleados = [
            'nombre' => $datos['nombre_empleado'],
            'apellido' => $datos['apellido_empleado'],
            'dui' => $datos['dui_empleado'],
            'cargo' => $datos['cargo_empleado'],
            'fecha_nacimiento' => $datos['fecha_nacimiento'],
        ];

        EmpleadoModel::create($empleados);

        $empleado_ingresado = EmpleadoModel::latest()->first();

        $consulta_superusuarios = User::select('estado')->where('estado','superusuario')->get();

        $usuarios = [];

        if (count($consulta_superusuarios) == 0) {
            
            $usuarios = [
                'usuario' => $datos['usuario'],
                'clave' => Hash::make($datos['clave']),
                'estado' => 'superusuario',
                'idEmpleados' => $empleado_ingresado->idEmpleados
            ];

            User::create($usuarios);
        }else{

            $usuarios = [
                'usuario' => $datos['usuario'],
                'clave' => Hash::make($datos['clave']),
                'estado' => 'empleado',
                'idEmpleados' => $empleado_ingresado->idEmpleados
            ];

            User::create($usuarios);
        }

        $doctores = [];

        if ($datos['cargo_empleado'] == "Doctor") {
            
            $doctores = [
                'idEmpleados' => $empleado_ingresado->idEmpleados,
                'especializacion' => $request->input('especialidad')
            ];

            DoctorModel::create($doctores);
            
        }

        return redirect('/formEmpleado');
    }

    public function consultaEmpleados(Request $request){

        return view('vistas/Empleados/consultaEmpleadosView');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
