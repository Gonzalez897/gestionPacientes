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
        }

        .links {
            color: white;
        }

        .links:hover{
            padding: 15px;
            background-color: gray;
            border-radius: 15px;
        }
    </style>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background-color: #3140ac">
    <div id="div1" align="center">
        <img src="{{ asset('imagenesSistema/imagenEmpresa1.jpg') }}" alt="" style="height: 120px; width: 30%">
    </div>
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
        </ul>
    </nav>
    <br>
    @yield('contenido')
</body>
</html>