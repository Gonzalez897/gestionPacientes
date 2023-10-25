@extends('layout.app')

@section('titulo', 'Olvido la contraseña')

@section('contenido')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card">
                    <form action="{{ route('verificarCorreo') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="card-header">
                            <h2 class="text-center mt-2">Recuperacion de contraseña</h2>
                        </div>
                        <div class="card-body">
                            <h5>
                                Para proceder a la realizacion de cambio de su contraseña,
                                primero debe ingresar su correo que ingreso cuando se registro en el sistema
                                para asi verificar que es usted
                            </h5>
                            <hr>
                            <span class="h5">Correo electronico:</span>
                            <br>
                            <input type="email" name="correoElectronico" class="form-control col-8">
                        </div>
                        <div class="card-footer text-center">
                            <input type="submit" value="Enviar" class="form-control btn btn-primary col-2   ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-6" align="center">
                @if (session('mensaje'))
                    <div class="alert alert-danger" id="divAlerta">
                        {{ session('mensaje') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $('#divAlerta').fadeOut(3500);
        });
    </script>
@endsection
