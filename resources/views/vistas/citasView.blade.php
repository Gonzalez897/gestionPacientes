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
        ingreso de citas
    </h2>

    <div class="container">
        <div class="div2">
            <form action="">
                <div class="mb-3 p-3">
                    <label class="form-label tet-left" for="idcita">Id cita</label>
                    <input class="form-control" type="text"  id="idcita" >
                </div>
                <div class="mb-3 p-3">
                    <label class="form-label" for="nombreCita">Nombre cita</label>
                    <input type="text" class="form-control" placeholder="ingrese nombre de la cita" id="nombreCita">
                </div>
                <div class="p-3">
                    <label class="form-label" for="motivo">Motivo</label>
                    <textarea placeholder="describa sus sintomas" class="form-control" id="motivo" cols="30" rows="10"></textarea>
                </div>
    
                <div class="mb-3 p-3">
                    <label class="form-label" for="fechaCita">Fecha cita</label>
                    <input type="date" id="fechaCita" class="form-control">
                </div>
                <div class="boton">
                    <button type="button" class="btn btn-outline-primary">Ingresar cita</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection