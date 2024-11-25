@extends('principal')

@section('contenido')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<style>
    h1 {
        font-family: 'Times New Roman', serif;
        color: white;
    }
    .btn-add {
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
    }
    .btn-add:hover {
        background-color: #23c483;
        box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
        color: #fff;
        transform: translateY(-1px);
    }

    .wrapper {
        margin: auto;
        margin-bottom: 10px;
        border-radius: 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 300px;
        height: 300px;
        overflow: hidden;
        cursor: pointer;
        position: relative;
    }

    .wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.5s ease-in-out;
    }

    .wrapper:hover img {
        transform: scale(1.4);
        filter: blur(5px);
    }

    .wrapper:hover .title,
    .wrapper:hover .text {
        opacity: 1;
    }

    .title {
        font-family: "Times New Roman", serif;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 5px;
        background: rgba(219, 217, 217, 0.568);
        padding: 20px;
        position: absolute;
        color: rgb(61, 59, 59);
        font-size: 20px;
        font-weight: 600;
        text-align: center;
        transition: opacity 0.5s ease-in-out;
        opacity: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }

    .text {
        font-family: "Times New Roman", serif;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        position: absolute;
        color: rgb(61, 59, 59);
        font-size: 30px;
        font-weight: 600;
        text-align: center;
        transition: opacity 0.5s ease-in-out;
        opacity: 0;
        top: 0;
        left: 0;
        right: 0;
    }

    .content {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        justify-items: center;
    }

    @media (max-width: 768px) {
        .content {
            grid-template-columns: 1fr;
        }
    }

</style>


<center> <h1>Bienvenidos</h1></center><br>
<center> 
    <a href="{{ route('nuevolibro') }}">
        <button class="btn-add">Añadir libro nuevo</button>
    </a>
</center>
<br><br>
<div class="content">
    <div class="wrapper">
        <img src="{{ asset('archivos/bio.jpg') }}" /> 
        <span class="text">Biología</span>
        <a href="{{ route('acervobio') }}">
        <span class="title"> Ver acervo </span>
        </a>
    </div>
    <div class="wrapper">
        <img src="{{ asset('archivos/math.jpg') }}" /> 
        <span class="text">Matemáticas</span>
        <a href="{{ route('acervomath') }}">
        <span class="title"> Ver acervo </span>
        </a>
    </div>
    <div class="wrapper">
        <img src="{{ asset('archivos/filo.jpg') }}" /> 
        <span class="text">Filosofía</span>
        <a href="{{ route('acervofilo') }}">
        <span class="title"> Ver acervo </span>
        </a>
    </div>
    <div class="wrapper">
        <img src="{{ asset('archivos/inge.jpg') }}" /> 
        <span class="text">Ingeniería</span>
        <a href="{{ route('acervoinge') }}">
        <span class="title"> Ver acervo </span>
        </a>
    </div>
    <div class="wrapper">
        <img src="{{ asset('archivos/soci.jpg') }}" /> 
        <span class="text">Ciencias Sociales</span>
        <a href="{{ route('acervosoci') }}">
        <span class="title"> Ver acervo </span>
        </a>
    </div>
</div>



<script>
    @if(Session::has('success'))
        Swal.fire({
            title: '{{ Session::get('success') }}',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
        });
    @endif
</script>

@stop
