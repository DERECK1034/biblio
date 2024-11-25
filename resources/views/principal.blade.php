<!DOCTYPE html>
<html lang="en">
    <style>
        .navbar-brand {
            font-family:"Times New Roman", serif;
        }

        .navbar-menu a{
            font-family:"Times New Roman", serif;
        }
        .close-sesion {
        width: 24px; 
        height: 24px; 
        color: white; 
    }
    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.2/sweetalert2.min.css">

<!-- SweetAlert JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.7.2/sweetalert2.min.js"></script>

</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">Biblioteca UPPue</div>
        <ul class="navbar-menu">
            <li><a href="{{ route('inicio') }}">Inicio</a></li>
            <li><a href="{{ route('libros') }}">Libros</a></li>
            <li><a href="{{ route('alumnos') }}">Usuarios</a></li>
            <li><a href="{{ route('perfil') }}">Mi perfil</a></li>
            <li><a href="{{ ('cerrarsesion') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="close-sesion">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                </svg>
                </a>
            </li>
        </ul>
    </nav>
    @yield('contenido')
</body>
</html>
