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
        $citas=CitasModel::all();
        return view('/vistas/Citas/citasShow')->with(['citas'=>$citas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pacientes=PacientesModel::all();
        $doctores=DoctorModel::select('doctores.especializacion','doctores.idDoctores', 'empleados.nombre')
        ->from('doctores')->join('empleados','empleados.idEmpleados','=','doctores.idEmpleados')->get();
        return view('/vistas/Citas/citasCreate')->with(['pacientes'=>$pacientes,'doctores'=>$doctores]);
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
        $datos=request()->validate([
            'nombre_cita'=>'required',
            'motivo'=>'required',
            'fecha_cita'=>'required',
            'fkPaciente'=>'required',
            'fkDoctores'=>'required'
        ]);

        $data=[
            'nombre_cita'=>$datos['nombre_cita'],
            'motivo'=>$datos['motivo'],
            'fecha_cita'=>$datos['fecha_cita'],
            'idPacientes'=>$datos['fkPaciente'],
            'idDoctores'=>$datos['fkDoctores']
        ];

        CitasModel::create($data);
        return redirect('/vistas/Citas/citasShow');
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
    public function edit(CitasModel $citas )
    {
        return view('/vistas/Citas/citasUpdate')->with(['citas'=>$citas]);
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
        $data=request()->validate([
            'nombre_cita'=>'required',
            'motivo'=>'required',
            'fecha_cita'=>'required',
        ]);

        $citas->nombres_citas=$data['nombres_citas'];
        $citas->motivo=$data['motivo'];
        $citas->fecha_cita=$data['fecha_cita'];
        $citas->updated_at=now();
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
        return response()->json(array('res'=>true));
    }
}
