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
        <b>Actualizar citas</b>
    </h2>
    
    <center>
        <br>
        <!--form-->
        <div class="card" style="width:1000px">
            <div class="card-body">
                <form action="/vistas/Citas/citasUpdate/{{$citas->idCitas}}" method="post" class="row g-3 needs-validation">
                    @method('put')
                    @csrf
                    <div class="col-md-4">
                        <label class="form-label"><b>Nombre Cita</b></label>
                        <input type="text" class="form-control" name="nombre_cita" value="{{$citas->nombre_cita}}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label"><b>Motivo</b></label>
                        <input type="text-tarea" class="form-control" name="motivo" value="{{$citas->motivo}}"
                            placeholder="Digite el motivo">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label"><b>Fecha de la cita</b></label>
                        <div class="input-group has-validation">
                            <input type="date" class="form-control" name="fecha_cita"
                                value="{{$citas->fecha_cita}}">
                        </div>
                    </div>

                    <div class="col-12">
                        Paciente:
                        <br>
                        <select name="fkPaciente" class="form-control" disabled>
                            @foreach ($pacientes as $item)
                                @if ($citas->idPacientes===$item->idPacientes)
                                <option selected value="{{$citas->idPacientes}}">{{$item->nombre_paciente}}</option>
                                @endif                                
                            @endforeach
                        </select>
                        @error('fkPaciente')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="col-12">
                        Doctores:
                        <br>
                        <select name="fkDoctores" class="form-control">
                            @foreach ($doctores as $item)
                                @if ($citas->idDoctores===$item->idDoctores)
                                <option selected value="{{$item->idDoctores}}">{{$item->nombre}}</option>
                                @else
                                <option value="{{$item->idDoctores}}">{{$item->nombre}}</option>
                                @endif

                            @endforeach
                        </select>
                        @error('fkDoctores')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Actualizar cita</button>
                    </div>
            </div>
            </form>
    </center>


@endsection