<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <style>
        #div1 {
            background-color: #def8f9;
        }

        #barraNavegacion {
            background-color: #2596be;
            justify-content: left;
        }

        .links {
            color: white;
            padding: 15px;
        }

        .links:hover {
            padding: 15px;
            background-color: gray;
            border-radius: 15px;
        }
    </style>

    {{-- fonts --}}
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    {{-- vite --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body style="background-color: #3140ac">

    <nav class="navbar navbar-expand-sm" id="barraNavegacion">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="/" style="margin-left: 15px">
            <img src="{{ asset('imagenesSistema/imagenEmpresa3.jpg') }}" alt="logo" style="width: 60px;">
        </a>

        <!-- Links -->
        <ul class="navbar-nav ms-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="/usersIngreso"><span class="links">Ingreso de usuarios</span></a>
                </li>
            @else
                @if (Auth::user()->estado == 'Doctor')
                    <li class="nav-item">
                        <a class="nav-link" href="/"><span class="links">Inicio</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/consultas"><span class="links">Consultas</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/vistas/Doctores/doctoresShow"><span class="links">Doctores</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown"><span class="links">Citas</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/vistas/Citas/citasCreate">Crear Citas</a></li>
                            <li><a class="dropdown-item" href="/vistas/Citas/citasShow">Ver Citas Creadas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown"><span class="links">Recetas</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/vistas/Recetas/recetasCreate">Crear Recetas</a></li>
                            <li><a class="dropdown-item" href="/vistas/Recetas/recetasShow">Ver Recetas Creadas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown"><span class="links">Pacientes</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/vistas/Pacientes/pacientesCreate">Ingresar Pacientes</a>
                            </li>
                            <li><a class="dropdown-item" href="/vistas/Pacientes/pacientesShow">Ver Pacientes Ingresados</a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (Auth::user()->estado == 'Secretaria')
                    <li class="nav-item">
                        <a class="nav-link" href="/"><span class="links">Inicio</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/consultas"><span class="links">Consultas</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown"><span class="links">Citas</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/vistas/Citas/citasCreate">Crear Citas</a></li>
                            <li><a class="dropdown-item" href="/vistas/Citas/citasShow">Ver Citas Creadas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown"><span class="links">Pacientes</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/vistas/Pacientes/pacientesCreate">Ingresar Pacientes</a>
                            </li>
                            <li><a class="dropdown-item" href="/vistas/Pacientes/pacientesShow">Ver Pacientes
                                    Ingresados</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/vistas/Doctores/doctoresShow"><span class="links">Doctores</span></a>
                    </li>
                @endif

                @if (Auth::user()->estado == 'Empleado')
                    <li class="nav-item">
                        <a class="nav-link" href="/vistas/Doctores/doctoresShow"><span class="links">Doctores</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown"><span class="links">Empleados</span></a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/consultaEmpleados">Consultar empleados</a></li>
                        </ul>
                    </li>
                @endif

                @if (Auth::user()->estado == 'superusuario')
                    <li class="nav-item">
                        <a class="nav-link" href="/"><span class="links">Inicio</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/consultas"><span class="links">Consultas</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/vistas/Doctores/doctoresShow"><span class="links">Doctores</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown"><span class="links">Citas</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/vistas/Citas/citasCreate">Crear Citas</a></li>
                            <li><a class="dropdown-item" href="/vistas/Citas/citasShow">Ver Citas Creadas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown"><span class="links">Recetas</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/vistas/Recetas/recetasCreate">Crear Recetas</a></li>
                            <li><a class="dropdown-item" href="/vistas/Recetas/recetasShow">Ver Recetas Creadas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown"><span class="links">Pacientes</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/vistas/Pacientes/pacientesCreate">Ingresar Pacientes</a>
                            </li>
                            <li><a class="dropdown-item" href="/vistas/Pacientes/pacientesShow">Ver Pacientes
                                    Ingresados</a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (Auth::user()->estado == 'Secretaria')
                    <li class="nav-item">
                        <a class="nav-link" href="/"><span class="links">Inicio</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/consultas"><span class="links">Consultas</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown"><span class="links">Citas</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/vistas/Citas/citasCreate">Crear Citas</a></li>
                            <li><a class="dropdown-item" href="/vistas/Citas/citasShow">Ver Citas Creadas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown"><span class="links">Pacientes</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/vistas/Pacientes/pacientesCreate">Ingresar Pacientes</a>
                            </li>
                            <li><a class="dropdown-item" href="/vistas/Pacientes/pacientesShow">Ver Pacientes
                                    Ingresados</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/vistas/Doctores/doctoresShow"><span class="links">Doctores</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                            data-bs-toggle="dropdown"><span class="links">Empleados</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/formEmpleado">Ingresar empleados</a></li>
                            <li><a class="dropdown-item" href="/consultaEmpleados">Consultar empleados</a></li>
                        </ul>
                    </li>
                @endif
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span class="links">{{ Auth::user()->name }}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Cerrar Sesion
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </nav>
    <br>
    @yield('contenido')
    @yield('scripts')
</body>

</html>
