@extends('layout.app')

@section('titulo', 'Actualizar Empleados')

@section('contenido')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('userUpdate', ['user' => $empleado_datos[0]->id]) }}" method="post"
                            autocomplete="off">
                            @method('put')
                            @csrf
                            <div class="card">
                                <div class="card-header mt-2 text-center">
                                    <h4>Actualizar Usuario</h4>
                                </div>
                                <div class="card-content camposActualizar">
                                    <div class="row">
                                        <div class="col-6">
                                            <span>Nombre usuarios:</span>
                                            <br>
                                            @if (old('usuario'))
                                                <input class="form-control" type="text" name="usuario"
                                                    value="{{ old('usuario') }}">
                                            @else
                                                <input class="form-control" type="text" name="usuario"
                                                    value="{{ $empleado_datos[0]->name }}">
                                            @endif
                                            @error('usuario')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <br>
                                            @if ($empleado_datos[0]->estado == 'superusuario')
                                                <span>Nueva Constraseña:</span>
                                                <br>
                                                <input class="form-control" type="password" name="clave"
                                                    value="{{ old('clave') }}">
                                                @error('clave')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <br>
                                                <span>Confirmar Contraseña:</span>
                                                <br>
                                                <input class="form-control" type="password" name="conf_clave"
                                                    value="{{ old('conf_clave') }}">
                                                @error('conf_clave')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            @endif
                                        </div>
                                        <div class="col-6">
                                            <span>Correo Electronico</span>
                                            <br>
                                            @if (old('email'))
                                                <input class="form-control" type="email" name="email"
                                                    value="{{ old('email') }}">
                                            @else
                                                <input class="form-control" type="email" name="email"
                                                    value="{{ $empleado_datos[0]->email }}">
                                            @endif
                                            @error('email')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <br>
                                            <span>Rol del usuario</span>
                                            <br>
                                            <select name="rol_usuario" class="form-control">
                                                <option value="">~</option>
                                                @if ($empleado_datos[0]->estado == 'Secretaria')
                                                    <option value="Secretaria" selected>Secretaria</option>
                                                    <option value="Doctor">Doctor</option>
                                                    <option value="Empleado">Empleado</option>
                                                @endif
                                                @if ($empleado_datos[0]->estado == 'Doctor')
                                                    <option value="Secretaria">Secretaria</option>
                                                    <option value="Doctor"selected>Doctor</option>
                                                    <option value="Empleado">Empleado</option>
                                                @endif
                                                @if ($empleado_datos[0]->estado == 'Empleado')
                                                    <option value="Secretaria">Secretaria</option>
                                                    <option value="Doctor">Doctor</option>
                                                    <option value="Empleado" selected>Empleado</option>
                                                @endif
                                                @if ($empleado_datos[0]->estado == 'superusuario')
                                                    <option value="Secretaria">Secretaria</option>
                                                    <option value="Doctor">Doctor</option>
                                                    <option value="Empleado">Empleado</option>
                                                    <option value="superusuario" selected>Superusuario</option>
                                                @endif
                                            </select>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <input type="submit" value="Actualizar" class="btn btn-primary btnActualizar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <form action="{{ route('empleadoUpdate', ['empleado' => $empleado_datos[0]->idEmpleados]) }}"
                            method="post" autocomplete="off">
                            @method('put')
                            @csrf
                            <div class="card">
                                <div class="card-header mt-2 text-center">
                                    <h4>
                                        Actualizar Empleado
                                    </h4>
                                </div>
                                <div class="card-content">
                                    <div class="row camposActualizar">
                                        <div class="col-6">
                                            <span>Nombre del empleado</span>
                                            <br>
                                            @if (old('nombre_empleado'))
                                                <input class="form-control" type="text" name="nombre_empleado"
                                                    value="{{ old('nombre_empleado') }}">
                                            @else
                                                <input class="form-control" type="text" name="nombre_empleado"
                                                    value="{{ $empleado_datos[0]->nombre }}">
                                            @endif
                                            @error('nombre_empleado')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <br>
                                            <span>Apellido del empleado</span>
                                            <br>
                                            @if (old('apellido_empleado'))
                                                <input class="form-control" type="text" name="apellido_empleado"
                                                    value="{{ old('apellido_empleado') }}">
                                            @else
                                                <input class="form-control" type="text" name="apellido_empleado"
                                                    value="{{ $empleado_datos[0]->apellido }}">
                                            @endif
                                            @error('apellido_empleado')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <br>
                                            <span>Dui del empleado</span>
                                            <br>
                                            @if (old('dui_empleado'))
                                                <input class="form-control" type="text" name="dui_empleado"
                                                    value="{{ old('dui_empleado') }}">
                                            @else
                                                <input class="form-control" type="text" name="dui_empleado"
                                                    value="{{ $empleado_datos[0]->dui }}">
                                            @endif
                                            @error('dui_empleado')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <span>Cargo del empleado</span>
                                            <br>
                                            <select class="form-control" name="cargo_empleado" id="selectCargo">
                                                @if (old('cargo_empleado') == 'Empleado' || $empleado_datos[0]->cargo == 'Empleado')
                                                    <option value="">~</option>
                                                    <option value="Empleado" selected>Empleado</option>
                                                    <option value="Secretaria">Secretaria</option>
                                                    <option value="Doctor">Doctor</option>
                                                @endif
                                                @if (old('cargo_empleado') == 'Secretaria' || $empleado_datos[0]->cargo == 'Secretaria')
                                                    <option value="">~</option>
                                                    <option value="Empleado">Empleado</option>
                                                    <option value="Secretaria" selected>Secretaria</option>
                                                    <option value="Doctor">Doctor</option>
                                                @endif
                                                @if (old('cargo_empleado') == 'Doctor' || $empleado_datos[0]->cargo == 'Doctor')
                                                    <option value="">~</option>
                                                    <option value="Empleado">Empleado</option>
                                                    <option value="Secretaria">Secretaria</option>
                                                    <option value="Doctor" selected>Doctor</option>
                                                @endif
                                            </select>
                                            @error('cargo_empleado')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <br>
                                            <span>Fecha de nacimiento</span>
                                            <br>
                                            @if (old('fecha_nacimiento'))
                                                <input class="form-control" type="date" name="fecha_nacimiento"
                                                    id="" value="{{ old('fecha_nacimiento') }}">
                                            @else
                                                <input class="form-control" type="date" name="fecha_nacimiento"
                                                    id="" value="{{ $empleado_datos[0]->f_nacimiento }}">
                                            @endif
                                            @error('fecha_nacimiento')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <br>
                                            <div id="especialidadDoctor">
                                                <span class="text-danger">si su cargo es doctor, ingrese su
                                                    especialidad</span><br>
                                                <span class="h5">especialidad</span>
                                                <br>
                                                @if (old('especialidad'))
                                                    <input class="form-control" type="text" name="especialidad"
                                                        value="{{ old('especialidadUpdate') }}">
                                                @else
                                                    <input class="form-control" type="text" name="especialidad"
                                                        value="{{ $empleado_datos[0]->especializacion }}">
                                                @endif
                                                @error('especialidad')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <input type="submit" value="Actualizar" class="btn btn-primary btnActualizar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-6" align="center">
                @if (session('mensaje'))
                    <div class="alert alert-success" id="divAlerta">
                        {{ session('mensaje') }}
                    </div>
                @endif
                <a href="{{ route('consultaEmpleados') }}" class="btn btn-success">Volver a la pagina de consultas</a>
            </div>
        </div>
    </div>
    <br>
    <style scoped>
        .camposActualizar {
            padding: 20px;
        }

        .btnActualizar {
            width: 30%;
        }
    </style>
    <script>
        $(document).ready(function() {

            $('#divAlerta').fadeOut(3500);

            $('#especialidadDoctor').hide();

            if ($('#selectCargo').val() == "Doctor") {

                $('#especialidadDoctor').show();

            }
        });
    </script>
@endsection
