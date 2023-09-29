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
        <b>Ingreso de citas</b>
    </h2>

        <!--Cuerpo de pagina-->
<center>
    <br>
    <!--form-->
    <div class="card" style="width:1000px">
        <div class="card-body">
             <form action="/vistas/Citas/citasStore" method="post" class="row g-3 needs-validation">
                @csrf
                <div class="col-md-4">
                      <label class="form-label"><b>Nombre Cita</b></label>
                      <input type="text" class="form-control" name="nombre_cita" value="" required>
                </div>
        
                <div class="col-md-4">
                      <label class="form-label"><b>Motivo</b></label>
                      <input type="text-tarea" class="form-control" name="motivo" value="" required placeholder="Digite el motivo">
                </div>
                    
                    <div class="col-md-4">
                      <label class="form-label"><b>Fecha de la cita</b></label>
                      <div class="input-group has-validation">
                        <input type="date" class="form-control" name="fecha_cita" required>
                      </div>
                    </div>
        
                    <div class="col-12">
                      <button class="btn btn-primary" type="submit">Ingresar cita</button>
                    </div>
            </div>
</center>

@endsection