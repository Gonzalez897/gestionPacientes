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
    hola como estan?
    este es mi comentario
</h2>
<br>
<div align="center">
    <img src="{{ asset('imagenesSistema/imagenEmpresa2.jpg') }}" alt="">
</div>

@endSection