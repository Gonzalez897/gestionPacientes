@extends('layout.app')

@section('titulo', 'Citas')

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
            <b>Listados de Citas</b>
        </h3>
        <br>
    <br>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11" id="divTablaEmpleados">
                <table id="tablaCitas" class="table table-hover table-bordered table-dark table-striped mt-2">
                    <thead>
                        <tr>
                            <td>Motivo de la cita</td>
                            <td>Fecha de la cita</td>
                            <td>Nombre Paciente</td>
                            <td>Nombre Doctor</td>
                            <td>Especializacion</td>
                            <td>Fecha de creacion</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($citas as $item)
                            <tr>
                                <td>{{ $item->motivo }}</td>
                                <td>{{ $item->fecha_cita }}</td>
                                <td>{{ $item->NombreP }} {{ $item->ApellidoP }}</td>
                                <td>{{ $item->Doctor }} {{ $item->DoctorA }}</td>
                                <td>{{ $item->Especializacion }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="/vistas/Citas/citasEdit/{{ $item->idCitas }}"
                                        class="btn btn-primary btn-sm">Modificar</a>
                                    <button class="btn btn-danger btn-sm"
                                        url="/vistas/Citas/citasDestroy/{{ $item->idCitas }}" onclick="eliminar(this)"
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
