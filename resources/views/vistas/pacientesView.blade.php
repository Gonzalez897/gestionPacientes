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
    
</style>
<div>
    <h2>
       <b>Ingreso de Pacientes</b>
    </h2>
        <!--Cuerpo de pagina-->
        <center>
        <br>
        <!--form-->
          <div class="card" style="width:1000px">
            <div class="card-body">
              <form class="row g-3 needs-validation" novalidate>
                <div class="col-md-4">
                  <label class="form-label"><b>Nombre Paciente</b></label>
                  <input type="text" class="form-control" id="nombrePaciente" value="" required placeholder="Nombre">
                </div>
    
                <div class="col-md-4">
                  <label class="form-label"><b>Apellido Paciente</b></label>
                  <input type="text" class="form-control" id="apellidoPaciente" value="" required placeholder="Apellido">
                </div>
                
                <div class="col-md-4">
                  <label for="validationCustomUsername" class="form-label"><b>Numero de DUI</b></label>
                  <div class="input-group has-validation">
                    <span class="input-group-text">N</span>
                    <input type="text" class="form-control" id="dui" required placeholder="00000000-0">
                  </div>
                </div>
    
    
              <center>
                 <div class="col-md-4">
                  <label class="form-label"><b>Edad Paciente</b></label>
                  <input type="number" class="form-control" id="edadPaciente" value="" required placeholder="Edad">
                </div>
              </center>
        
                <div></div>
    
                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Ingresar cita</button>
                </div>
        </div>
        
        </center>

@endsection