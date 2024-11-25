<?php

namespace App\Http\Controllers;

use App\Models\areas;
use App\Models\libros;
use App\Models\usuarios;
use App\Models\tipo_usuarios;
use App\Models\carreras;
use App\Models\prestamos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;

class bibliocontroller extends Controller
{


    public function libros()
    {
        if(Session::get('sesionidu'))
        {
        return view('libros');
        }
        else
        {
            Session::flash('mensaje', "Es nacesario iniciar sesión");
            return view('login');
        }
    }

    public function nuevolibro()
    {
        if(Session::get('sesionidu'))
        {
        $todasareas = areas::orderby('nombre', 'asc')->get();
        return view('registrolibro')->with('todasareas', $todasareas);
        }
        else
        {
            Session::flash('mensaje', "Es nacesario iniciar sesión");
            return view('login');
        }
    }

    public function guardalibro(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ida' => 'required|integer',
            'activo' => 'required|in:Si,No',
            'ejemplares' => 'required|integer|min:1',
        ]);

        $file = $request->file('imagen');
        if ($file) {
            $img = date('YmdHis') . '_' . $file->getClientOriginalName();
            $file->storeAs('public', $img); 
        } else {
            $img = 'noimage.png';
        }

        $libro = new libros;
        $libro->nombre = $request->nombre;
        $libro->autor = $request->autor;
        $libro->descripcion = $request->descripcion;
        $libro->imagen = $img;
        $libro->ida = $request->ida;
        $libro->activo = $request->activo;
        $libro->ejemplares = $request->ejemplares;
        $libro->save();

        // Mostrar alerta de SweetAlert
        Alert::success('¡Éxito!', 'Libro registrado correctamente')->persistent(true);

        return redirect()->route('libros')->with('success', 'Libro guardado correctamente');
    }
    public function acervobio()
    {
        if(Session::get('sesionidu'))
        {
        $consulta =\DB::select("
            SELECT l.idlib, l.nombre AS nombre, l.autor AS autor, l.imagen AS img, l.descripcion, l.ida, a.nombre AS areas, l.activo, l.ejemplares
            FROM libros AS l
            INNER JOIN areas AS a ON l.ida = a.ida
            WHERE l.ida = 5
        ");

        $totalLibros = count($consulta);
        $librosActivos = array_reduce($consulta, function ($carry, $item) {
            return $carry + ($item->activo == 'Si' ? 1 : 0);
        }, 0);
        $librosInactivos = $totalLibros - $librosActivos;

        return view('acervobio', compact('consulta', 'totalLibros', 'librosActivos', 'librosInactivos'));
        }
        else
        {
            Session::flash('mensaje', "Es nacesario iniciar sesión");
            return view('login');
        }
    }

    public function acervomath()
    {
        if(Session::get('sesionidu'))
        {
        $consulta =\DB::select("SELECT l.idlib, l.nombre AS nombre, l.autor AS autor, l.imagen AS img, l.descripcion, l.ida, a.nombre AS areas, l.activo, l.ejemplares
            FROM libros AS l
            INNER JOIN areas AS a ON l.ida = a.ida
            WHERE l.ida = 2
        ");

        $totalLibros = count($consulta);
        $librosActivos = array_reduce($consulta, function ($carry, $item) {
            return $carry + ($item->activo == 'Si' ? 1 : 0);
        }, 0);
        $librosInactivos = $totalLibros - $librosActivos;

        return view('acervomath', compact('consulta', 'totalLibros', 'librosActivos', 'librosInactivos'));
        }
        else
        {
            Session::flash('mensaje', "Es nacesario iniciar sesión");
            return view('login');
        }
    }

    public function acervofilo()
    {
        if(Session::get('sesionidu'))
        {
        $consulta =\DB::select("SELECT l.idlib, l.nombre AS nombre, l.autor AS autor, l.imagen AS img, l.descripcion, l.ida, a.nombre AS areas, l.activo, l.ejemplares
            FROM libros AS l
            INNER JOIN areas AS a ON l.ida = a.ida
            WHERE l.ida = 4
        ");

        $totalLibros = count($consulta);
        $librosActivos = array_reduce($consulta, function ($carry, $item) {
            return $carry + ($item->activo == 'Si' ? 1 : 0);
        }, 0);
        $librosInactivos = $totalLibros - $librosActivos;

        return view('acervofilo', compact('consulta', 'totalLibros', 'librosActivos', 'librosInactivos'));
        }
        else
        {
            Session::flash('mensaje', "Es nacesario iniciar sesión");
            return view('login');
        }
    }

    public function acervoinge()
    {
        if(Session::get('sesionidu'))
        {
        $consulta =\DB::select("SELECT l.idlib, l.nombre AS nombre, l.autor AS autor, l.imagen AS img, l.descripcion, l.ida, a.nombre AS areas, l.activo, l.ejemplares
            FROM libros AS l
            INNER JOIN areas AS a ON l.ida = a.ida
            WHERE l.ida = 1
        ");

        $totalLibros = count($consulta);
        $librosActivos = array_reduce($consulta, function ($carry, $item) {
            return $carry + ($item->activo == 'Si' ? 1 : 0);
        }, 0);
        $librosInactivos = $totalLibros - $librosActivos;

        return view('acervoinge', compact('consulta', 'totalLibros', 'librosActivos', 'librosInactivos'));
        }
        else
        {
            Session::flash('mensaje', "Es nacesario iniciar sesión");
            return view('login');
        }
    }

    public function acervosoci()
    {
        if(Session::get('sesionidu'))
        {
        $consulta =\DB::select("SELECT l.idlib, l.nombre AS nombre, l.autor AS autor, l.imagen AS img, l.descripcion, l.ida, a.nombre AS areas, l.activo, l.ejemplares
            FROM libros AS l
            INNER JOIN areas AS a ON l.ida = a.ida
            WHERE l.ida = 3
        ");

        $totalLibros = count($consulta);
        $librosActivos = array_reduce($consulta, function ($carry, $item) {
            return $carry + ($item->activo == 'Si' ? 1 : 0);
        }, 0);
        $librosInactivos = $totalLibros - $librosActivos;

        return view('acervosoci', compact('consulta', 'totalLibros', 'librosActivos', 'librosInactivos'));
        }
        else
        {
            Session::flash('mensaje', "Es nacesario iniciar sesión");
            return view('login');
        }
    }
    public function editarlibro($idlib)
    {
        $idlib = Crypt::decrypt($idlib);
        if(Session::get('sesionidu'))
        {
        $infolibro =\DB::select("SELECT l.idlib, l.nombre, l.autor,  l.imagen as img, l.descripcion, l.ida,a.nombre AS nomarea, l.activo, l.ejemplares
        FROM libros AS l
        INNER JOIN areas AS a ON l.ida = a.ida
        WHERE idlib = $idlib");

        $todasareas= areas::where('ida', '<>', $infolibro[0]->ida)
        -> orderby('nombre', 'Asc')
        ->get();

        return view('editarlibro')
        ->with('infolibro', $infolibro[0])
        ->with('todasareas', $todasareas);
        }
        else
        {
            Session::flash('mensaje', "Es nacesario iniciar sesión");
            return view('login');
        }
    }

    public function guardarcambioslibro(Request $request)
    {
        $request->validate([
            'nombre' => 'regex:/^[A-Z][a-z,A-Z, ,á,é,í,ó,Ü,ñ,Ñ]+$/',
            'autor' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ida' => 'required|integer',
            'activo' => 'required|in:Si,No',
            'ejemplares' => 'required|integer|min:1',
        ]);

        //return $request;
        $libro = libros::find($request->idlib);

        if ($libro === null) {

            return redirect()->route('libros')->with('error', 'Libro no encontrado');
        }

        $libro->nombre = $request->nombre;
        $libro->autor = $request->autor;
        $libro->descripcion = $request->descripcion;
        
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $img = date('YmdHis') . '_' . $file->getClientOriginalName();
            $file->storeAs('public', $img);
            $libro->imagen = $img;
        }
        
        $libro->ida = $request->ida;
        $libro->activo = $request->activo;
        $libro->ejemplares = $request->ejemplares;
        $libro->save();

        return redirect()->route('libros')->with('success', 'Libro actualizado correctamente');
    }
    public function eliminarlibro($idlib)
    {
        $idlib = Crypt::decrypt($idlib);

        $prestamos = prestamos::where('idlib', $idlib)->count();

        if ($prestamos > 0) {
            return redirect()->route('libros')->with('error', 'No se puede eliminar el libro porque uno o más préstamos.');
            Alert::error('Oops...', 'No se puede eliminar el libro')->persistent(true);
        }

        $libro = libros::find($idlib);

        if ($libro === null) {
            return redirect()->route('libros')->with('error', 'Libro no encontrado');
        }

        if ($libro->imagen && $libro->imagen !== 'noimage.png') {
            Storage::delete('public/' . $libro->imagen);
        }

        $libro->delete();
        return redirect()->route('libros')->with('success', 'Libro eliminado correctamente');
        Alert::success('¡Éxito!', 'Libro eliminado correctamente')->persistent(true);
    }


    public function verlibro($idlib)
    {
        $idlib = Crypt::decrypt($idlib);
        if(Session::get('sesionidu'))
        {
        $libro =\DB::select("SELECT l.* , a.nombre AS nombrearea
        FROM libros AS l 
        INNER JOIN areas AS a ON l.ida = a.ida
        WHERE idlib=$idlib");
        
        $todosusuarios = usuarios::orderby('nombre', 'asc')->get();

        $todosprestamos = prestamos::join('usuarios', 'prestamos.idu', '=', 'usuarios.idu')
                           ->where('prestamos.idlib', $idlib) 
                           ->get();


        return view('verlibro')->with('libro', $libro[0])
        ->with('todosprestamos', $todosprestamos)
        ->with('todosusuarios', $todosusuarios);
        }
        else
        {
            Session::flash('mensaje', "Es necesario iniciar sesión");
            return view('login');
        }
        
    }

    public function renovar(Request $request)
    {
        $fechafin = $request->input('fecha_fin');
        $prestamoId = $request->input('prestamo_id');

        $fechanueva = date("Y-m-d", strtotime($fechafin . "+ 3 days"));

        $prestamo = prestamos::find($prestamoId);

        if ($prestamo) {
            if ($prestamo->numero < 3) {
                $prestamo->numero += 1;
                $prestamo->fecha_fin = $fechanueva;
                $prestamo->save();

                return redirect()->back()->with('success', 'Préstamo renovado exitosamente.');
            } else {
                return redirect()->back()->with('error', 'Límite de renovaciones alcanzado.');
            }
        }

        return redirect()->back()->with('error', 'Préstamo no encontrado.');
    }


    public function guardaprestamo(Request $request)
    {
        
        //return $request;
        $prestamo = new prestamos();
        $prestamo->idlib = $request['idlib'];
        $prestamo->idu = $request['idu'];
        $prestamo->fecha_inicio = $request['fecha_inicio'];
        $prestamo->fecha_fin = $request['fecha_fin'];
        $prestamo->numero= 0;
        $prestamo->save();

        return redirect()->back()->with('success', 'Préstamo agregado exitosamente');
    }

    public function alumnos()
    {
        if(Session::get('sesionidu'))
        {
        $usuarios = usuarios::orderby('nombre', 'asc')->get();
        return view('alumnos', compact('usuarios'));
        }
        else
        {
            Session::flash('mensaje', "Es nacesario iniciar sesión");
            return view('login');
        }
    }

    public function altausuario()
    {
        if(Session::get('sesionidu'))
        {
        $todostipos = tipo_usuarios::orderby('nombre', 'asc')->get();
        $todascarreras = carreras::orderby('nombre', 'asc')->get();
        return view('altausuario')->with('todostipos', $todostipos)
                                ->with('todascarreras', $todascarreras);
        }
        else
        {
        Session::flash('mensaje', "Es nacesario iniciar sesión");
        return view('login');
        }
    }
    public function guardausuario(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email|max:255|unique:usuarios,correo', 
            'password' => 'required|string|max:12',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'matricula' => 'required|string|max:9',
            'idc' => 'required|integer',
            'idtu' => 'required|integer',
            'activo' => 'required|in:Si,No',
        ]);

        $file = $request->file('imagen');
        if ($file) {
            $img = date('YmdHis') . '_' . $file->getClientOriginalName();
            $file->storeAs('public', $img);
        } else {
            $img = 'noimage.png';
        }

        $usuario = new usuarios;
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->correo = $request->correo; 
        $usuario->password = bcrypt($request->password); 
        $usuario->image = $img;
        $usuario->matricula = $request->matricula;
        $usuario->idc = $request->idc;
        $usuario->idtu = $request->idtu;
        $usuario->activo = $request->activo;
        $usuario->save();

        return redirect()->route('alumnos')->with('success', 'Usuario guardado correctamente');
    }

    public function editarusuario($idu)
    {
        if(Session::get('sesionidu'))
        {
            //return $idu;
            $usuario = \DB::Select("SELECT u.nombre, u.apellido, u.correo, u.password, u.image, u.matricula, u.activo, tu.idtu, tu.nombre AS tipo, c.idc, c.nombre AS carrera
            FROM usuarios AS u 
            INNER JOIN tipo_usuarios AS tu ON u.idtu = tu.idtu
            INNER JOIN carreras AS c ON u.idc= c.idc
            WHERE idu= $idu");

            $todostipos = tipo_usuarios::orderby('nombre', 'asc')->get();
            $todascarreras = carreras::orderby('nombre', 'asc')->get();

            return view('editausuario')->with('usuario', $usuario[0])
                                        ->with('todostipos', $todostipos)
                                        ->with('todascarreras', $todascarreras);
        
        }
        else
        {
        Session::flash('mensaje', "Es nacesario iniciar sesión");
        return view('login');
        }
        
    }

    public function actualizarusuario(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email|max:255|unique:usuarios,correo', 
            'password' => 'required|string|max:12',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'matricula' => 'required|string|max:9',
            'idc' => 'required|integer',
            'idtu' => 'required|integer',
            'activo' => 'required|in:Si,No',
        ]);
        $usuario = Usuario::findOrFail($request->id);

        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->correo = $request->correo;

        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->idtu = $request->idtu;
        $usuario->matricula = $request->matricula;
        $usuario->idc = $request->idc;
        $usuario->activo = $request->activo;

        if ($request->hasFile('imagen')) {
            if ($usuario->image) {
                Storage::delete('public/' . $usuario->image);
            }

            $imagePath = $request->file('imagen')->store('public/imagenes');
            $usuario->image = basename($imagePath);
        }
        $usuario->save();

        return redirect()->route('alumnos')->with('success', 'Usuario actualizado correctamente.');
    }

    public function perfil()
    {
        if(Session::get('sesionidu'))
        {
        
        return view ('miperfil');
        }
        else
        {
        Session::flash('mensaje', "Es nacesario iniciar sesión");
        return view('login');
        }
    }
}
