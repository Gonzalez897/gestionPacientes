<?php

namespace App\Http\Controllers;

use App\Models\DoctorModel;
use App\Models\RecetasModel;
use Illuminate\Http\Request;
use App\Models\EmpleadoModel;
use App\Models\ConsultasModel;
use App\Models\PacientesModel;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recetas=RecetasModel::select('empleados.nombre as Doctor', 'pacientes.nombre_paciente as NombrePaciente', 'pacientes.edad_paciente as edadPaciente', 'recetas.tipo_receta as Diagnostico', 'recetas.descripcion_tratamiento as Tratamiento', 'recetas.idRecetas', 'recetas.created_at')
        ->from('recetas')
        ->join('consultas', 'consultas.idConsultas','=','recetas.idConsultas')
        ->join('pacientes', 'pacientes.idPacientes','=','consultas.idPacientes')
        ->join('doctores', 'doctores.idDoctores','=','consultas.idDoctores')
        ->join('empleados', 'empleados.idEmpleados','=','doctores.idEmpleados')
        ->where('empleados.cargo','=','doctor')
        ->get();

        return view('/vistas/Recetas/recetasShow')->with(['recetas'=>$recetas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $consultas=ConsultasModel::select('consultas.idConsultas as id', 'consultas.nombre_consultas as nombre', 'empleados.nombre as nombreD', 'pacientes.nombre_paciente as nombreP', 'pacientes.edad_paciente as edad')
        ->from('consultas')
        ->join('pacientes', 'pacientes.idPacientes','=','consultas.idPacientes')
        ->join('doctores', 'doctores.idDoctores','=','consultas.idDoctores')
        ->join('empleados', 'empleados.idEmpleados','=','doctores.idEmpleados')
        ->where('empleados.cargo','=','doctor')
        ->get();



        return view('/vistas/Recetas/recetasCreate')->with(['consultas'=>$consultas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'tipo_receta'=>'required',
            'descripcion_tratamiento'=>'required',
            'idConsultas'=>'required'
        ]);

        RecetasModel::create($data);
        return redirect('/vistas/Recetas/recetasShow');
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
    public function edit(RecetasModel $recetas)
    {
        return view('/vistas/Recetas/recetasUpdate')->with(['recetas'=>$recetas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecetasModel $recetas)
    {
        $data=request()->validate([
            'tipo_receta'=>'required',
            'descripcion_tratamiento'=>'required',
        ]);

        $recetas->tipo_receta=$data['tipo_receta'];
        $recetas->descripcion_tratamiento=$data['descripcion_tratamiento'];
        $recetas->updated_at=now();
        $recetas->save();

        return redirect('/vistas/Recetas/recetasShow');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RecetasModel::destroy($id);
        return response()->json(array('res'=>true));
    }

    public function find($id) {

        $data=ConsultasModel::select('consultas.idConsultas as id', 'consultas.nombre_consultas as nombre', 'empleados.nombre as nombreD', 'pacientes.nombre_paciente as nombreP', 'pacientes.edad_paciente as edad')
        ->from('consultas')
        ->join('pacientes', 'pacientes.idPacientes','=','consultas.idPacientes')
        ->join('doctores', 'doctores.idDoctores','=','consultas.idDoctores')
        ->join('empleados', 'empleados.idEmpleados','=','doctores.idEmpleados')
        ->where('empleados.cargo','=','doctor')
        ->where('consultas.idConsultas',$id)
        ->get();

        if ($data) {
            return response()->json($data);
        }
    
        return response()->json(['error' => 'Dato no encontrado'], 404);
    }
    
}
