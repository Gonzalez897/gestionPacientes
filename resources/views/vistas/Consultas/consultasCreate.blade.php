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
    </style>
    <div>
        <h2>
            <b>Ingreso de consultas</b>
        </h2>

        <!--Cuerpo de pagina-->
        <center>
            <br>
            <!--form-->
            <div class="card" style="width:1000px">
                <div class="card-body">
                    <form action="/vistas/Consultas/consultasStore" method="post" class="row g-3 needs-validation">
                        @csrf


                        <div class="col-md-4">
                            <label class="form-label"><b>Nombre de la consulta</b></label>
                            <input type="text" class="form-control" name="nombre_consultas" value="{{ old('nombre_consultas') }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label"><b>Descripcion de Sintomas</b></label>
                            <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label"><b>Fecha de la consulta</b></label>
                            <div class="input-group has-validation">
                                <input type="date" class="form-control" name="f_consulta"
                                    value="{{ old('f_consulta') }}">
                            </div>
                        </div>

                        <div class="col-12">
                            Paciente:
                            <br>
                            <select name="idPacientes" class="form-control">
                                <option value="">~</option>
                                @foreach ($pacientes as $valor)
                                    @if (old('idPacientes') == $valor->idPacientes)
                                        <option selected value="{{ $valor->idPacientes }}">
                                            {{ $valor->nombre_paciente }}
                                            {{ $valor->apellido_paciene }}
                                        </option>
                                    @else
                                    <option value="{{ $valor->idPacientes }}">
                                        {{ $valor->nombre_paciente }}
                                        {{ $valor->apellido_paciene }}
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
                                <option value="">~</option>
                                @foreach ($doctores as $valor)
                                    @if (old('idDoctores') == $valor->idDoctores)
                                        <option selected value="{{ $valor->idDoctores }}">
                                            {{ $valor->nombre }}
                                            {{ $valor->apellido }}
                                        </option>
                                    @else
                                    <option value="{{ $valor->idDoctores }}">
                                        {{ $valor->nombre }}
                                        {{ $valor->apellido }}
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
                            <button class="btn btn-primary" type="submit">Ingresar consulta</button>
                        </div>
                </div>
                </form>
        </center>

    @endsection
