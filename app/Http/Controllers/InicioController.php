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
}