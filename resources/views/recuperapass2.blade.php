<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recupera Contraseña</title>
    
    <!-- Link to external CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- jQuery Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <style>
        /* Estilos adicionales */
        body {
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 400px;
            padding: 30px;
            margin: 0 auto;
            text-align: center;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 1.8em;
            margin-bottom: 20px;
            color: #333333;
        }

        label {
            font-size: 1em;
            color: #666666;
            margin-bottom: 10px;
            display: inline-block;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #dddddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 1em;
            color: #333;
        }

        input[type="button"] {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="button"]:hover {
            background-color: #45a049;
        }

        #mensaje {
            margin-top: 15px;
            font-weight: bold;
            color: #4CAF50;
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#recupera").click(function() {
                $("#mensaje").load('{{url('validauser2')}}' + '?' + $(this).closest('form').serialize());
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <h1>Recupera Contraseña</h1>
        <form id="formu">
            <label for="correo">Introduce un correo:</label>
            <input type="text" name="correo" id="correo" placeholder="correo@ejemplo.com" required>
            <input type="button" value="Recuperar" id="recupera">
        </form>
        <div id="mensaje"></div>
    </div>
</body>
</html>
