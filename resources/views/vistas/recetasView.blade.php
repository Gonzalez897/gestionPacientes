@extends('layout.app')

@section('titulo', 'recetas')

@section('contenido')
<style scoped>
    .titulo {
        text-align: center;
    }

    h2 {
        color: white;
    }

    .div3{
        background-color: white;
        
       
    }

   
    p{
        color: black; 
        font-family: 'Courier New', Courier, monospace; 
        
    }
    
    #btn{
        justify-content: center;
        text-align: center
    }
</style>
<div class="titulo">
    <h2>
        ingreso de recetas
    </h2>
</div>

<div class="container">
    <br>
   <div class="div3">
    <form action="">
        <div class="md-3 p-3">
            <label class="form-label text-left" for="idReceta">id receta</label>
            <input type="text" class="form-control" placeholder="ingrese el id de la receta" id="idreceta">
        </div>
        <br>
        <div class="md-3 p-3">
            <label class="form-label" for="nombreR">nombre receta</label>
            <input type="text" class="form-control" placeholder="ingree el nombre de la receta" id="nombreR">
        </div>
        <br>
        <div class="md-3 p-3">
            <label class="form-label" for="tipoR">tipo de receta</label>
            <input type="text" class="form-control" placeholder="ingree el tipo de receta" id="tipoR">
        </div>
        <br>
        <div class="md-3 p-3">
            <label for="description">descripcion</label>
            <textarea class="form-control" name="" id="description" cols="30" rows="10" placeholder="describa la receta"></textarea>
        </div>
        <br>
        <div class="md-3" id="btn">
            <button type="button" class="btn btn-outline-primary ">ingresar receta</button>
        </div>
    </form>
   </div>
</div>

@endsection