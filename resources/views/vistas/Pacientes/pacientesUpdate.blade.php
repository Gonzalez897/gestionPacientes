@extends('layout.app')

@section('titulo', 'Pacientes')

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
    h3 {
            padding: 10px;
            background-color: darkslateblue;
            color: white;
            width: 35%;
            margin: 0px auto;
            border-radius: 15px;
        }
</style>
<div class="container-fluid">
    <center>
        <br>
        <!--form-->
        <h3>
            <b>Actualizar Pacientes</b>
        </h3>
        <br>
            <!--form-->
            <div class="card" style="width:1000px">
                <div class="card-body">
                    <form action="/vistas/Pacientes/pacientesUpdate/{{$pacientes->idPacientes}}" method="post" class="row g-3 needs-validation">
                        @csrf
                        @method('put')
                        <div class="col-md-4">
                            <label class="form-label"><b>Nombre Paciente</b></label>
                            <input type="text" class="form-control" name="nombre_paciente" placeholder="Nombre" value="{{$pacientes->nombre_paciente}}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label"><b>Apellido Paciente</b></label>
                            <input type="text" class="form-control" name="apellido_paciene" placeholder="Apellido" value="{{$pacientes->apellido_paciene}}">
                        </div>

                        <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label"><b>Numero de DUI</b></label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">N</span>
                                <input type="text" class="form-control" name="dui_paciente" placeholder="00000000-0" value="{{$pacientes->dui_paciente}}">
                            </div>
                        </div>

                      <center>
                        <div class="col-md-4">
                            <label class="form-label"><b>Edad Paciente</b></label>
                            <input type="number" class="form-control" name="edad_paciente" placeholder="Edad" value="{{$pacientes->edad_paciente}}">
                        </div>
                      </center>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Actualizar Paciente</button>
                        </div>

                    </form>
                </div>
            </div>
        
        </center>
</div>

@endsection