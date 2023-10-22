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
        <b>Cosulta de citas</b>
    </h2>

    <table id="tablaCitas" class="table table-hover table-bordered table-dark table-striped mt-2">
        <thead>
        <tr>
            <td>ID</td>
            <td>Nombre de la cita</td>
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
        <td>{{$item->idCitas}}</td>
        <td>{{$item->nombre_cita}}</td>
        <td>{{$item->motivo}}</td>
        <td>{{$item->fecha_cita}}</td>
        <td>{{$item->NombreP}} {{$item->ApellidoP}}</td>
        <td>{{$item->Doctor}} {{$item->DoctorA}}</td>
        <td>{{$item->Especializacion}}</td>
        <td>{{$item->created_at}}</td>
        <td>
            <a href="/vistas/Citas/citasEdit/{{$item->idCitas}}" class="btn btn-danger btn-sm">Modificar</a>
            <button class="btn btn-danger btn-sm" url="/vistas/Citas/citasDestroy/{{$item->idCitas}}" onclick="eliminar(this)" token="{{ csrf_token() }}">Eliminar</button>
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