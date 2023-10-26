@extends('layout.app')

@section('titulo', 'Inicio')

@section('contenido')
    <style scoped>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial;
            font-size: 17px;
        }

        .container {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
        }

        .container img {
            vertical-align: middle;
        }

        .container .content {
            position: absolute;
            bottom: 0;
            background: rgb(0, 0, 0);
            /* Fallback color */
            background: rgba(0, 0, 0, 0.5);
            /* Black background with 0.5 opacity */
            color: #f1f1f1;
            width: 100%;
            height: 80%;
            padding: 20px;
        }

        p.left {
            text-align: left;
            font-weight: bold;
            line-height: 75%;
        };
    </style>
    <div class="container">
        <img src="{{ asset('imagenesSistema/imagenEmpresa2.jpg') }}" alt="Notebook" style="width:100%;">
        <div class="content">
            <h1>Gestion pacientes.</h1>
            <p>vision:

                Ser la empresa de desarrollo de software más confiable
                y reconocida a nivel Nacional.
                Nuestra visión es liderar la revolución tecnológica,
                ofreciendo soluciones de software de vanguardia
                que transformen la forma en que las empresas
                y las personas interactúan con la tecnología.
            </p>
            <br>
            <p>mision:
                Como empresa tenemos como misión brindar un servicio de sistemas de software
                en sectores en los que detectemos una necesidad puntual
                y llegar a ser reconocidos en distintos mercados
                o por diferentes empresas gracias a nuestros servicios
                de software para diferentes índoles.
            </p>
            <br>

            <p>valores de la empresa:
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
    </div>
@endSection
