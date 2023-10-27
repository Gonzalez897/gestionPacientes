<?php

namespace App\Http\Controllers;

use App\Models\CitasModel;
use App\Models\DoctorModel;
use Illuminate\Http\Request;
use App\Models\PacientesModel;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $citas = CitasModel::select('citas.idCitas', 'citas.motivo', 'citas.fecha_cita', 'pacientes.nombre_paciente as NombreP', 'pacientes.apellido_paciene as ApellidoP', 'empleados.nombre as Doctor', 'empleados.apellido as DoctorA', 'doctores.especializacion as Especializacion', 'citas.created_at')
            ->from('citas')->join('pacientes', 'citas.idPacientes', '=', 'pacientes.idPacientes')
            ->join('doctores', 'citas.idDoctores', '=', 'doctores.idDoctores')
            ->join('empleados', 'doctores.idEmpleados', '=', 'empleados.idEmpleados')
            ->where('empleados.cargo', '=', 'doctor')
            ->get();
        return view('/vistas/Citas/citasShow')->with(['citas' => $citas]);
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
        $doctores = DoctorModel::select('doctores.especializacion', 'doctores.disponibilidad', 'doctores.idDoctores', 'empleados.nombre')
            ->from('doctores')->join('empleados', 'empleados.idEmpleados', '=', 'doctores.idEmpleados')->get();
        return view('/vistas/Citas/citasCreate')->with(['pacientes' => $pacientes, 'doctores' => $doctores]);
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
        $datos = request()->validate([
            'motivo' => 'required',
            'fecha_cita' => 'required',
            'fkPaciente' => 'required',
            'fkDoctores' => 'required'
        ]);

        $data = [
            'motivo' => $datos['motivo'],
            'fecha_cita' => $datos['fecha_cita'],
            'idPacientes' => $datos['fkPaciente'],
            'idDoctores' => $datos['fkDoctores']
        ];

        $consulta_doctores = DoctorModel::find($datos['fkDoctores']);

        if ($consulta_doctores->disponibilidad != "No disponible") {
            $consulta_doctores->disponibilidad = "No disponible";
            $consulta_doctores->save();

            CitasModel::create($data);
            return redirect('/vistas/Citas/citasShow');
        } else {

            session()->flash('doctorDisponible', "El doctor seleccionado no se encuentra disponible");

            $pacientes = PacientesModel::all();
            $doctores = DoctorModel::select('doctores.especializacion', 'doctores.disponibilidad', 'doctores.idDoctores', 'empleados.nombre')
                ->from('doctores')->join('empleados', 'empleados.idEmpleados', '=', 'doctores.idEmpleados')->get();
            return view('/vistas/Citas/citasCreate')->with(['pacientes' => $pacientes, 'doctores' => $doctores]);
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
    public function edit(CitasModel $citas)
    {
        $pacientes = PacientesModel::select('*')
            ->from('pacientes')
            ->where('idPacientes', $citas->idPacientes)
            ->get();
        $doctores = DoctorModel::select('doctores.especializacion', 'doctores.idDoctores', 'empleados.nombre')
            ->from('doctores')->join('empleados', 'empleados.idEmpleados', '=', 'doctores.idEmpleados')
            ->get();



        return view('/vistas/Citas/citasUpdate')->with(['citas' => $citas, 'pacientes' => $pacientes, 'doctores' => $doctores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CitasModel $citas)
    {
        $data = request()->validate([
            'motivo' => 'required',
            'fecha_cita' => 'required',
            'fkDoctores' => 'required'
        ]);

        $citas->motivo = $data['motivo'];
        $citas->fecha_cita = $data['fecha_cita'];
        $citas->idDoctores = $data['fkDoctores'];
        $citas->updated_at = now();
        $citas->save();

        return redirect('/vistas/Citas/citasShow');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CitasModel::destroy($id);
        return response()->json(array('res' => true));
    }
}
