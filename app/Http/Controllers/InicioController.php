<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function inicio() {

        return view('vistas/inicioView');
    }

    public function consultas() {
        return view('vistas/consultasView');
    }

    public function doctores() {
        return view('vistas/doctoresView');
    }

    public function citasCreate() {
        return view('vistas/Citas/citasCreate');
    }
    
    public function citasShow() {
        return view('vistas/Citas/citasShow');
    }
    
    public function citasUpdate() {
        return view('vistas/Citas/citasUpdate');
    }

    public function recetas() {
        return view('vistas/recetasView');
    }

    public function Pacientes() {
        return view('vistas/pacientesView');
    }

    public function login() {
        return view('vistas/loginView');
    }


}