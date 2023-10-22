@extends('layout.app')

@section('titulo', 'consulta empleados')

@section('contenido')

<h3 class="text-center">
    Listado de empleados
</h3>
<br>
<div>
    <table id="empleadosTabla" class="table table-dark">
        <thead>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DUI</th>
            <th>Cargo</th>
            <th>Fecha de nacimiento</th>
            <th>Usuario</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach ($empleados as $valor)
                <tr>
                    <td>{{ $valor->nombre }}</td>
                    <td>{{ $valor->apellido }}</td>
                    <td>{{ $valor->dui }}</td>
                    <td>{{ $valor->cargo }}</td>
                    <td>{{ $valor->f_nacimiento }}</td>
                    <td>{{ $valor->name }}</td>
                    <td>
                        <a class="btn btn-primary" href="/empleado/edit/{{ $valor->idEmpleados }}">Modificar</a>
                        &nbsp;&nbsp;&nbsp;
                        <button type="button" url="" token="{{ csrf_token() }}" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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

    div {
        margin: 0px auto;
        background-color: whitesmoke;
        width: 99%;
    }
</style>
@endSection