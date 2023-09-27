@extends('layout.app')

@section('titulo', 'Inicio')

@section('contenido')
<style scoped>
    h2 {
        text-align: center;
        color: white
    }

    img {
        width: 25%;
    }
</style>
<h2>
    Bienvenido al sistema de gestion de pacientes <br>
    GestionSalud
</h2>
<br>
<div align="center">
    <img src="{{ asset('imagenesSistema/imagenEmpresa2.jpg') }}" alt="">
</div>

@endSection