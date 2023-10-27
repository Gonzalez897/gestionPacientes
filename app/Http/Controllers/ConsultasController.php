<?php

namespace App\Http\Controllers;

use App\Models\DoctorModel;
use Illuminate\Http\Request;
use App\Models\ConsultasModel;
use App\Models\PacientesModel;

class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $consultas = ConsultasModel::select(
            'consultas.idConsultas',
            'consultas.nombre_consultas',
            'consultas.descripcion',
            'consultas.f_consulta',
            'pacientes.nombre_paciente as NombreP',
            'pacientes.apellido_paciene as ApellidoP',
            'empleados.nombre as Doctor',
            'empleados.apellido as DoctorA',
            'doctores.especializacion as Especializacion',
            'consultas.created_at'
        )
            ->from('consultas')->join('pacientes', 'consultas.idPacientes', '=', 'pacientes.idPacientes')
            ->join('doctores', 'consultas.idDoctores', '=', 'doctores.idDoctores')
            ->join('empleados', 'doctores.idEmpleados', '=', 'empleados.idEmpleados')
            ->where('empleados.cargo', '=', 'doctor')
            ->get();
        return view('/vistas/Consultas/consultasShow')->with(['consultas' => $consultas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pacientes = PacientesModel::all();
        $doctores = DoctorModel::select('doctores.especializacion', 'doctores.disponibilidad', 'doctores.idDoctores', 'empleados.nombre', 'empleados.apellido')
            ->from('doctores')->join('empleados', 'empleados.idEmpleados', '=', 'doctores.idEmpleados')->get();
        return view('/vistas/Consultas/consultasCreate')->with(['pacientes' => $pacientes, 'doctores' => $doctores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = request()->validate([
            'nombre_consultas' => 'required',
            'descripcion' => 'required',
            'f_consulta' => 'required',
            'idPacientes' => 'required',
            'idDoctores' => 'required'
        ]);

        $consulta_doctores = DoctorModel::find($data['idDoctores']);

        if ($consulta_doctores->disponibilidad != "No disponible") {
            $consulta_doctores->disponibilidad = "No disponible";
            $consulta_doctores->save();

            ConsultasModel::create($data);
            return redirect('/vistas/Consultas/consultasShow');
        } else {

            session()->flash('doctorDisponible', "El doctor seleccionado no se encuentra disponible");
            
            $pacientes = PacientesModel::all();
            $doctores = DoctorModel::select('doctores.especializacion', 'doctores.disponibilidad', 'doctores.idDoctores', 'empleados.nombre', 'empleados.apellido')
                ->from('doctores')->join('empleados', 'empleados.idEmpleados', '=', 'doctores.idEmpleados')->get();
            return view('/vistas/Consultas/consultasCreate')->with(['pacientes' => $pacientes, 'doctores' => $doctores]);
        }
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
    public function edit(ConsultasModel $consultas)
    {
        //
        $pacientes = PacientesModel::select('*')
            ->from('pacientes')
            ->where('idPacientes', $consultas->idPacientes)
            ->get();
        $doctores = DoctorModel::select('doctores.especializacion', 'doctores.idDoctores', 'empleados.nombre', 'empleados.apellido')
            ->from('doctores')->join('empleados', 'empleados.idEmpleados', '=', 'doctores.idEmpleados')
            ->get();



        return view('/vistas/Consultas/consultasUpdate')->with(['consultas' => $consultas, 'pacientes' => $pacientes, 'doctores' => $doctores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConsultasModel $consultas)
    {
        //

        $data = request()->validate([
            'nombre_consultas' => 'required',
            'descripcion' => 'required',
            'f_consulta' => 'required',
            'idPaciente' => 'required',
            'idDoctores' => 'required'
        ]);

        $consultas->nombre_consultas = $data['nombre_consultas'];
        $consultas->descripcion = $data['descripcion'];
        $consultas->f_consulta = $data['f_consulta'];
        $consultas->idPaciente = $data['idPaciente'];
        $consultas->idDoctores = $data['idDoctores'];
        $consultas->updated_at = now();
        $consultas->save();

        return redirect('/vistas/Consultas/consultasShow');
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
        ConsultasModel::destroy($id);
        return response()->json(array('res' => true));
    }
}
