<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reinicio de Contraseña</title>
    
    <!-- Enlace a CSS personalizado -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Bibliotecas de jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- Estilos adicionales para complementar el diseño -->
    <style>
        .container {
            max-width: 400px;
            margin: 5% auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        body {
            background-image: url("../archivos/libro.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            background-attachment: fixed;
            }
        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }
        form input[type="password"], 
        form input[type="button"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }
        form input[type="button"] {
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        form input[type="button"]:hover {
            background-color: #45a049;
        }
        #mensaje {
            margin-top: 15px;
            font-weight: bold;
            color: #333;
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#guardar").click(function() {
                $("#mensaje").load('{{url('cambiapass')}}' + '?' + $(this).closest('form').serialize());
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <h1>Reinicio de Contraseña</h1>
        
        <form>
            <input type="hidden" name="idu" value="{{$idu}}">
            
            <label for="pass">Introduce nueva contraseña</label>
            <input type="password" name="pass" id="pass" placeholder="Nueva contraseña" required>
            
            <label for="pass2">Confirma nueva contraseña</label>
            <input type="password" name="pass2" id="pass2" placeholder="Confirmar contraseña" required>
            
            <input type="button" id="guardar" value="Guardar">
        </form>
        
        <div id="mensaje"></div>
    </div>
</body>
</html>
