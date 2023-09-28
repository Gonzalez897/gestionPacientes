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

    public function citas() {
        return view('vistas/citasView');
    }

    public function recetas() {
        return view('vistas/recetasView');
    }

}