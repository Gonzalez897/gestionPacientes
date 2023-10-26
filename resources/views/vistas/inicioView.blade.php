@extends('layout.app')

@section('titulo', 'Inicio')

@section('contenido')
    <style scoped>
        body {
            font-family: Arial;
            font-size: 17px;
        }

        p.left {
            text-align: left;
            font-weight: bold;
            line-height: 75%;
        }

        .imgSlide {
            width: 100%;
            height: 550px;
        }
        .imgcard {
            width: 100%;
            height: 350px;
        }
    </style>

    <div class="container-fluid">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('imagenesSistema/imagenEmpresa2.jpg') }}" class="d-block w-100 imgSlide" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Bienvenidos al sistema Gestion pacientes.</h5>
                        <p><b>LEMA DE LA EMPRESA</b></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('imagenesSistema/slide4.jpg') }}" class="d-block w-100 imgSlide" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 ><b>Vision:</b></h5>
                        <p class="lh-1">
                            <b>Ser la empresa de desarrollo de software más confiable
                            y reconocida a nivel Nacional.
                            Nuestra visión es liderar la revolución tecnológica,
                            ofreciendo soluciones de software de vanguardia
                            que transformen la forma en que las empresas
                            y las personas interactúan con la tecnología.</b></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('imagenesSistema/slide5.jpg') }}" class="d-block w-100 imgSlide" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><b>Mision:</b></h5>
                        <p class="lh-1">
                            <b>Como empresa tenemos como misión brindar un servicio de sistemas de software
                            en sectores en los que detectemos una necesidad puntual
                            y llegar a ser reconocidos en distintos mercados
                            o por diferentes empresas gracias a nuestros servicios
                            de software para diferentes índoles.</b></p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <center>
        <div class="card mb-3" style="max-height: 700px;">
            <div class="row g-0">
              <div class="col-md-6">
                <img src="{{ asset('imagenesSistema/imagenEmpresa1.jpg') }}" class="img-fluid rounded-start imgcard" alt="...">
              </div>
              <div class="col-md-6">
                <div class="card-body">
                  <h5 class="card-title text-left"><b>Valores de la empresa:</b></h5>
                    <ul class="card-text text-left">
                        <li>Confidencialidad.</li>
                        <li>Responsabilidad</li>
                        <li>honestidad y etica profesional</li>
                        <li>Trabajo en equipo</li>
                        <li>Compromiso</li>
                        <li>Transparencia</li>
                        <li>Pasion</li>
                        <li>Eficasia</li>
                        <li>Innovacion</li>
                    </ul>
                  <p class="card-text text-left"><small class="text-muted"><b>Nuestro compromiso es tu comodidad</b></small></p>
                </div>
              </div>
            </div>
          </div>
        </center>
    </div>
@endSection

