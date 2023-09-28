@extends('layout.app')

@section('titulo', 'consulta empleados')

@section('contenido')
<style scoped>
    h2 {
        text-align: center;
        color: white;
    }

    .div4{
        background-color: white;
    }

    #btnC{
        text-align: center;
    }
    
</style>
<h2>
   Consulta de empleados
</h2>
<div class="container">
    <div class="div4">
        <form action="">
            <div class="mb-3 p-3">
                <label class="form-label text-left " for="name">nombre</label>
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

            <div class="mb-3 p-3 ">
                <label class="form-label" for="cargo">usuario</label>
                <input class="form-control" type="text" id="cargo" placeholder="ingrese su usuario">
            </div>

            <div class="mb-3 p-3">
                <label class="form-label" for="cargo">cargo</label>
                <input class="form-control" type="text" id="cargo" placeholder="ingrese su cargo">
            </div>


            <div class="md-3" id="btnC">
                <button type="button" class="btn btn-outline-danger ">Consultar empleado</button>
            </div>
         </form>

    </div>
</div>

@endSection