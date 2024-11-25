<style>
    .letras{
        color:#fff;
    }
</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="boxicons/css/boxicons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Biblioteca UPPue</title>
</head>
<body>
    <div class="box">
        <div class="container">
            <div class="top-header">
                <span>Biblioteca UPPue</span>
                <header>Iniciar Sesión</header>
            </div>
            <form action="{{ route('validar') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field()}}
                <div class="input-field">
                    <input type="text" class="input" name = 'correo'placeholder="Correo" required>
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-field">
                    <input type="password" class="input" name = 'password' placeholder="Contraseña" required>
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-field">
                    <input type="submit" class="submit" value="Inicio">
                </div>
                @if (Session::has('mensaje'))
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: "{{ Session::get('mensaje') }}",
                            confirmButtonText: 'Aceptar'
                        });
                    </script>
                @endif
                <!--<tr>
                <td>
                    <label class="letras">¿Olvidaste tu contraseña?</label>
                    <a href="{{ route('newpassword') }}">Clic aquí</a>
                </td>
                </tr>-->
                <tr>
                    <td>
                    <label class="letras">Recuperacion por URL</label> 
                    <a href= "{{route('newpassword2')}}" >Clic Aqui</a> 
                    </td>
                </tr>
            </form>
        </div>
    </div>
</body>
</html>
