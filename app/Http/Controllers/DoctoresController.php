<?php

namespace App\Http\Controllers;

use App\Models\DoctorModel;
use Illuminate\Http\Request;
use App\Models\EmpleadoModel;

class DoctoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctores=DoctorModel::select('doctores.idDoctores', 'empleados.nombre as nombreD', 'empleados.apellido as apellidoD', 'empleados.cargo as cargo', 'doctores.especializacion', 'doctores.disponibilidad','doctores.created_at')
        ->from('doctores')->join('empleados', 'doctores.idEmpleados','=','empleados.idEmpleados')
        ->where('empleados.cargo','=','doctor')
        ->get();
        return view('/vistas/Doctores/doctoresShow')->with(['doctores'=>$doctores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function edit(DoctorModel $doctores)
    {
        $empleados=EmpleadoModel::select('*')
        ->from('empleados')
        ->where('idEmpleados',$doctores->idEmpleados)
        ->get();
        // $doctores=DoctorModel::all();
        return view('/vistas/Doctores/doctoresUpdate')->with(['doctores'=>$doctores,'empleados'=>$empleados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoctorModel $doctores)
    {
        $data=request()->validate([
            'especializacion'=>'required',
            'disponibilidad'=>'required',
        ]);

        $doctores->especializacion=$data['especializacion'];
        $doctores->disponibilidad=$data['disponibilidad'];
        $doctores->updated_at=now();
        $doctores->save();

        return redirect('/vistas/Doctores/doctoresShow');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DoctorModel::destroy($id);
        return response()->json(array('res'=>true));
    }
}
