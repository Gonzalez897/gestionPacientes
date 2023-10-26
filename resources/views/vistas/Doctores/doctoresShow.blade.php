@extends('layout.app')

@section('titulo', 'Doctores')

@section('contenido')
    <style scoped>
        h2 {
            text-align: center;
            color: white;
        }

        .div1 {
            background-color: white;
        }

        p {
            color: black;
            font-family: 'Courier New', Courier, monospace
        }

        #btn {
            text-align: center;
        }
    </style>
    <h2>
        Consulta de doctores
    </h2>
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
@endsection
