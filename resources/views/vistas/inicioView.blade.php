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

    p{
        font-family: Verdana, Tahoma, sans-serif;
        color: white;

    }

    .pvision{
        text-align: center;
    }
    
    .pmision{
        text-align: center;
    }

    .Pvalores{
        text-align: center;
    }
</style>
<h2>
    Sistema de gestion pacientes.
</h2>
<br>
<div align="center">
    <img src="{{ asset('imagenesSistema/imagenEmpresa2.jpg') }}" alt="">
</div>
<br><br>
<div class="pvision p-3">
    <p>vision:</p>
    <br>
    <p>
        Ser la empresa de desarrollo de software más confiable <br>
        y reconocida a nivel Nacional. <br>
        Nuestra visión es liderar la revolución tecnológica,<br>
         ofreciendo soluciones de software de vanguardia <br> 
        que transformen la forma en que las empresas <br>
         y las personas interactúan con la tecnología.
    </p>
</div>
<br>
<div class="pmision p-3">
    <p>mision:</p>
    <br>
    <p>Como empresa tenemos como misión brindar un servicio de sistemas de software <br>
        en sectores en los que detectemos una necesidad puntual <br>
        y llegar a ser reconocidos en distintos mercados <br>
        o por diferentes empresas gracias a nuestros servicios <br>
         de software para diferentes índoles.</p>
</div>
<br>

<div class="Pvalores p-3">
    <p>valores de la empresa:</p>
    <br>
    <p>
      1- Confidencialidad.<br>
      2- Responsabilidad<br>
      3- honestidad y etica profesional<br>
      4- Trabajo en equipo<br>
      5- Compromiso<br>
      6- Transparencia<br>
      7- Pasion<br>
      8- Eficasia<br>
      9- Innovacion<br>
    </p>
</div>
@endSection