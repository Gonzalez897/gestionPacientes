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
    <div>
        <!--Cuerpo de pagina-->
        <center>
            <br>
            <!--form-->
            <h3>
                <b>Actualizar Recetas</b>
            </h3>
            <br>
            <!--form-->
            <div class="card" style="width:1000px">
                <div class="card-body">
                    <form action="/vistas/Recetas/recetasUpdate/{{$recetas->idRecetas}}" method="post" class="row g-3 needs-validation">
                        @method('put')
                        @csrf

                        <div class="col-md-4">
                            <label class="form-label"><b>Diagnostico</b></label>
                            <input type="text" class="form-control" name="tipo_receta" value="{{$recetas->tipo_receta}}">
                        </div>
                        
                        <div class="col-md-4">
                            <label class="form-label"><b>Descripcion tratamiento</b></label>
                            <input type="text-tarea" class="form-control" name="descripcion_tratamiento" value="{{$recetas->descripcion_tratamiento}}">
                        </div>


                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Actualizar receta</button>
                        </div>

                    </form>
                </div>
            </div>
        </center>

    @endsection
