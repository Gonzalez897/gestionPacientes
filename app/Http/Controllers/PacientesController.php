<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PacientesModel;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes=PacientesModel::all();

        return view('/vistas/Pacientes/pacientesShow')->with(['pacientes'=>$pacientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/vistas/Pacientes/pacientesCreate');
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
            'nombre_paciente'=>'required',
            'apellido_paciene'=>'required',
            'dui_paciente'=>'required',
            'edad_paciente'=>'required'
        ]);

        PacientesModel::create($data);
        return redirect('/vistas/Pacientes/pacientesShow');
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
    public function edit(PacientesModel $pacientes)
    {
        return view('/vistas/Pacientes/pacientesUpdate')->with(['pacientes'=>$pacientes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PacientesModel $pacientes)
    {
        $data=request()->validate([
            'nombre_paciente'=>'required',
            'apellido_paciene'=>'required',
            'dui_paciente'=>'required',
            'edad_paciente'=>'required'
        ]);

        $pacientes->nombre_paciente=$data['nombre_paciente'];
        $pacientes->apellido_paciene=$data['apellido_paciene'];
        $pacientes->dui_paciente=$data['dui_paciente'];
        $pacientes->edad_paciente=$data['edad_paciente'];
        $pacientes->updated_at=now();
        $pacientes->save();

        return redirect('/vistas/Pacientes/pacientesShow');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PacientesModel::destroy($id);
        return response()->json(array('res'=>true));
    }
}
