@extends('layout.app')

@section('titulo', 'Recetas')

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
        <b>Ingresar Recetas</b>
    </h3>
    <br>
           <!--form-->
            <div class="card" style="width:1000px">
                <div class="card-body">
                    <form action="/vistas/Recetas/recetasStore" method="post" class="row g-3 needs-validation">
                        @csrf

                        
                        <div class="col-12">
                            Consultas: 
                            <br>
                            <select name="idConsultas" class="form-control" id="consultaId">
                                    <option value="">~</option>
                                @foreach ($consultas as $valor)
                                    @if (old('idConsultas') == $valor->id)
                                    <option selected value="{{ $valor->id }}">{{ $valor->nombre}}
                                        </option>
                                    @else
                                        <option value="{{ $valor->id }}">{{ $valor->nombre}}</option>
                                    @endif
                                @endforeach
                                
                            </select>
                            @error('idConsultas')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="form-label"><b>Nombre del Doctor</b></label>
                                <input type="text" class="form-control" disabled id="nombre"> 
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><b>Nombre del paciente</b></label>
                            <input type="text" disabled class="form-control" id="nombreP">    
                            
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><b>Edad del paciente</b></label>
                            <input type="number" class="form-control" id="edad" disabled>
                        </div>
                        

                        <div class="col-md-6">
                            <label class="form-label"><b>Diagnostico</b></label>
                            <input type="text" class="form-control" name="tipo_receta" value="{{ old('tipo_receta') }}">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label"><b>Descripcion tratamiento</b></label>
                            <input type="text-tarea" class="form-control" name="descripcion_tratamiento" value="{{ old('descripcion_tratamiento') }}">
                        </div>


                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Ingresar receta</button>
                        </div>
                    </form>
                </div>
            </div>
                
        </center>
</div>
    @endsection

@section('scripts')
<script>
        $(document).ready(function(){
            $('#consultaId').change(function() {
                var selectedValue = $(this).val();
                
                console.log(selectedValue)
                $.ajax({
                    type: 'GET',
                    url: 'recetasfind/' + selectedValue,
                    success: function(data) {
                        // Rellena los campos de input con los datos obtenidos
                        console.log(data)
                        $('#nombre').val(data[0].nombreD);
                        $('#nombreP').val(data[0].nombreP);
                        $('#edad').val(data[0].edad);
                    },
                    error:function(e){
                        console.log(e);
                    }
                });
            });
        });
</script>
@endsection