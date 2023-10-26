@extends('layout.app')

@section('titulo', 'Cambio de clave')

@section('contenido')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-7">
                @if (session('token') != '')
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
                                <div class="row justify-content-center">
                                    <div class="col-11">
                                        <div class="row">
                                            <div class="col-12">
                                                <span class="h6">Nueva contraseña:</span>
                                                <input type="password" name="nuevaClave" class="form-control"
                                                value="{{ old('nuevaClave') }}">
                                            </div>
                                            @error('nuevaClave')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="col-12 mt-4">
                                                <span class="h6">Confirmar contraseña:</span>
                                                <input type="password" name="confClave" class="form-control"
                                                value="{{ old('confClave') }}">
                                            </div>
                                            @error('confClave')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <input type="submit" value="Enviar" class="form-control btn btn-primary col-2   ">
                            </div>
                        </form>
                    </div>
                    @else
                    <div class="card bg-danger text-center">
                        <div class="card-header">
                            <span class="h5 text-light">Hubo un error en el proceso</span>
                        </div>
                        <div class="card-body">
                            <p class="text-light">
                                El proceso de restauracion de contraseña ha expirado, solicitamos que
                                regrese a la pagina anterior para que puedar realizar nuevamente la
                                restauracion de su contraseña.
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
