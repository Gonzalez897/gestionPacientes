@extends('layout.app')

@section('titulo', 'Recetas')

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
        <!--Cuerpo de pagina-->
        <center>
            <br>
            <!--form-->
            <h3>
                <b>Listado de Recetas</b>
            </h3>
            <br>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-11" id="divTablaEmpleados">
                        <table id="tablaRecetas" class="table table-hover table-bordered table-dark table-striped mt-2">
                            <thead>
                                <tr>
                                    <td>Nombre del doctor</td>
                                    <td>Nombre del paciente</td>
                                    <td>Edad del paciente</td>
                                    <td>Diagnostico</td>
                                    <td>Tratamiento</td>
                                    <td>Fecha de creacion</td>
                                    <td>Acciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recetas as $item)
                                    <tr>
                                        <td>{{ $item->Doctor }}</td>
                                        <td>{{ $item->NombrePaciente }}</td>
                                        <td>{{ $item->edadPaciente }}</td>
                                        <td>{{ $item->Diagnostico }}</td>
                                        <td>{{ $item->Tratamiento }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="/vistas/Recetas/recetasEdit/{{ $item->idRecetas }}"
                                                class="btn btn-primary btn-sm">Modificar</a>
                                            <button class="btn btn-danger btn-sm"
                                                url="/vistas/Recetas/recetasDestroy/{{ $item->idRecetas }}"
                                                onclick="eliminar(this)" token="{{ csrf_token() }}">Eliminar</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </center>

    @endsection

    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('js/eliminar.js') }}"></script>
    @endsection
