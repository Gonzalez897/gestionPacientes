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
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="accionRadio"
                                value="seleccionar">
                            <label class="form-check-label" for="radio1">Seleccionar un usuario</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio2" name="accionRadio" value="nuevo">
                            <label class="form-check-label" for="radio2">Nuevo usuario</label>
                        </div>
                        @error('accionRadio')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div id="divSelectUser">
                            <span>Seleccionar el usuario</span>
                            <br>
                            <select name="id_usuario" id="" class="form-control">
                                <option value="">~</option>
                                @foreach ($usuarios as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row" id="nuevoUser">
                            <div class="col-12">
                                <span>Nombre usuario</span><span class="text-danger">*</span>
                                <br>
                                <input class="form-control" type="text" name="usuario" value="{{ old('usuario') }}">
                                @error('usuario')
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
                        <input class="form-control" type="text" name="dui_empleado" value="{{ old('dui_empleado') }}">
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

            $('#radio1').click(function() {

                var seleccionar_usuario = document.querySelector('#radio1');

                if (seleccionar_usuario.checked) {

                    $('#divSelectUser').show();

                    $('#nuevoUser').hide();

                }

            });

            $('#radio2').click(function() {

                var nuevo_usuario = document.querySelector('#radio2');

                if (nuevo_usuario.checked) {

                    $('#divSelectUser').hide();

                    $('#nuevoUser').show();

                }

            });

        });
    </script>
@endsection
