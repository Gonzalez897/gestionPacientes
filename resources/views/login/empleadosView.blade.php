@extends('layout.app')

@section('titulo', 'Ingreso Empleados')

@section('contenido')
<h2 class="text-center text-light">
    Ingreso de Empleados
</h2>
<form action="{{ route('ingresoEmpleados') }}" method="POST" autocomplete="off">
    @csrf
    <div class="container">
        <div class="card bg-muted">
            <div class="card-body row">
                <div class="col-3">
                    <span>Nombre usuarios</span>
                    <br>
                    <input  class="form-control" type="text" name="usuario" value="{{ old('usuario') }}">
                    @error('usuario')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                    <br>
                    <span>Constraseña</span>
                    <br>
                    <input class="form-control" type="password" name="clave" value="{{ old('clave') }}">
                    @error('clave')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <span>Confirmar Contraseña</span>
                    <br>
                    <input  class="form-control" type="password" name="conf_clave" value="{{ old('conf_clave') }}">
                    @error('conf_clave')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    @error('estado_usuario')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        
                    @enderror
                </div>
                <div class="col-3">
                    <span>Nombre del empleado</span>
                    <br>
                    <input   class="form-control" type="text" name="nombre_empleado" value="{{ old('nombre_empleado') }}">
                    @error('nombre_empleado')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <span>Apellido del empleado</span>
                    <br>
                    <input class="form-control" type="text" name="apellido_empleado" value="{{ old('apellido_empleado') }}">
                    @error('apellido_empleado')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <span>Dui del empleado</span>
                    <br>
                    <input class="form-control" type="text" name="dui_empleado" value="{{ old('dui_empleado') }}">
                    @error('dui_empleado')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <span>Cargo del empleado</span>
                    <br>
                    <select class="form-control"  name="cargo_empleado" id="">
                        @if (old('cargo_empleado') == "Empleado")
                        <option value="">~</option>
                        <option value="Empleado" selected>Empleado</option>
                        <option value="Secretaria">Secretaria</option>
                        <option value="Doctor">Doctor</option>
                        @endif
                        @if (old('cargo_empleado') == "Secretaria")
                        <option value="">~</option>
                        <option value="Empleado">Empleado</option>
                        <option value="Secretaria" selected>Secretaria</option>
                        <option value="Doctor">Doctor</option>
                        @endif
                        @if (old('cargo_empleado') == "Doctor")
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
                    <span>Fecha de nacimiento</span>
                    <br>
                    <input class="form-control" type="date" name="fecha_nacimiento" id="" value="{{ old('fecha_nacimiento') }}">
                    @error('fecha_nacimiento')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-4">
                    <span class="text-danger">si su cargo es doctor, ingrese su especialidad</span><br>
                    <span class="h5">especialidad</span>
                    <br>
                    <input class="form-control" type="text" name="especialidad" value="{{ old('especialidad') }}">
                    @error('especialidad')
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
    </div>
</form>
@endsection