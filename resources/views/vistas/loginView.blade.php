@extends('layout.app')

@section('titulo', 'login')

@section('contenido')
<style scoped>
    h2 {
        text-align: center;
        color: white;
    }

    .div4{
        background-color: white;
    }
 
    .btnlogin{
        text-align: center;
    }
    
</style>
<h2>
   Bienvenido al sistema
</h2>
<div class="container">
     <div class="div4">
        <form action="">
            <div class="mb-3 p-3">
                <label  class="form-label text-left" for="email">correo electronico</label>
                <input class="form-control" type="text" id="email" placeholder="ingrese su correo electronico">
            </div>

            <div class="mb-3 p-3">
                <label class="form-label text-left"  for="password">contraseña</label>
                <input class="form-control" type="password" id="password" placeholder="ingrese su contraseña">
            </div>

            <div class="btnlogin">
                <button type="button" class="btn btn-outline-success">iniciar session</button>
            </div>
        </form>
     </div>
</div>

@endSection