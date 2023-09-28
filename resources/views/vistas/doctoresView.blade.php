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
<br><br>
<br><br>
<div class="container">
    <div class="div1">
         <form action="">
            <div class="mb-3 p-3">
                <label class="form-label text-left" for="name">nombre</label>
                <input  class="form-control" type="text" id="name" placeholder="ingrese su nombre">
            </div>

            <div class="mb-3 p-3">
                <label  class="form-label" for="apellido">apellido</label>
                <input  class="form-control" type="text" id="apellido" placeholder="ingrese su apellido">
            </div>

            <div class="mb-3 p-3">
                <label class="form-label" for="dui">dui</label>
                <input class="form-control" type="text" id="dui" placeholder="ingrese su dui">
            </div>

            <div class="mb-3 p-3">
                <label class="form-label" for="cargo">cargo</label>
                <input class="form-control" type="text" id="cargo" placeholder="ingrese su cargo">
            </div>

            <div class="md-3" id="btn">
                <button type="button" class="btn btn-outline-primary ">ingresar doctor</button>
            </div>
         </form>

    </div>
</div>
@endsection