@extends('layout.app')

@section('titulo', 'citas')

@section('contenido')
    <style scoped>
        div {
            text-align: center;
        }

        h2 {
            color: white;
        }

        .div2 {
            background-color: white;

        }

        .container {
            text-align: center
        }

        p {
            color: black;
            font-family: 'Courier New', Courier, monospace;

        }
    </style>
    <div>
        <!--Cuerpo de pagina-->
        <center>
            <br>
            <!--form-->
            <h2>
                <b>Consulta de Recetas</b>
            </h2>
        
            <table id="tablaCitas" class="table table-hover table-bordered table-dark table-striped mt-2">
                <thead>
                <tr>
                    <td>ID</td>
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
                <td>{{$item->idRecetas}}</td>
                <td>{{$item->Doctor}}</td>
                <td>{{$item->NombrePaciente}}</td>
                <td>{{$item->edadPaciente}}</td>
                <td>{{$item->Diagnostico}}</td>
                <td>{{$item->Tratamiento}}</td>
                <td>{{$item->created_at}}</td>
                <td>
                    <a href="/vistas/Recetas/recetasEdit/{{$item->idRecetas}}" class="btn btn-danger btn-sm">Modificar</a>
                    <button class="btn btn-danger btn-sm" url="/vistas/Recetas/recetasDestroy/{{$item->idRecetas}}" onclick="eliminar(this)" token="{{ csrf_token() }}">Eliminar</button>
                </td>
            </tr>  
            @endforeach
            </tbody>
            </table>
        </center>

    @endsection

    @section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/eliminar.js') }}"></script>
@endsection