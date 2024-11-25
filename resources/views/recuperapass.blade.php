<html>
    <head>
    <link rel="stylesheet" href="css/style.css">
        <style>

            center {
                background-color: rgba(255, 255, 255, 0.9);
                padding: 20px;
                border-radius: 15px;
                box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
                width: 40%;
                margin: 100px auto;
            }

            h1 {
                font-size: 30px;
                color: #3e2723;
                text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            }

            input[type="text"], input[type="button"] {
                width: 80%;
                padding: 10px;
                margin: 10px 0;
                border-radius: 5px;
                border: 1px solid #3e2723;
            }

            input[type="button"].btn-info {
                background-color: #b0bec5;
                color: #3e2723;
                cursor: pointer;
            }

            input[type="button"].btn-success {
                background-color: #795548;
                color: white;
                cursor: pointer;
            }

            input[type="button"]:hover {
                background-color: #6d4c41;
            }

            #mensaje {
                margin-top: 20px;
                font-size: 18px;
            }

            img {
                border: 2px solid #4b3b29;
                border-radius: 5px;
            }
        </style>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function() {
                $("#reinicia").click(function() {
                    $.ajax({
                        url: '{{url('validauser')}}',
                        type: 'GET',
                        data: $('#formu').serialize(),
                        success: function(response) {
                            $("#mensaje").html(response);
                        },
                        error: function() {
                            $("#mensaje").html("Error al procesar la solicitud.");
                        }
                    });
                });
                
                $("#otro").click(function() {
                    $.ajax({
                        url: '{{url('captchanuevo')}}',
                        type: 'GET',
                        success: function(response) {
                            $("#seleccionacaptcha").html(response);
                        },
                        error: function() {
                            $("#seleccionacaptcha").html("Error al cargar el nuevo captcha.");
                        }
                    });
                });
            });
        </script>
    </head>

    <body>
        <center>
            <h1>Reinicia tu Contraseña</h1>
            <p>Ingrese su correo y le enviaremos un link de registro.</p>

            <form id="formu">
                <label for="correo">Email</label>
                <br>
                <input type="text" name="correo" id="correo">
                <br><br>

                <label>Captcha</label>
                <br>
                <div id='seleccionacaptcha'>
                    <img src="{{asset('captchas/'.$captcha->ruta)}}" height='120' width='150'>
                    <br>
                    <input type="button" value="Otro" id="otro" class="btn btn-info btn-sm">
                    <br><br>
                    <label for="captcha">Ingrese el captcha</label>
                    <input type="hidden" name="textcap" id="textcap" value="{{$captcha->idcap}}">
                    <br>
                </div>

                <input type="text" name="captcha">
                <br><br>
                <input type="button" class="btn btn-success btn-sm" value="Reinicia Password" id="reinicia">
            </form>

            <div id="mensaje"></div>
        </center>
    </body>
</html>
