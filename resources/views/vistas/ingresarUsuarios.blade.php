@extends('layout.app')

@section('titulo', 'Ingreso Usuarios')

@section('contenido')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-7">
                <div class="card">
                    <form action="{{ route('userInsert') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="card-header">
                            <h3 class="text-center text-dark mt-2">
                                Ingreso de Usuarios
                            </h3>
                        </div>
                        <div class="card-body row justify-content-center">
                            <div class="col-6">
                                <span>Nombre usuarios</span><span class="text-danger">*</span>
                                <br>
                                <input class="form-control" type="text" name="usuario" value="{{ old('usuario') }}">
                                @error('usuario')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br>
                                <span>Constraseña</span><span class="text-danger">*</span>
                                <br>
                                <input class="form-control" type="password" name="clave" value="{{ old('clave') }}">
                                @error('clave')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <span>Correo Electronico</span><span class="text-danger">*</span>
                                <br>
                                <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br>
                                <span>Confirmar Contraseña</span><span class="text-danger">*</span>
                                <br>
                                <input class="form-control" type="password" name="conf_clave"
                                    value="{{ old('conf_clave') }}">
                                @error('conf_clave')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <input type="submit" value="Enviar Datos" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
