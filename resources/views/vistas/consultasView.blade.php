@extends('layout.app')

@section('titulo', 'Consultas')

@section('contenido')
<style scoped>
    .titulo {
        text-align: center;
    }

    h2 {
        color: white;
    }

    .div2{
        background-color: white;
       
    }

    

    p{
        color: black; 
        font-family: 'Courier New', Courier, monospace; 
        
    }
    .boton{
        justify-content: center
    }

    .boton{
        text-align: center;
    }
</style>
<div class="titulo">
    <h2>
        ingreso de consultas
    </h2>
</div>

<div class="container">
    <div class="div2">
        <form action="">
            <div class="mb-3 p-3">
                <label class="form-label tet-left" for="idconsulta">id consulta</label>
                <input class="form-control" type="text"  id="idconsulta" >
            </div>
            <div class="mb-3 p-3">
                <label class="form-label" for="nombreConsul">nombre consulta</label>
                <input type="text" class="form-control" placeholder="ingrese nombre de la consulta" id="nombreConsul">
            </div>
            <div class="p-3">
                <label class="form-label" for="descripcion">descripcion</label>
                <textarea placeholder="describa sus sintomas" class="form-control" id="descripcion" cols="30" rows="10"></textarea>
            </div>

            <div class="mb-3 p-3">
                <label class="form-label" for="nombreConsul">fecha consulta</label>
                <input type="text" class="form-control" placeholder="ingrese fecha de la cunsulta">
            </div>
            <div class="boton">
                <button type="button" class="btn btn-outline-primary">ingresar consulta</button>
            </div>
        </form>
    </div>
</div>
<br><br>
@endsection