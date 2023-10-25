<?php

namespace App\Http\Controllers;

use session;
use App\Models\User;
use App\Models\DoctorModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EmpleadoModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

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

    public function olvidoPassword()
    {

        return view('vistas/recuperar_clave/olvidoClave');
    }

    public function verificarCorreo(Request $request)
    {

        $campo_email = request()->validate([
            'correoElectronico' => 'required'
        ]);


        $consulta_users = User::select('email')->where('email', $campo_email['correoElectronico'])->get();

        if (count($consulta_users) > 0) {

            session()->put('token', $request->input('_token'));
            session()->put('email', $consulta_users[0]->email);


            return redirect()->route('reseteoClave', ['token' => session()->get('token'), 'email' => session()->get('email')]);
        } else {
            session()->flash('mensaje', 'El correo ingresado no existe en el sistema');

            return redirect()->route('olvidoClave');
        }
    }

    public function reseteoClave($token, $email)
    {

        if ($token == session()->get('token')) {
            return view('/vistas/recuperar_clave/cambioClave', compact('token', 'email'));
        } else {
            session()->flash('mensaje', 'Hubo un error');

            return redirect()->route('olvidoClave');
        }
    }

    public function updatePassword(Request $request)
    {
        $datos = $request->validate([
            'token' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
            'password-confirm' => 'required|same:password'
        ]);

        echo $datos['email'];
    }

    public function consultaEmpleados(Request $request)
    {

        $empleados = EmpleadoModel::select(
            'empleados.idEmpleados',
            'empleados.nombre',
            'empleados.apellido',
            'users.name',
            'empleados.dui',
            'empleados.cargo',
            'empleados.f_nacimiento',
            'users.estado',
            'users.email'
        )
            ->join('users', 'users.id', '=', 'empleados.id')
            ->where('empleados.idEmpleados', '!=', Auth::id())
            ->get();

        return view('vistas/Empleados/consultaEmpleadosView', compact('empleados'));
    }

    public function formEmpleados() {

        $usuarios = User::select('users.id', 'users.name')->from('users')->get();

        return view('vistas/empleados/ingresoEmpleados', compact('usuarios'));

    }

    public function ingresarEmpleados(Request $request) {

        $accion_radio = request()->validate([
            'accionRadio' => 'required'
        ],[
            'accionRadio.required' => "Se debe marcar una accion para continuar el proceso"
        ]);

        if ($accion_radio['accionRadio'] == "seleccionar") {
            
            $campos_datos = request()->validate([
                'id_usuario' => 'required',
                'nombre_empleado' => 'required',
                'apellido_empleado' => 'required',
                'dui_empleado' => 'required',
                'cargo_empleado' => 'required',
                'fecha_nacimiento' => 'required'
            ], [
                'id_usuario.required' => "Se debe asignar un usuario",
                'nombre_empleado.required' => "Se debe ingresar el nombre del empleado",
                'apellido_empleado.required' => "Se debe ingresar el apellido del empleado",
                'dui_empleado.required' => "Se debe ingresar el dui del empleado",
                'cargo_empleado.required' => "Se debe ingresar la fecha de nacimiento del empleado"
            ]);


            $datos_empleado = [
                'id' => $campos_datos['id_usuario'],
                'nombre' => $campos_datos['nombre_empleado'],
                'apellido' => $campos_datos['apellido'],
                'dui' => $campos_datos['dui_empleado'],
                'cargo' => $campos_datos['cargo_empleado'],
                'f_nacimiento' => $campos_datos['fecha_nacimiento']
            ];

            EmpleadoModel::create($datos_empleado);

            session()->flash('mensaje', "Se ha ingresado al empleado con exito");

            return redirect()->route('ingresoEmpleados');
            
        } else {

            $campos_datos = request()->validate([
                'usuario' => 'required|unique:users',
                'email' => 'required',
                'clave' => 'required|min:8',
                'conf_clave' => 'required|same:clave',
                'nombre_empleado' => 'required',
                'apellido_empleado' => 'required',
                'dui_empleado' => 'required',
                'cargo_empleado' => 'required',
                'fecha_nacimiento' => 'required'
            ], [
                'usuario.required' => "Se debe ingresar el nombre de usuario",
                'email.required' => "Se debe ingresar un correo electronico",
                'clave.required' => "Se debe ingresar una contraseña",
                'clave.min' => "La contraseña debe tener 8 caracteres",
                'conf_clave.required' => "Se debe confirmar la contraseña",
                'conf_clave.same' => "Se debe ingresar la misma contraseña anterior",
                'nombre_empleado.required' => "Se debe ingresar el nombre del empleado",
                'apellido_empleado.required' => "Se debe ingresar el apellido del empleado",
                'dui_empleado.required' => "Se debe ingresar el dui del empleado",
                'cargo_empleado.required' => "Se debe ingresar la fecha de nacimiento del empleado"
            ]);

            $datos_usuario = [
                'name' => $campos_datos['usuario'],
                'email' => $campos_datos['email'],
                ''
            ];


            $datos_empleado = [
                'nombre' => $campos_datos['nombre_empleado'],
                'apellido' => $campos_datos['apellido'],
                'dui' => $campos_datos['dui_empleado'],
                'cargo' => $campos_datos['cargo_empleado'],
                'f_nacimiento' => $campos_datos['fecha_nacimiento']
            ];

            EmpleadoModel::create($datos_empleado);

            session()->flash('mensaje', "Se ha ingresado al empleado con exito");

            return redirect()->route('ingresoEmpleados');

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vistas/ingresarUsuarios');
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
            'email' => 'required|email|max:255|unique:users',
            'conf_clave' => 'required|same:clave'
        ], [
            'usuario.required' => "Se require ingresar un nombre de usuario",
            'clave.required' => "Se require ingresar una contraseña",
            'clave.min' => "Se require que la constraseña sea de minimo 8 digitos",
            'email.required' => "Se require ingresar un correo electronico",
            'email.email' => "el correo electronico ingresado no es valido",
            'email.unique' => "El correo electronico ingresado ya esta en uso",
            'conf_clave.required' => "Se require reingresar la contraseña para su confirmacion",
            'conf_clave.same' => "La contraseña ingresada no coincide con la anterior"
        ]);

        $consulta_superusuarios = User::select('estado')->where('estado', 'superusuario')->get();

        $usuarios = [];

        if (count($consulta_superusuarios) == 0) {

            $usuarios = [
                'name' => $datos['usuario'],
                'password' => Hash::make($datos['clave']),
                'estado' => 'superusuario',
                'email' => $datos['email']
            ];

            User::create($usuarios);
        } else {

            $usuarios = [
                'name' => $datos['usuario'],
                'password' => Hash::make($datos['clave']),
                'estado' => 'empleado',
                'email' => $datos['email']
            ];

            User::create($usuarios);
        }

        session()->flash('mensaje', 'Se ha ingresado con exito');

        return redirect()->route('login');
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
        $empleado_datos = EmpleadoModel::select(
            'empleados.idEmpleados',
            'empleados.nombre',
            'empleados.apellido',
            'empleados.dui',
            'empleados.cargo',
            'empleados.f_nacimiento',
            'users.id',
            'users.name',
            'users.email',
            'users.estado',
            'doctores.especializacion'
        )->from('empleados')
            ->join('users', 'users.idEmpleados', '=', 'empleados.idEmpleados')
            ->join('doctores', 'doctores.idDoctores', '=', 'doctores.idDoctores')
            ->where('empleados.idEmpleados', $empleado->idEmpleados)->get();

        return view('vistas/Empleados/formUpdateEmpleados', compact('empleado', 'empleado_datos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userUpdate(Request $request, User $user)
    {
        $user_campos = request()->validate([
            'usuario' => 'required',
            'email' => 'required',
            'rol_usuario' => 'required'
        ]);

        $user->name = $user_campos['usuario'];
        $user->email = $user_campos['email'];
        $user->estado = $user_campos['rol_usuario'];

        if ($request->input('clave') != "") {

            $nuevaClave = $request()->validate([
                'conf_clave' => 'required|same:clave'
            ]);

            $user->password = Hash::make($request->input('clave'));
            $user->save();
        } else {
            $user->save();
        }

        $consulta_empleado = EmpleadoModel::select(
            'empleados.idEmpleados',
            'empleados.nombre',
            'empleados.apellido',
            'empleados.dui',
            'empleados.cargo',
            'empleados.f_nacimiento',
            'users.id',
            'users.name',
            'users.email',
            'users.estado',
            'doctores.especializacion'
        )->from('empleados')
            ->join('users', 'users.idEmpleados', '=', 'empleados.idEmpleados')
            ->join('doctores', 'doctores.idDoctores', '=', 'doctores.idDoctores')
            ->where('empleados.idEmpleados', $user->id)->get();

        $request->session()->flash('mensaje', 'Se ha actualizado con exito');

        return view('vistas/Empleados/formUpdateEmpleados')->with(['empleado_datos' => $consulta_empleado]);
    }

    public function empleadoUpdate(Request $request, EmpleadoModel $empleado)
    {

        $campos_empleados = request()->validate([
            'nombre_empleado' => 'required',
            'apellido_empleado' => 'required',
            'dui_empleado' => 'required',
            'cargo_empleado' => 'required',
            'fecha_nacimiento' => 'required'
        ]);

        $empleado->nombre = $campos_empleados['nombre_empleado'];
        $empleado->apellido = $campos_empleados['apellido_empleado'];
        $empleado->dui = $campos_empleados['dui_empleado'];
        $empleado->cargo = $campos_empleados['cargo_empleado'];
        $empleado->f_nacimiento = $campos_empleados['fecha_nacimiento'];
        $empleado->save();

        if ($campos_empleados['cargo_empleado'] == "Doctor") {

            $datos_doctores = request()->validate([
                'especialidad' => 'required'
            ]);

            $doctores = DoctorModel::find($empleado->idEmpleados);
            $doctores->especializacion = $datos_doctores['especialidad'];
            $doctores->save();
        }

        $request->session()->flash('mensaje', 'Se ha actualizado con exito');

        return redirect()->route('formEmpleadoUpdate', ['empleado' => $empleado->idEmpleados]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function empleadoDelete($id)
    {
        EmpleadoModel::destroy($id);

        return response()->json();
    }
}
