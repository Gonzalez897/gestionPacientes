@extends('layout.app')

@section('titulo', 'consulta empleados')

@section('contenido')

    <h3 class="text-center">
        Listado de empleados
    </h3>
    <br>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11" id="divTablaEmpleados">
                <table id="empleadosTabla" class="table table-dark">
                    <thead>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DUI</th>
                        <th>Cargo</th>
                        <th>Fecha de nacimiento</th>
                        <th>Usuario</th>
                        <th>Rol</th>
                        @if (Auth::user()->estado == 'superusuario')
                            <th>Correo Electronico</th>
                            <th>Acciones</th>
                        @endif
                    </thead>
                    <tbody>
                        @foreach ($empleados as $valor)
                            @if (Auth::user()->estado == 'superusuario')
                                <tr>
                                    <td>{{ $valor->nombre }}</td>
                                    <td>{{ $valor->apellido }}</td>
                                    <td>{{ $valor->dui }}</td>
                                    <td>{{ $valor->cargo }}</td>
                                    <td>{{ $valor->f_nacimiento }}</td>
                                    <td>{{ $valor->name }}</td>
                                    <td>{{ $valor->estado }}</td>
                                    <td>{{ $valor->email }}</td>
                                    <td>
                                        <a class="btn btn-primary"
                                            href="/empleado/edit/{{ $valor->idEmpleados }}">Modificar</a>
                                        &nbsp;&nbsp;&nbsp;
                                        <button type="button"
                                            url="{{ route('empleadoDelete', ['empleado' => $valor->idEmpleados]) }}"
                                            onclick="eliminar(this)" token="{{ csrf_token() }}"
                                            class="btn btn-danger">Eliminar</button>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td>{{ $valor->nombre }}</td>
                                    <td>{{ $valor->apellido }}</td>
                                    <td>{{ $valor->dui }}</td>
                                    <td>{{ $valor->cargo }}</td>
                                    <td>{{ $valor->f_nacimiento }}</td>
                                    <td>{{ $valor->name }}</td>
                                    <td>{{ $valor->estado }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style scoped>
        h3 {
            padding: 10px;
            background-color: cornflowerblue;
            color: white;
            width: 35%;
            margin: 0px auto;
            border-radius: 15px;
        }

        #divTablaEmpleados {
            background-color: whitesmoke;
            width: 99%;
            padding-top: 10px;
        }
    </style>
    <script>
        $(document).ready(function() {

            $('select[name="empleadosTabla_length"]').addClass('form-control');
            $('input[type="search"]').addClass('form-control');
        });
    </script>
@endSection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/eliminar.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('.dataTables_empty').text("No hay ningun usuario");
        });
    </script>
@endsection
