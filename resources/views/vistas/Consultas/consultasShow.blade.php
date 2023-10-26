@extends('layout.app')

@section('titulo', 'Consultas')

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
            <b>Listado de consultas</b>
        </h3>
        <br>
    <br>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11" id="divTablaEmpleados">
                <table id="tablaConsultas" class="table table-hover table-bordered table-dark table-striped mt-2">
                    <thead>
                        <tr>
                            <td>Nombre de la consulta</td>
                            <td>Descripcion de sintomas</td>
                            <td>Fecha de la consulta</td>
                            <td>Nombre y Apellido del Paciente</td>
                            <td>Nombre y Apellido del Doctor</td>
                            <td>Especializacion</td>
                            <td>Fecha de creacion</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consultas as $item)
                            <tr>
                                <td>{{ $item->nombre_consultas }}</td>
                                <td>{{ $item->descripcion }}</td>
                                <td>{{ $item->f_consulta }} {{ $item->ApellidoP }}</td>
                                <td>{{ $item->nombre_paciente }} {{ $item->apellido_paciene }}</td>
                                <td>{{ $item->nombre }} {{ $item->apellido }}</td>
                                <td>{{ $item->especializacion }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="/vistas/Consultas/consultasEdit/{{ $item->idConsultas }}"
                                        class="btn btn-primary btn-sm">Modificar</a>
                                    <button class="btn btn-danger btn-sm"
                                        url="/vistas/Consultas/consultasDestroy/{{ $item->idConsultas }}" onclick="eliminar(this)"
                                        token="{{ csrf_token() }}">Eliminar</button>
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
