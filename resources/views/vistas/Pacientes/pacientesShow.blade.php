@extends('layout.app')

@section('titulo', 'Pacientes')

@section('contenido')
<style scoped>
    div {
        text-align: center;
    }

    h2 {
        color: white;
    }

    .div2{
        background-color: white;
       
    }

    .container{
        text-align: center
    }

    p{
        color: black; 
        font-family: 'Courier New', Courier, monospace; 
        
    }
    
</style>
<div>
    <h2>
        <b>Cosultar Pacientes</b>
    </h2>

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
        <td>{{$item->nombre_paciente}}</td>
        <td>{{$item->apellido_paciene}}</td>
        <td>{{$item->dui}}</td>
        <td>{{$item->edad_paciente}}</td>
        <td>
            <a href="/vistas/Pacientes/pacientesEdit/{{$item->idPacientes}}" class="btn btn-danger btn-sm">Modificar</a>
            <button class="btn btn-danger btn-sm" url="/vistas/Pacientes/pacientesDestroy/{{$item->idPacientes}}" onclick="eliminar(this)" token="{{ csrf_token() }}">Eliminar</button>
        </td>
    </tr>  
    @endforeach
    </tbody>
    </table>
    
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/eliminar.js') }}"></script>
@endsection