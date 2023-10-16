@extends('layout.app')

@section('titulo', 'login')

@section('contenido')
<style scoped>
    h2 {
        text-align: center;
        color: white;
        margin-top: 100px;
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
        <form action="/loginValidar" method="POST" autocomplete="off">
            @csrf
            <div class="mb-3 p-3">
                <label  class="form-label text-left" for="email">Usuario</label>
                <input class="form-control" type="text" name="usuario" id="email" placeholder="ingrese su usuario">
                @error('usuario')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3 p-3">
                <label class="form-label text-left"  for="password">contraseña</label>
                <input class="form-control" type="password" name="clave" id="password" placeholder="ingrese su contraseña">
                @error('clave')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="btnlogin">
                <input type="submit" class="btn btn-primary" value="Enviar datos">
            </div>
        </form>
     </div>
</div>

@endSection
