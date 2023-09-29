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
<div class="container">
    <form action="/busquedaEmpleados" post="POST" autocomplete="off">
        <div class="card">
            <div class="card-header text-center">
                <span class="h2">Consulta de Empleados</span>
            </div>
            <div class="card-body" style="background-color: #2471A3">
                <div class="row">
                    <div class="col-12 text-light">
                        <div class="row">
                            <div class="col-3">
                                <span>Nombre del Empleado</span>
                                <br>
                                <input type="text" name="nombre" class="form-control" placeholder="Ingrese el apellido del empleado">
                            </div>
                            <div class="col-3 offset-1">
                                <span>Apellido del Empleado</span>
                                <br>
                                <input type="text" name="apellido" class="form-control" placeholder="Ingrese el apellido del empleado">
                            </div>
                            <div class="col-3 offset-1">
                                <span>Dui del empleado</span>
                                <br>
                                <input type="text" name="dui" class="form-control" placeholder="00000000-0" maxlength="9" id="">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-3">
                                <span>Cargo del empleado</span>
                                <br>
                                <select name="cargo" id="" class="form-control">
                                    <option value="">~</option>
                                    <option value="Empleado">Empleado</option>
                                    <option value="Secretaria">Secretaria</option>
                                    <option value="Doctor">Doctor</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <input type="submit" value="Enviar consulta" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>

@endSection