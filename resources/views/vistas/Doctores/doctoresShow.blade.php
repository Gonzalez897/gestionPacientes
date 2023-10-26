@extends('layout.app')

@section('titulo', 'Doctores')

@section('contenido')
<style scoped>
    h2{
        text-align: center;
        color: white;
    }

    .div1{
        background-color: white;
    }
    p{
        color: black;
        font-family: 'Courier New', Courier, monospace
    }
    #btn{
        text-align: center;
    }
</style>
<h2>
    Consulta de doctores 
</h2>
<table id="tablaCitas" class="table table-hover table-bordered table-dark table-striped mt-2">
    <thead>
    <tr>
        <td>ID</td>
        <td>Nombre del Doctor</td>
        <td>Apellido del doctor</td>
        <td>Cargo</td>
        <td>Especializacion</td>
        <td>Dosponibilidad</td>
        <td>Fecha de creacion</td>
        <td>Acciones</td>
    </tr>
</thead>
<tbody>
@foreach ($doctores as $item)
<tr>
    <td>{{$item->idDoctores}}</td>
    <td>{{$item->nombreD}}</td>
    <td>{{$item->apellidoD}}</td>
    <td>{{$item->cargo}}</td>
    <td>{{$item->especializacion}}</td>
    <td>{{$item->disponibilidad}}</td>
    <td>{{$item->created_at}}</td>
    <td>
        <a href="/vistas/Doctores/doctoresEdit/{{$item->idDoctores}}" class="btn btn-danger btn-sm">Modificar</a>
    </td>
</tr>  
@endforeach
</tbody>
</table>
@endsection