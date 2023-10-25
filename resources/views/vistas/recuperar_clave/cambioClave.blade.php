@extends('layout.app')

@section('titulo', 'Cambio de clave')

@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card">
                    <form action="{{ route('updatePassword') }}" method="post" autocomplete="off">
                        @method('put')
                        @csrf
                        <div class="card-header">
                            <h2 class="text-center mt-2">Restablecer contraseña</h2>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email }}">
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-5">
                                    <span class="h5">Nueva contraseña:</span>
                                    <input type="password" name="nuevsClave" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <input type="submit" value="Enviar" class="form-control btn btn-primary col-2   ">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
