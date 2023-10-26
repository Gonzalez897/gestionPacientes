<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <style>
        /* The side navigation menu */
        .sidebar {
            margin: 0;
            padding: 0;
            width: 200px;
            background-color: darkslateblue;
            position: fixed;
            height: 100%;
            overflow: auto;
            text-align: left;
        }

        /* Sidebar links */
        .sidebar a {
            display: block;
            color: black;
            padding: 12px;
            text-decoration: none;
            text-align: left;
        }

        .sidenav a,
        .dropdown-btn {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 15px;
            color: #818181;
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
            color: #f1f1f1;
        }

        /* Main content */
        .main {
            margin-left: 200px;
            /* Same as the width of the sidenav */
            font-size: 15px;
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
            background-color: #262626;
            padding-left: 8px;
        }

        /* Optional: Style the caret down icon */
        .fa{
            float: right;
            padding-right: 8px;
        }

        /* Active/current link */
        .sidebar a.active {
            background-color: black;
            color: white;
        }

        /* Links on mouse-over */
        .sidebar a:hover:not(.active) {
            background-color: black;
            color: white;
        }

        /* Page content. The value of the margin-left property should match the value of the sidebar's width property */
        div.content {
            margin-left: 200px;
            padding: 1px 16px;
            height: 1000px;
        }

        /* On screens that are less than 700px wide, make the sidebar into a topbar */
        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                float: left;
            }

            div.content {
                margin-left: 0;
            }
        }

        /* On screens that are less than 400px, display the bar vertically, instead of horizontally */
        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
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

<body style="background-color: black">
    <!-- The sidebar -->
    <div class="sidebar sidenav">
        <!-- Brand/logo -->
        <a href="/" style="margin: auto">
            <img src="{{ asset('imagenesSistema/imagenEmpresa3.jpg') }}" alt="logo" style="width: 100px;">
        </a>
        @guest
            <a class="nav-link" href="/usersIngreso"> <i class="fa fa-solid fa-user"></i>&nbsp<span class="links">Registro de usuarios</span></a>
        @else
            <a class="nav-link" href="/"> <i class="fa fa-solid fa-house"></i>&nbsp<span class="links">Inicio</span></a>
            <a class="nav-link" href="/consultas"><i class=" fa fa-regular fa-circle-user"></i><span class="links">Consultas</span></a>
            <a class="nav-link" href="/vistas/Doctores/doctoresShow"><i class="fa fa-solid fa-user-doctor"></i><span class="links">Doctores</span></a>

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
    <div class="content main">
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
