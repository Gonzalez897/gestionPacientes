<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function inicio() {

        return view('vistas/inicioView');
    }


    // CONSULTAS
    public function consultas() {
        return view('vistas/consultasView');
    }


    // DOCTORES
    public function doctoresShow() {
        return view('/vistas/Doctores/doctoresShow');
    }
    
    public function doctoresUpdate() {
        return view('/vistas/Doctores/doctoresUpdate');
    }



    // CITAS
    public function citasCreate() {
        return view('/vistas/Citas/citasCreate');
    }
    
    public function citasShow() {
        return view('/vistas/Citas/citasShow');
    }
    
    public function citasUpdate() {
        return view('/vistas/Citas/citasUpdate');
    }



    // RECETAS
    public function recetasCreate() {
        return view('/vistas/Recetas/recetasCreate');
    }
    public function recetasShow() {
        return view('/vistas/Recetas/recetasShow');
    }
    public function recetasUpdate() {
        return view('/vistas/Recetas/recetasUpdate');
    }


    // PACIENTES

    public function PacientesCreate() {
        return view('/vistas/Pacientes/pacientesCreate');
    }
    public function PacientesShow() {
        return view('/vistas/Pacientes/pacientesShow');
    }
    public function PacientesUpdate() {
        return view('/vistas/Pacientes/pacientesUpdate');
    }




    // LOGIN
    public function login() {
        return view('vistas/loginView');
    }


}