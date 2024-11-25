<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\bibliocontroller;
use App\Mail\notificacion;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [logincontroller::class, 'login'])->name('login');
Route::post('validar', [logincontroller::class, 'validar'])->name('validar');
Route::get('cerrarsesion', [logincontroller::class, 'cerrarsesion'])->name('cerrarsesion');
Route::get('inicio', [logincontroller::class, 'inicio'])->name('inicio');
Route::get('libros', [bibliocontroller::class, 'libros'])->name('libros');
Route::get('nuevolibro', [bibliocontroller::class, 'nuevolibro'])->name('nuevolibro');
Route::post('guardalibro', [bibliocontroller::class, 'guardalibro'])->name('guardalibro');
Route::get('acervobio', [bibliocontroller::class, 'acervobio'])->name('acervobio');
Route::get('acervomath', [bibliocontroller::class, 'acervomath'])->name('acervomath');
Route::get('acervofilo', [bibliocontroller::class, 'acervofilo'])->name('acervofilo');
Route::get('acervoinge', [bibliocontroller::class, 'acervoinge'])->name('acervoinge');
Route::get('acervosoci', [bibliocontroller::class, 'acervosoci'])->name('acervosoci');
Route::get('alumnos', [bibliocontroller::class, 'alumnos'])->name('alumnos');
Route::get('altausuario', [bibliocontroller::class, 'altausuario'])->name('altausuario');
Route::post('guardausuario', [bibliocontroller::class, 'guardausuario'])->name('guardausuario');
Route::get('/editarusuario/{idu}', [bibliocontroller::class, 'editarusuario'])->name('editarusuario');
Route::get('/editarlibro/{idlib}', [bibliocontroller::class, 'editarlibro'])->name('editarlibro');
Route::POST('actualizarusuario', [bibliocontroller::class, 'actualizarusuario'])->name('actualizarusuario');
Route::POST('guardarcambioslibro', [bibliocontroller::class, 'guardarcambioslibro'])->name('guardarcambioslibro');
Route::get('eliminarlibro/{idlib}', [bibliocontroller::class, 'eliminarlibro'])->name('eliminarlibro');
Route::get('perfil', [bibliocontroller::class, 'perfil'])->name('perfil');
Route::get('/verlibro/{idlib}', [bibliocontroller::class, 'verlibro'])->name('verlibro');
Route::post('/guardaprestamo', [bibliocontroller::class, 'guardaprestamo'])->name('guardaprestamo');
Route::post('/renovar', [bibliocontroller::class, 'renovar'])->name('renovar');

Route::get('newpassword', [logincontroller::class, 'newpassword'])->name('newpassword');
Route::get('validauser', [logincontroller::class, 'validauser'])->name('validauser');
Route::get('captchanuevo', [logincontroller::class, 'captchanuevo'])->name('captchanuevo');
Route::get('mandacorreo', [logincontroller::class, 'mandacorreo'])->name('mandacorreo');

Route::get('newpassword2',[logincontroller::class,'newpassword2'])->name('newpassword2');
Route::get('validauser2',[logincontroller::class,'validauser2'])->name('validauser2');
Route::get('reinicia/{idu}',[logincontroller::class,'reinicia'])->name('reinicia');
Route::get('cambiapass',[logincontroller::class,'cambiapass'])->name('cambiapass');

Route::get('recupera',function (){

    Mail::to('dereckdownham2002@gmail.com')
        ->send(new notificacion("Dereck"));
        return "Mensaje Enviado";
    
})->name('recupera');