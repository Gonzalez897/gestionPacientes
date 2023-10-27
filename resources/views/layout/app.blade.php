<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        /* Fixed sidenav, full height */
        .sidenav {
            height: 100%;
            width: 200px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: darkslateblue;
            overflow-x: hidden;
            padding-top: 20px;
        }

        /* Style the sidenav links and the dropdown button */
        .sidenav a,
        .dropdown-btn {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 15px;
            color: white;
            display: block;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            outline: none;
        }

        /* On mouse-over */
        .sidenav a:hover,
        .dropdown-btn:hover {
            color: #ffffff;
        }

        /* Main content */
        .main {
            margin-left: 200px;
            /* Same as the width of the sidenav */
            font-size: 13px;
            /* Increased text to enable scrolling */
            padding: 0px 10px;
        }

        /* Add an active class to the active dropdown button */
        .active {
            background-color: black;
            color: white;
        }

        /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
        .dropdown-container {
            display: none;
            background-color: darkslateblue;
            padding-left: 8px;
        }

        /* Optional: Style the caret down icon */
        .fa-caret-down {
            float: right;
            padding-right: 8px;
        }

        /* Some media queries for responsiveness */
        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }
    </style>

    {{-- fonts --}}
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
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

<body style="background-color: rgb(0, 0, 0)">
    <!-- The sidebar -->
    <div class="sidebar sidenav ">
        <!-- Brand/logo -->
        <a href="/" style="margin: auto">
            <img src="{{ asset('imagenesSistema/imagenEmpresa3.jpg') }}" alt="logo" style="width: 100px;">
        </a>
        @guest
            <a class="nav-link" href="/usersIngreso"> <i class="fa fa-solid fa-user"></i>&nbsp<span class="links">Registro
                    de usuarios</span></a>
        @else
            @if (Auth::user()->estado == 'superusuario')
                <a class="nav-link" href="/"> <i class="fa fa-solid fa-house"></i>&nbsp<span
                        class="links">Inicio</span></a>
                <a class="nav-link" href="/vistas/Doctores/doctoresShow"><i class="fa fa-solid fa-user-doctor"></i><span
                        class="links">Doctores</span></a>

                <button class="dropdown-btn">Consultas
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-item" href="/vistas/Consultas/consultasCreate">Crear Consultas</a>
                    <a class="dropdown-item" href="/vistas/Consultas/consultasShow">Ver Consultas Creadas</a>
                </div>

                <button class="dropdown-btn">Citas
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-item" href="/vistas/Citas/citasCreate">Crear Citas</a>
                    <a class="dropdown-item" href="/vistas/Citas/citasShow">Ver Citas Creadas</a>
                </div>

                <button class="dropdown-btn">Recetas
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-item" href="/vistas/Recetas/recetasCreate">Crear Recetas</a>
                    <a class="dropdown-item" href="/vistas/Recetas/recetasShow">Ver Recetas Creadas</a>
                </div>

                <button class="dropdown-btn">Pacientes
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-item" href="/vistas/Pacientes/pacientesCreate">Ingresar Pacientes</a>
                    <a class="dropdown-item" href="/vistas/Pacientes/pacientesShow">Ver Pacientes Ingresados</a>
                </div>

                <button class="dropdown-btn">Empleados
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-item" href="/formEmpleado">Ingresar empleados</a>
                    <a class="dropdown-item" href="/consultaEmpleados">Consultar empleados</a>
                </div>
            @endif

            @if (Auth::user()->estado == 'Doctor')
                <a class="nav-link" href="/"> <i class="fa fa-solid fa-house"></i>&nbsp<span
                        class="links">Inicio</span></a>
                <a class="nav-link" href="/vistas/Doctores/doctoresShow"><i class="fa fa-solid fa-user-doctor"></i><span
                        class="links">Doctores</span></a>

                <button class="dropdown-btn">Consultas
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-item" href="/vistas/Consultas/consultasCreate">Crear Consultas</a>
                    <a class="dropdown-item" href="/vistas/Consultas/consultasShow">Ver Consultas Creadas</a>
                </div>

                <button class="dropdown-btn">Citas
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-item" href="/vistas/Citas/citasCreate">Crear Citas</a>
                    <a class="dropdown-item" href="/vistas/Citas/citasShow">Ver Citas Creadas</a>
                </div>

                <button class="dropdown-btn">Recetas
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-item" href="/vistas/Recetas/recetasCreate">Crear Recetas</a>
                    <a class="dropdown-item" href="/vistas/Recetas/recetasShow">Ver Recetas Creadas</a>
                </div>

                <button class="dropdown-btn">Pacientes
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-item" href="/vistas/Pacientes/pacientesCreate">Ingresar Pacientes</a>
                    <a class="dropdown-item" href="/vistas/Pacientes/pacientesShow">Ver Pacientes Ingresados</a>
                </div>
            @endif

            @if (Auth::user()->estado == 'Secretaria')
                <a class="nav-link" href="/"> <i class="fa fa-solid fa-house"></i>&nbsp<span
                        class="links">Inicio</span></a>
                <a class="nav-link" href="/vistas/Doctores/doctoresShow"><i class="fa fa-solid fa-user-doctor"></i><span
                        class="links">Doctores</span></a>

                <button class="dropdown-btn">Consultas
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-item" href="/vistas/Consultas/consultasCreate">Crear Consultas</a>
                    <a class="dropdown-item" href="/vistas/Consultas/consultasShow">Ver Consultas Creadas</a>
                </div>

                <button class="dropdown-btn">Citas
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-item" href="/vistas/Citas/citasCreate">Crear Citas</a>
                    <a class="dropdown-item" href="/vistas/Citas/citasShow">Ver Citas Creadas</a>
                </div>
            @endif

            @if (Auth::user()->estado == 'Empleado')
                <a class="nav-link" href="/"> <i class="fa fa-solid fa-house"></i>&nbsp<span
                        class="links">Inicio</span></a>
                <a class="nav-link" href="/vistas/Doctores/doctoresShow"><i class="fa fa-solid fa-user-doctor"></i><span
                        class="links">Doctores</span></a>
                <button class="dropdown-btn">Empleados
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-container">
                    <a class="dropdown-item" href="/consultaEmpleados">Consultar empleados</a>
                </div>
            @endif

            <button class="dropdown-btn">{{ Auth::user()->name }}
                <i class="fa fa-solid fa-user"></i>
            </button>
            <div class="dropdown-container">
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

    </div>


    <br>
    <div class="main">
        @yield('contenido')
    </div>
    @yield('scripts')
    <script>
        /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
    </script>
</body>

</html>
