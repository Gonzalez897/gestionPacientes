@extends('layout.app')

@section('titulo', 'Pacientes')

@section('contenido')
    <style scoped>
        h3 {
            padding: 10px;
            background-color: darkslateblue;
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
        <center>
            <br>
            <!--form-->
            <h3>
                <b>Consulta de Pacientes</b>
            </h3>
            <br>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11" id="divTablaEmpleados">
                <table id="tablaPacientes" class="table table-hover table-bordered table-dark table-striped mt-2">
                    <thead>
                        <tr>
                            <td>Nombre del paciente</td>
                            <td>Apellido del pacientes</td>
                            <td>Dui</td>
                            <td>Edad</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pacientes as $item)
                            <tr>
                                <td>{{ $item->nombre_paciente }}</td>
                                <td>{{ $item->apellido_paciene }}</td>
                                <td>{{ $item->dui_paciente }}</td>
                                <td>{{ $item->edad_paciente }}</td>
                                <td>
                                    <a href="/vistas/Pacientes/pacientesEdit/{{ $item->idPacientes }}"
                                        class="btn btn-danger btn-sm">Modificar</a>
                                    <button class="btn btn-danger btn-sm"
                                        url="/vistas/Pacientes/pacientesDestroy/{{ $item->idPacientes }}"
                                        onclick="eliminar(this)" token="{{ csrf_token() }}">Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/eliminar.js') }}"></script>
@endsection
