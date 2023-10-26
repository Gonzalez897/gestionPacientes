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
    <center>
        <br>
        <!--form-->
        <h3>
            <b>Ingreso de Citas</b>
        </h3>
        <br>
    <br>
            <!--form-->
            <div class="card" style="width:1000px">
                <div class="card-body">
                    <form action="/vistas/Citas/citasStore" method="post" class="row g-3 needs-validation">
                        @csrf


                        <div class="col-md-6">
                            <label class="form-label"><b>Motivo</b></label>
                            <input type="text-tarea" class="form-control" name="motivo" value="{{ old('motivo') }}"
                                placeholder="Digite el motivo">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label"><b>Fecha de la cita</b></label>
                            <div class="input-group has-validation">
                                <input type="date" class="form-control" name="fecha_cita"
                                    value="{{ old('fecha_cita') }}">
                            </div>
                        </div>

                        <div class="col-12">
                            Paciente:
                            <br>
                            <select name="fkPaciente" class="form-control">
                                <option value="">~</option>
                                @foreach ($pacientes as $valor)
                                    @if (old('fkPaciente') == $valor->idPacientes)
                                        <option selected value="{{ $valor->idPacientes }}">{{ $valor->nombre_paciente }}
                                        </option>
                                    @else
                                        <option value="{{ $valor->idPacientes }}">{{ $valor->nombre_paciente }}</option>
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
                                <option value="">~</option>
                                @foreach ($doctores as $valor)
                                    @if (old('fkDoctores') == $valor->idDoctores)
                                        <option selected value="{{ $valor->idDoctores }}">{{ $valor->nombre }}</option>
                                    @else
                                        <option value="{{ $valor->idDoctores }}">{{ $valor->nombre }}</option>
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
                            <button class="btn btn-primary" type="submit">Ingresar cita</button>
                        </div>
                </div>
                </form>
        </center>

    @endsection
