@extends('principal')

@section('contenido')
<title>Editar Usuario</title>
<style>
    body {
        font-family: "Times New Roman", serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .container {
        width: 50%;
        margin: 50px auto;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0);
        backdrop-filter: blur(10px);
        box-shadow: 0 0 70px rgba(0, 0, 0, 0.5);
        border-radius: 8px;
        color: #9D9D9D;
        text-align: left;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    .form-group input, .form-group textarea, .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .form-group input[type="radio"] {
        width: auto;
    }
    .form-group img {
        max-width: 100px;
        max-height: 100px;
        border-radius: 4px;
        margin-top: 10px;
    }
    .form-group button {
        padding: 1.3em 3em;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 2.5px;
        font-weight: 500;
        color: #000;
        background-color: #fff;
        border: none;
        border-radius: 45px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease 0s;
        cursor: pointer;
        outline: none;
        float: right;
    }
    .form-group button:hover {
        background-color: #23c483;
        box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
        color: #fff;
        transform: translateY(-1px);
    }
</style>
<div class="container">
    <h2>Editar Usuario</h2>
    <form action="{{ route('actualizarusuario') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ $usuario->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" value="{{ $usuario->apellido }}" required>
        </div>
        <div class="form-group">
            <label for="correo">Email:</label>
            <input type="email" id="correo" name="correo" value="{{ $usuario->correo }}" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="text" id="password" name="password" value="{{ $usuario->password }}" required>
        </div>
        <div class="form-group">
            <label for="idtu">Tipo de usuario:</label>
            <select name="idtu" required>
                @foreach($todostipos as $tt)
                    <option value="{{ $tt->idtu }}" {{ $tt->idtu == $usuario->idtu ? 'selected' : '' }}>{{ $tt->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" accept="image/*">
            @if($usuario->image)
            <img src="{{ asset('storage/' . $usuario->image) }}" alt="Imagen del Usuario">
            @endif
        </div>
        <div class="form-group">
            <label for="matricula">Matricula:</label>
            <input type="text" id="matricula" name="matricula" value="{{ $usuario->matricula }}" required>
        </div>
        <div class="form-group">
            <label for="idc">Carrera:</label>
            <select name="idc" required>
                @foreach($todascarreras as $tc)
                    <option value="{{ $tc->idc }}" {{ $tc->idc == $usuario->idc ? 'selected' : '' }}>{{ $tc->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Estado:</label>
            <label><input type="radio" name="activo" value="Si" {{ $usuario->activo == 'Si' ? 'checked' : '' }} required> Activo</label>
            <label><input type="radio" name="activo" value="No" {{ $usuario->activo == 'No' ? 'checked' : '' }} required> Inactivo</label>
        </div>
        <div class="form-group">
            <button type="submit">Actualizar Usuario</button>
        </div>
    </form>
</div>
@stop
