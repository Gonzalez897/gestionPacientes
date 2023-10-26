@extends('layout.app')

@section('titulo', 'Doctores')

@section('contenido')
    <style scoped>
        h2 {
            text-align: center;
            color: white;
        }

        .div1 {
            background-color: white;
        }

        p {
            color: black;
            font-family: 'Courier New', Courier, monospace
        }

        #btn {
            text-align: center;
        }
    </style>
    <h2>
        Actualizacion de doctores
    </h2>
    <center>
        <div class="card" style="width:1000px">
            <div class="card-body">
                <form action="/vistas/Doctores/doctoresUpdate/{{ $doctores->idDoctores }}" method="post"
                    class="row g-3 needs-validation">
                    @method('put')
                    @csrf
                    <div class="col-md-4">
                        <label class="form-label"><b>Nombre del doctor </b></label>
                            @foreach ($empleados as $item)
                                @if ($doctores->idEmpleados===$item->idEmpleados)
                                <input type="text" disabled class="form-control" name="nombre" value="{{$item->nombre}}">    
                                @endif                                
                            @endforeach
                    </div>
                    
                    <div class="col-md-4">
                        <label class="form-label"><b>Apellido del doctor</b></label>
                        @foreach ($empleados as $item)
                                @if ($doctores->idEmpleados===$item->idEmpleados)
                                <input type="text" disabled class="form-control" name="nombre" value="{{$item->apellido}}">    
                                @endif                                
                            @endforeach
                    </div>
                    <div class="col-md-4">
                        <label class="form-label"><b>Cargo</b></label>
                        @foreach ($empleados as $item)
                                @if ($doctores->idEmpleados===$item->idEmpleados)
                                <input type="text" disabled class="form-control" name="nombre" value="{{$item->cargo}}">    
                                @endif                                
                            @endforeach
                    </div>
                    <div class="col-md-4">
                        <label class="form-label"><b>Especializacion</b></label>
                        <input type="text" class="form-control" name="especializacion" value="{{$doctores->especializacion}}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label"><b>Disponibilidad</b></label>
                        <select name="disponibilidad" class="form-control">
                            @if ($doctores->disponibilidad=='Disponible')
                                <option selected value="{{$doctores->disponibilidad}}">{{$doctores->disponibilidad}}</option>                                
                                <option value="No disponible">No disponible</option>
                            @else
                                <option value="Disponible">Disponible</option>                                
                                <option selected value="No disponible">No disponible</option>
                            @endif
                        </select>
                    </div>


                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Actualizar Doctor</button>
                    </div>

                </form>
            </div>
        </div>
    </center>
@endsection
