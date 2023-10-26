@extends('layout.app')

@section('titulo', 'Doctores')

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
            <b>Consulta de Doctores</b>
        </h3>
        <br>

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-11" id="divTablaEmpleados">
                    <table id="tablaCitas" class="table table-hover table-bordered table-dark table-striped mt-2">
                        <thead>
                            <tr>
                                <td>Nombre del Doctor</td>
                                <td>Apellido del doctor</td>
                                <td>Cargo</td>
                                <td>Especializacion</td>
                                <td>Dosponibilidad</td>
                                <td>Fecha de creacion</td>
                                @if (Auth::user()->estado == 'superusuario' || Auth::user()->estado == 'Doctor')
                                    <td>Acciones</td>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctores as $item)
                                <tr>
                                    <td>{{ $item->nombreD }}</td>
                                    <td>{{ $item->apellidoD }}</td>
                                    <td>{{ $item->cargo }}</td>
                                    <td>{{ $item->especializacion }}</td>
                                    <td>{{ $item->disponibilidad }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    @if (Auth::user()->estado == 'superusuario' || Auth::user()->estado == 'Doctor')
                                        <td>
                                            <a href="/vistas/Doctores/doctoresEdit/{{ $item->idDoctores }}"
                                                class="btn btn-danger btn-sm">Modificar</a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
