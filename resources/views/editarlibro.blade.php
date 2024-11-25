@extends('principal')

@section('contenido')
    <title>Editar Libro</title>
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
        max-width: 100%;
    }
    .form-group button {
        padding: 1.3em 3em;
        font-size:12px;
        text-transform: uppercase;
        letter-spacing: 2.5px;
        font-weight:500;
        color: #000;
        background-color: #fff;
        border:none;
        border-radius: 45px;
        box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease 0s;
        cursor: pointer;
        outline:none;
        float: right;
    }
    .form-group button:hover {
        background-color: #23c483;
        box-shadow:0px 15px 20px rgba(46, 229, 157, 0.4);
        color: #fff;
        transform:translateY(-1px);
    }
</style>
    <div class="container">
        <h2>Editar Libro</h2>
        <form action="{{ route('guardarcambioslibro') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type= 'hidden' name= 'idlib' value="{{$infolibro->idlib}}">
            <div class="form-group">
                <label for="nombre">Nombre del Libro:</label>
                <input type="text" id="nombre" name="nombre"  value="{{ $infolibro->nombre }}" >
            </div>
            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" value="{{ $infolibro->autor }}" >
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4" >{{ $infolibro->descripcion }}</textarea>
            </div>

            <div class="form-group">
                <label for="imagen" >Imagen:</label>
                <div class="col-md-6">
                    <td>
                        @if($errors->first('imagen'))
                        <p class="text-warning">{{$errors->first('imagen')}}</p>
                        @endif
                        <input type="file" name="imagen" accept="image/*">
                    @if($infolibro->img)
                        <img src="{{ asset('storage/' . $infolibro->img) }}" alt="" style="width: 100px; height: 100px;">
                    @endif
                    </tr>
                </div>
            </div>
            <div class="form-group">
                <label for="area">Área:</label>
                <select name="ida" required>
                <option value='{{$infolibro->ida}}'>{{$infolibro->nomarea}}</option>
                    @foreach($todasareas as $ta)
                        <option value="{{$ta->ida}}">{{$ta->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Estado:</label>
                @if($infolibro->activo=='Si')    
            <div>
                <input type ='radio' name = 'activo' value = 'Si' checked >Si<br>
                <input type ='radio' name = 'activo' value = 'No' >    No
                </div>
            @else
            <div>
                <input type ='radio' name = 'activo' value = 'Si' >Si<br>
                <input type ='radio' name = 'activo' value = 'No'  checked >    No
            </div>
            @endif
            <div class="form-group">
                <label for="ejemplares">Número de Ejemplares:</label>
                <input type="number" id="ejemplares" name="ejemplares" min="1"  value="{{ $infolibro->ejemplares}}">
            </div>
            <div class="form-group">
                <button type="submit">Actualizar Libro</button>
            </div>
        </form>
    </div>
@stop
