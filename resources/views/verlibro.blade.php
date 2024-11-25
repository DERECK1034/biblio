@extends('principal')

@section('contenido')
    <title>Ver libro</title>
    <style>
        .table-format th {
            width: 250px;
            font-size: 14px;
            font-family: 'Times New Roman', serif;
            color: white;
            text-align: center;
        }
        .table-format td {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 160px;
            gap: 10px;
            text-align: left;
        }
        .table-format tr {
            margin: 10px 0;
            padding: 20px 10px;
            display: flex;
            align-items: center;
            border-radius: 5px;
            justify-content: space-between;
            cursor: pointer;
            transition: 0.5s;
        }
        .table-format tr:hover {
            background: #5A5B5D;
        }
        .divider {
            height: 1px;
            width: 100%;
            background: #181818;
            margin: 5px 0 20px 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            backdrop-filter: blur(10px);
            box-shadow: 0 0 70px rgba(0, 0, 0, 0.5);
            border-radius: 8px;
            color: #9D9D9D;
            text-align: left;
            overflow-x: auto;
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
        h3, h1, p {
            color: white;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: rgba(24, 24, 33, 0.82);
            backdrop-filter: blur(10px);
            margin: auto;
            padding: 20px;
            border-radius: 20px;
            width: 60%;
            max-width: 600px;
            color: white;
            position: relative;
            box-sizing: border-box;
        }
        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            top: 10px;
            right: 25px;
        }
        .close:hover,
        .close:focus {
            color: white;
            text-decoration: none;
            cursor: pointer;
        }
        .modal-content form {
            display: flex;
            flex-direction: column;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group button {
            align-self: flex-end;
        }
    </style>

    <div class="container">
        <div class="form-group">
            <table>
                <tr>
                    <td>
                        <input type="hidden" value="{{$libro->nombre}}">
                        <h1>{{$libro->nombre}}</h1>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>{{$libro->autor}}</h3><br>
                    </td>
                    <td>
                        <p>{{$libro->nombrearea}}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>{{$libro->descripcion}}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="font-weight: bold; color: white;">Ejemplares: {{$libro->ejemplares}}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button id="openAddLoanModal" class="btn">Agregar Préstamo</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="container">
        <div class="table-format">
            <table>
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Fecha Préstamo</th>
                        <th>Fecha Entrega</th>
                        <th>Renovaciones</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="userTableBody">
                    @foreach ($todosprestamos as $tp)
                        <tr>
                            <td style="color:white;">{{$tp->nombre}} {{$tp->apellido}}</td>
                            <td style="color:white;">{{$tp->fecha_inicio}}</td>
                            <td style="color:white;">{{$tp->fecha_fin}}</td>
                            <td style="color:white;">{{$tp->numero}}</td>
                            <<td>
                                <form action="{{ route('renovar') }}" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="prestamo_id" value="{{ $tp->idp }}">
                                    <input type="hidden" name="fecha_fin" value="{{$tp->fecha_fin}}">
                                    <button type="submit" class="btn">Renovar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

<!-- Modal para agregar préstamo -->
<div id="addLoanModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeAddLoanModal">&times;</span>
        <h2>Agregar Préstamo</h2>
        <form id="addLoanForm" action="{{ route('guardaprestamo') }}" method="POST">
            @csrf
            <input type="hidden" id="bookId" name="idlib" value="{{$libro->idlib}}">
            <input type="hidden" id="hiddenUserId" name="idu" value="">
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <select id="usuarioSelect" name="idu" required>
                    <option value="">Selecciona un usuario</option>
                    @foreach($todosusuarios as $tu)
                        <option value="{{$tu->idu}}">{{$tu->nombre}} {{$tu->apellido}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="loanDate">Fecha de préstamo:</label>
                <input type="date" id="loanDate" name="fecha_inicio" required>
            </div>
            <div class="form-group">
                <input type="hidden" id="returnDateInput" name="fecha_fin" readonly>
                <p id="returnDate">Fecha de entrega: </p>
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Agregar</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        var modal = document.getElementById("addLoanModal");
        var openModalButton = document.getElementById("openAddLoanModal");
        var closeModalButton = document.getElementById("closeAddLoanModal");
        var loanDateInput = document.getElementById("loanDate");
        var returnDateParagraph = document.getElementById("returnDate");
        var returnDateInput = document.getElementById("returnDateInput");
        var usuarioSelect = document.getElementById("usuarioSelect");
        var hiddenUserIdInput = document.getElementById("hiddenUserId");

        openModalButton.onclick = function() {
            modal.style.display = "block";
        }

        closeModalButton.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        loanDateInput.onchange = function() {
            var loanDate = new Date(loanDateInput.value);
            if (!isNaN(loanDate.getTime())) {
                loanDate.setDate(loanDate.getDate() + 3);
                var returnDate = loanDate.toISOString().split('T')[0];
                returnDateParagraph.textContent = "Fecha de entrega: " + returnDate;
                returnDateInput.value = returnDate;
            }
        }

        usuarioSelect.onchange = function() {
            hiddenUserIdInput.value = usuarioSelect.value;
        }
    });
</script>

@if (Session::has('mensaje'))
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: "{{ Session::get('mensaje') }}",
                            confirmButtonText: 'Aceptar'
                        });
                    </script>
                @endif