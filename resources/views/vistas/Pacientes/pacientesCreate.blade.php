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

        .div2 {
            background-color: white;

        }

        .container {
            text-align: center
        }

        p {
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
            <b>Ingresar Pacientes</b>
        </h3>
        <br>
            <!--form-->
            <div class="card" style="width:1000px">
                <div class="card-body">
                    <form action="/vistas/Pacientes/pacientesStore" method="post" class="row g-3 needs-validation">
                        @csrf

                        <div class="col-md-6">
                            <label class="form-label"><b>Nombre Paciente</b></label>
                            <input type="text" class="form-control" name="nombre_paciente" placeholder="Nombre">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label"><b>Apellido Paciente</b></label>
                            <input type="text" class="form-control" name="apellido_paciene" placeholder="Apellido">
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustomUsername" class="form-label"><b>Numero de DUI</b></label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">N</span>
                                <input type="text" class="form-control" name="dui_paciente" placeholder="00000000-0">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label"><b>Edad Paciente</b></label>
                            <input type="number" class="form-control" name="edad_paciente" placeholder="Edad">
                        </div>
                        
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Ingresar Paciente</button>
                        </div>

                    </form>
                </div>
            </div>
        </center>
</div>
@endsection
