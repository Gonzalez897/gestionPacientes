@extends('layout.app')

@section('titulo', 'Consultas')

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
        <b>Actualizar consultas</b>
    </h2>
    
    <center>
        <br>
        <!--form-->
        <div class="card" style="width:1000px">
            <div class="card-body">
                <form action="/vistas/Consultas/consultasUpdate/{{$consultas->idConsultas}}" method="post" class="row g-3 needs-validation">
                    @method('put')
                    @csrf
                    <div class="col-md-4">
                        <label class="form-label"><b>Nombre de la consulta</b></label>
                        <input type="text-tarea" class="form-control" name="nombre_consultas" value="{{$consultas->nombre_consultas}}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label"><b>Descripcion de Sintomas</b></label>
                        <input type="text-tarea" class="form-control" name="descripcion" value="{{$consultas->descripcion}}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label"><b>Fecha de la consultas</b></label>
                        <div class="input-group has-validation">
                            <input type="date" class="form-control" name="f_cosnulta"
                                value="{{$consultas->f_consultas}}">
                        </div>
                    </div>

                    <div class="col-12">
                        Paciente:
                        <br>
                        <select name="idPacientes" class="form-control" disabled>
                            @foreach ($pacientes as $item)
                                @if ($consultas->idPacientes===$item->idPacientes)
                                <option selected value="{{$consultas->idPacientes}}">
                                    {{$item->nombre_paciente}}
                                    {{$item->apellido_paciene}}
                                </option>
                                @endif                                
                            @endforeach
                        </select>
                        @error('idPacientes')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="col-12">
                        Doctores:
                        <br>
                        <select name="idDoctores" class="form-control">
                            @foreach ($doctores as $item)
                                @if ($consultas->idDoctores===$item->idDoctores)
                                <option selected value="{{$item->idDoctores}}">
                                    {{$item->nombre}}
                                    {{$item->apellido}}
                                </option>
                                @else
                                <option value="{{$item->idDoctores}}">
                                    {{$item->nombre}}
                                    {{$item->apellido}}
                                </option>
                                @endif

                            @endforeach
                        </select>
                        @error('idDoctores')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Actualizar consulta</button>
                    </div>
            </div>
            </form>
    </center>


@endsection