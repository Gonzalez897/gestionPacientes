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
            'clave' => 'required|min:8',
            'estado_usuario' => 'required',
            'email' => 'required|email|max:255|unique:users',
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
            'f_nacimiento' => $datos['fecha_nacimiento'],
        ];

        EmpleadoModel::create($empleados);

        $empleado_ingresado = EmpleadoModel::latest()->first();

        $consulta_superusuarios = User::select('estado')->where('estado','superusuario')->get();

        $usuarios = [];

        if (count($consulta_superusuarios) == 0) {
            
            $usuarios = [
                'name' => $datos['usuario'],
                'password' => Hash::make($datos['clave']),
                'estado' => 'superusuario',
                'email' => $datos['email'],
                'idEmpleados' => $empleado_ingresado->idEmpleados
            ];

            User::create($usuarios);
        }else{

            $usuarios = [
                'name' => $datos['usuario'],
                'password' => Hash::make($datos['clave']),
                'estado' => 'empleado',
                'email' => $datos['email'],
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

        return redirect('/');
    }

    public function consultaEmpleados(Request $request){
        
        $empleados = EmpleadoModel::select('empleados.idEmpleados','empleados.nombre','empleados.apellido', 'users.name',
        'empleados.dui', 'empleados.cargo', 'empleados.f_nacimiento')
        ->join('users', 'users.idEmpleados', '=', 'empleados.idEmpleados')
        ->get();

        return view('vistas/Empleados/consultaEmpleadosView', compact('empleados'));

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
    public function empleadosEdit(EmpleadoModel $empleado)
    {
        $id = $empleado->idEmpleados;
        
        return view('vistas/Empleados/formUpdateEmpleados', compact('empleado','id'));
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
