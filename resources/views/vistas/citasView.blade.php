@extends('layout.app')

@section('titulo', 'citas')

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
        ingreso de citas
    </h2>
</div>

<body style="background-color: #3140ac;">


    <!--Cuerpo de pagina-->
    <center>
    
    <br>
    


    <!--form-->
      <div class="card" style="width:1000px">
        <div class="card-body">
          <form class="row g-3 needs-validation" novalidate>
            <div class="col-md-4">
              <label for="validationCustom01" class="form-label"><b>Nombre Paciente</b></label>
              <input type="text" class="form-control" id="validationCustom01" value="" required placeholder="Nombre">
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-4">
              <label for="validationCustom02" class="form-label"><b>Apellido Paciente</b></label>
              <input type="text" class="form-control" id="validationCustom02" value="" required placeholder="Apellido">
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            
            <div class="col-md-4">
              <label for="validationCustomUsername" class="form-label"><b>Numero de DUI</b></label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">N</span>
                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required placeholder="00000000-0">
                <div class="invalid-feedback">
                  Please choose a username.
                </div>
              </div>
            </div>


          <center>
             <div class="col-md-4">
              <label for="validationCustom02" class="form-label"><b>Edad Paciente</b></label>
              <input type="number" class="form-control" id="validationCustom02" value="" required placeholder="Edad">
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
          </center>
    
            <div></div>

            <div class="col-12">
              <button class="btn btn-primary" type="submit">Ingresar cita</button>
            </div>
    </div>
    
    </center>

@endsection