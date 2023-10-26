@extends('layout.app')

@section('titulo', 'Ingreso Empleados')

@section('contenido')
    <form action="{{ route('ingresoEmpleados') }}" method="POST" autocomplete="off">
        @csrf
        <div class="container">
            <div class="card bg-muted">
                <div class="card-header">
                    <h2 class="text-center text-dark mt-2">
                        Ingreso de Empleados
                    </h2>
                </div>
                <div class="card-body row justify-content-center">
                    <div class="col-4">
                        @if (old('accionRadio') == 'seleccionar')
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio1" name="accionRadio"
                                    value="seleccionar" checked>
                                <label class="form-check-label" for="radio1">Seleccionar un usuario</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio2" name="accionRadio"
                                    value="nuevo">
                                <label class="form-check-label" for="radio2">Nuevo usuario</label>
                            </div>
                        @elseif(old('accionRadio') == 'nuevo')
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio1" name="accionRadio"
                                    value="seleccionar">
                                <label class="form-check-label" for="radio1">Seleccionar un usuario</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio2" name="accionRadio"
                                    value="nuevo" checked>
                                <label class="form-check-label" for="radio2">Nuevo usuario</label>
                            </div>
                        @else
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio1" name="accionRadio"
                                    value="seleccionar">
                                <label class="form-check-label" for="radio1">Seleccionar un usuario</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" id="radio2" name="accionRadio"
                                    value="nuevo">
                                <label class="form-check-label" for="radio2">Nuevo usuario</label>
                            </div>
                        @endif
                        @error('accionRadio')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="mt-2" id="divSelectUser">
                            <span>Seleccionar el usuario</span>
                            <br>
                            <select name="id_usuario" class="form-control">
                                <option value="">~</option>
                                @foreach ($usuarios as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('id_usuario')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>
                            <div>
                                <span>Rol del empleado</span><span class="text-danger">*</span>
                                <br>
                                <select name="rol_usuario" class="form-control">
                                    <option value="">~</option>
                                    <option value="Secretaria">Secretaria</option>
                                    <option value="Doctor">Doctor</option>
                                    @if (Auth::user()->estado == 'superusuario')
                                        <option value="superusuario">SuperUsuario</option>
                                    @endif
                                </select>
                            </div>
                            @error('rol_usuario')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mt-2" id="nuevoUser">
                            <div class="col-12">
                                <span>Nombre usuario</span><span class="text-danger">*</span>
                                <br>
                                <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br>
                                <span>Correo Electronico</span><span class="text-danger">*</span>
                                <br>
                                <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                                @error('email')
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
                    </div>
                    <div class="col-3">
                        <span>Nombre del empleado</span><span class="text-danger">*</span>
                        <br>
                        <input class="form-control" type="text" name="nombre_empleado"
                            value="{{ old('nombre_empleado') }}">
                        @error('nombre_empleado')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <span>Apellido del empleado</span><span class="text-danger">*</span>
                        <br>
                        <input class="form-control" type="text" name="apellido_empleado"
                            value="{{ old('apellido_empleado') }}">
                        @error('apellido_empleado')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <span>Dui del empleado</span><span class="text-danger">*</span>
                        <br>
                        <input class="form-control" type="text" name="dui_empleado"
                            value="{{ old('dui_empleado') }}">
                        @error('dui_empleado')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-4">
                        <span>Cargo del empleado</span><span class="text-danger">*</span>
                        <br>
                        <select class="form-control" name="cargo_empleado" id="selectCargo">
                            @if (old('cargo_empleado') == 'Empleado')
                                <option value="">~</option>
                                <option value="Empleado" selected>Empleado</option>
                                <option value="Secretaria">Secretaria</option>
                                <option value="Doctor">Doctor</option>
                            @endif
                            @if (old('cargo_empleado') == 'Secretaria')
                                <option value="">~</option>
                                <option value="Empleado">Empleado</option>
                                <option value="Secretaria" selected>Secretaria</option>
                                <option value="Doctor">Doctor</option>
                            @endif
                            @if (old('cargo_empleado') == 'Doctor')
                                <option value="">~</option>
                                <option value="Empleado">Empleado</option>
                                <option value="Secretaria">Secretaria</option>
                                <option value="Doctor" selected>Doctor</option>
                            @endif
                            @if (!old('cargo_empleado'))
                                <option value="">~</option>
                                <option value="Empleado">Empleado</option>
                                <option value="Secretaria">Secretaria</option>
                                <option value="Doctor">Doctor</option>
                            @endif
                        </select>
                        @error('cargo_empleado')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <span>Fecha de nacimiento</span><span class="text-danger">*</span>
                        <br>
                        <input class="form-control" type="date" name="fecha_nacimiento" id=""
                            value="{{ old('fecha_nacimiento') }}">
                        @error('fecha_nacimiento')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <div id="divEspecializacion">
                            <span>Especializacion:</span><span class="text-danger">*</span>
                            <br>
                            <input class="form-control" type="text" name="especializacion"
                                value="{{ old('especializacion') }}">
                            @error('especializacion')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <input type="submit" value="Enviar Datos" class="btn btn-primary">
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
                </div>
            </div>
        </div>
    </form>
    <script>
        $(document).ready(function() {

            $('#divSelectUser').hide();

            $('#divAlerta').fadeOut(3500);

            $('#nuevoUser').hide();

            $('#divEspecializacion').hide();

            var seleccionar_usuario = document.querySelector('#radio1');

            var nuevo_usuario = document.querySelector('#radio2');

            if (seleccionar_usuario.checked) {

                $('#divSelectUser').show();

                $('#nuevoUser').hide();

            } else if (nuevo_usuario.checked) {

                $('#divSelectUser').hide();

                $('#nuevoUser').show();

            }

            $('#radio1').click(function() {

                if (seleccionar_usuario.checked) {

                    $('#divSelectUser').show();

                    $('#nuevoUser').hide();

                }

            });

            $('#radio2').click(function() {

                if (nuevo_usuario.checked) {

                    $('#divSelectUser').hide();

                    $('#nuevoUser').show();

                }

            });

            $('#selectCargo').change(function() {

                if ($(this).val() == "Doctor") {
                    $('#divEspecializacion').show();
                } else {
                    $('#divEspecializacion').hide();
                }

            });

        });
    </script>
@endsection
