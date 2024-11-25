<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuarios;
use App\Models\captchas;
use App\Mail\notificacion;
use App\Mail\notificacion2;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Session;

class logincontroller extends Controller
{
    public function inicio()
    {
        if(Session::get('sesionidu'))
        {
            return view('inicio');
        }
        else
        {
            Session::flash('mensaje', "Es necesario iniciar sesión");
            return view('login');
        }
    }
    public function login()
    {
        return view('login');
    }
    
    public function validar(request $request)
    {
        $correo=$request->correo;
        $password=md5($request->password);

        $acceso = usuarios::where('correo', '=', $correo)
                            ->where('password', '=', $password)
                            ->get();

        $cuantos = count($acceso);
        if($cuantos == 0)
        {
            Session::flash('mensaje', "El usuario o password son incorrectos");
            return redirect()->route('login');
        }
        else
        {
            Session::put('sesionname', $acceso[0]->nombre.' '.$acceso[0]->apellido);
            Session::put('sesionidu', $acceso[0]->idu);
            Session::put('sesiontipo', $acceso[0]->idtu);

            return redirect()->route('inicio');
        }
    }

    public function cerrarsesion()
    {
        Session::forget('sesionname');
        Session::forget('sesionidu');
        Session::forget('sesiontipo');
        Session::flush();
        Session::flash('mensaje', 'sesion cerrada correctamente');
        return redirect()->route('login');
    }

    public function newpassword()
    {

        $idc = rand(1,4);

        $captcha = captchas::where('idcap', '=', $idc)
        ->get();
        //return $captcha;
        return view('recuperapass')->with('captcha', $captcha[0]);
    }

    public function validauser(Request $request)
    {   $usuario = usuarios::where('correo','=',$request->correo)
                             ->where('activo','=','Si')
                             ->get();
        $cuantos = count($usuario);

        $captcha = captchas::where('idcap','=',$request->textcap)
                             ->get();
        if ($captcha[0]->valor != $request->captcha)
        {
         $bandera = 1;
        }
        if($cuantos==0)
        {
         $bandera  = 2;
        }
        if($cuantos>=1 and $captcha[0]->valor == $request->captcha)
        {
         $bandera = 3;
        }

        if($bandera==3)
        {
          $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
           
         $passnuevo =  substr(str_shuffle($permitted_chars), 0, 10);
         $passencnuevo = md5($passnuevo);
        /* echo $passnuevo;
         echo "<br>";
         echo $passencnuevo;*/
     
         
        $actualizapass =  \DB::update("update usuarios set password = '$passencnuevo' where correo = '$request->correo'");
   
        $response=Mail::to($request->correo)
        ->send(new notificacion($request->correo,$passnuevo));
         //dump($response);*/
        echo "correo enviado";
        }


        return view('resultadocaptcha')
        ->with('bandera',$bandera);
       
        
    }
    public function captchanuevo()
    {
        $idc = rand(1, 4);

        $captcha = captchas::where('idcap','=',$idc)
                             ->get();
        return view('captchanuevo')
               ->with('captcha',$captcha[0]);
    }

    public function newpassword2()
    {   
        return view('recuperapass2');
        
    }
       public function validauser2(request $request)
    {
        $usuario = usuarios::where('correo','=',$request->correo)
                    ->where('activo','=','Si')
                    ->get();
        $cuantos = count($usuario);

        if($cuantos == 0)
        {
            echo "El correo no existe";
        }
        else
        {
            $hoy = date("Y-m-d H:i:s");
            $idu = $usuario[0]->idu;
            $encid = Crypt::encrypt($idu);

            $actualizapass = \DB::update("update usuarios set bloqueo = '1',
            fechavigencia = addtime('$hoy','2:00:00') where correo = '$request->correo'");

            $url = URL::to('reinicia/' . urlencode($encid));

            $response=Mail::to($request->correo)
            ->send(new notificacion2($request->correo,$url));
            //dump($response);*/
            echo "Se envio un correo para la recuperacion de contraseña";
            //echo"<br>";
            //echo"<br>";
            //echo"Se ha hecho una solicitud de cambio de contraseña, favor de dar
            //click en el siguiente link para iniciar el proceso de recuperacion";
            //echo"<br>";
            //echo"<a href='reinicia/$encid'>Click aqui para recuperar contraseña </a>";
            //echo"<br>";
        }
    }

    public function reinicia($idu)
    {
        $idu = Crypt::decrypt($idu);
        return view('nuevopass')
                    ->with('idu',$idu);
    }

    public function cambiapass(request $request)
{
    $pass = $request->pass;
    $pass2 = $request->pass2;
    
    if ($pass == $pass2) {
        // Verifica que el campo idu no esté vacío
        if (empty($request->idu)) {
            echo "Error: idu está vacío.";
            return;
        }
        
        $consulta = \DB::select("SELECT IF(NOW() <= fechavigencia, 'valido', 'novalido') AS resultado
                                 FROM usuarios 
                                 WHERE idu = ?", [$request->idu]);
        
        if (count($consulta) > 0 && $consulta[0]->resultado == 'valido') {
            $pass = md5($pass);
            $actualiza = \DB::update("UPDATE usuarios 
                                      SET password = ?, bloqueo = 0
                                      WHERE idu = ?", [$pass, $request->idu]);
            echo "El password ha sido cambiado, por favor inicie sesión nuevamente";
            echo "<a href='../login'>Click aquí para iniciar sesión :)</a>";
            echo "<br>";
        } else {
            echo "El link de recuperación ya caducó, es necesario hacer una nueva solicitud";
        }
    } else {
        echo "Los passwords no coinciden";
    }
}



}