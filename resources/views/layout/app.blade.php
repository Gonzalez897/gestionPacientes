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

        .links:hover{
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
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/"><span class="links">Inicio</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/consultas"><span class="links">Consultas</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/doctores"><span class="links">Doctores</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown"><span class="links">citas</span></a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/citasCreate">Crear Citas</a></li>
                    <li><a class="dropdown-item" href="/citasShow">Ver Citas Creadas</a></li>
                    <li><a class="dropdown-item" href="/citasUpdate">Actualizar Citas Creadas</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/recetas"><span class="links">recetas</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/Pacientes"><span class="links">Pacientes</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login"><span class="links">login</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown">mostrar mas..</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/formEmpleado">ingresar empleados</a></li>
                  <li><a class="dropdown-item" href="/consultaEmpleados">consultar empleados</a></li>
                </ul>
              </li>
        </ul>
    </nav>
    <br>
    @yield('contenido')
</body>
</html>