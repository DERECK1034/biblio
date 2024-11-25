<html>
    <body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
        <center>
            <table width="600" style="background-color: #ffffff; border: 1px solid #dddddd; border-radius: 10px; padding: 20px;">
                <tr>
                    <td style="text-align: center; padding-bottom: 20px;">
                        <h1 style="color: #333333;">Se a cambiado la contraseña con exito</h1>
                        <p style="font-size: 16px; color: #555555;">
                            Se ha realizado el cambio de contraseña de tu cuenta. Por favor, regresa al sitio y accede con la siguiente información.
                        </p>
                    </td>
                </tr>
                
                <tr>
                    <td style="padding: 20px; text-align: left; background-color: #fafafa; border-radius: 10px;">
                        <p style="font-size: 16px; color: #333333;">
                            <strong>Usuario:</strong> {{$usuario}}
                        </p>
                        <p style="font-size: 16px; color: #333333;">
                            <strong>Clave:</strong> {{$nuevaclave}}
                        </p>
                    </td>
                </tr>

                <tr>
                    <td style="text-align: center; padding: 30px 0;">
                        <a href="{{route('login')}}" style="background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; font-size: 16px; border-radius: 5px;">
                            Click Aquí para Acceder
                        </a>
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>
