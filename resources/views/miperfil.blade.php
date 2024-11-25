@extends('principal')

@section('contenido')
    <title>Editar Libro</title>
    <style>
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
        h2{
            font-family: serif;
            color:white;
        }
    </style>
    <div class="container">
        <h2>Mis datos</h2>
        <div class="form-group">
            <p>{{ Session::get('sesionname')}}</p>
        </div>
    </div>
@stop
