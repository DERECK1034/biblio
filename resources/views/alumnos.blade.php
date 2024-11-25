@extends('principal')

@section('contenido')
<style>
    .table-format{
        align-items: center;
        justify-content: center;
        display: flex;
    }
    .profile-picture{
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 50%;
    }
    .profile-info{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    table{
        background-color: rgba(255, 255, 255, 0); 
        backdrop-filter: blur(10px); 
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 0 10px rgba(0,0,0,0.8);
    }
    th{
        width: 250px;
        font-size: 14px;
        font-family: 'Times New Roman', serif;
        color: white;
    }
    td{
        display: flex;
        align-items: center;
        justify-content: center;
        width: 160px;
        gap: 10px;
    }
    tr{
        margin: 10px 0;
        padding: 20px 10px;
        display: flex;
        align-items: center;
        border-radius: 5px;
        justify-content: space-between;
        cursor: pointer;
        transition: 0.5s;
    }
    tr:hover{
        background: #5A5B5D;
    }
    .divider{
        height: 1px;
        width: 100%;
        background: #181818;
        margin: 5px 0 20px 0;
        padding: 0;
    }
    .name{
        font-size: 14px;
        font-family: 'Times New Roman', serif;
        color: white;
    }
    .status{
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: #25D366;
    }
    .status-inactivo {
        background-color: red;
    }
    .btn {
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

    .btn:hover {
        background-color: #23c483;
        box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
        color: #fff;
        transform: translateY(-1px);
    }
    .search-container{
        background: #fff;
        height: 40px;
        width: 500px;
        border-radius:30px;
        padding: 10px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: 0.8s;
        box-shadow: 4px 4px 6px 0 rgba(255, 255, 255, .3),
        -4px -4px 6px 0 rgba(116, 125, 136, .2),
        inset -4px -4px 6px 0 rgba(255, 255, 255, .2),
        inset 4px 4px 6px 0 rgba(0, 0, 0, .2);
    }
    .search-container:hover>.search-input{
        width: 400px;
    }
    .search-container .search-input{
        background: transparent;
        border: none;
        outline: none;
        width: 0px;
        font-weight: 500;
        font-size: 16px;
        transition: 0.8s;
    }
    .search-container .search-btn .fas{
        color: #5cbdbb;
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
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
    background-color: rgba(24, 24, 33, 0.82);
    backdrop-filter: blur(10px);
    margin: auto;
    padding: 100px; 
    border-radius: 20px;
    width: 50%;
    height: 70%;
    position: relative; 
    font-size: 14px;
    font-family: 'Times New Roman', serif;
    color: white;
}
.profile-picture-modal {
    border-radius: 20px;
    background-color: rgba(0,0,0,0.8);
    width: 300px; 
    height: 400px;
    object-fit: cover; 
    position: absolute; 
    top: 30px; 
    left: 40px; 
    border-radius: 10px; 
}

.name-modal{
    object-fit: cover; 
    position: absolute; 
    top: 100px; 
    left: 500px; 

}
.correo-modal{
    top: 200px; 
    left: 400px; 
    position: absolute; 
    font-family: serif;
}
.modal-tipo{
    top: 250px; 
    left: 400px; 
    position: absolute; 
    font-family: serif;
}
.modalActivo{
    top: 300px; 
    left: 400px; 
    position: absolute; 
    font-family: serif;
}
.modalmatricula{
    top: 200px; 
    left: 650px; 
    position: absolute; 
    font-family: serif;
}
.modal-content .btn{
    top: 380px; 
    left: 500px; 
    position: absolute; 
}

.close {
    color: #aaa;
    font-size: 28px;
    font-weight: bold;
    position: absolute;
    top: 30px;
    right: 40px; 
}
    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<center> 
    <a href="{{ route('altausuario') }}">
        <button class="btn">Nuevo usuario</button>
    </a>
<br><br>
<div class="search-container">
    <input type="text" name="search" id="search" placeholder="Buscar..." class="search-input">
    <a href="" class="search-btn">
        <i class="fas fa-search"></i>
    </a>
</div>
</center>
<br>
<div class="table-format">
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Activo</th>
                <th>Email</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tr class="divider"></tr>
        <tbody id="userTableBody">
            @foreach ($usuarios as $u)
                <tr>
                    <td>
                        <img src="{{ asset('storage/' . $u->image) }}" class="profile-picture"/>
                        <div class="profile-info">
                            <span class="name">{{ $u->nombre }} {{$u->apellido}}</span>
                        </div>
                    </td>
                    <td>
                        <span class="status {{ strtolower($u->activo) === 'no' ? 'status-inactivo' : '' }}"></span>
                        <span class="name">{{ $u->activo }}</span>
                    </td>
                    <td class="name">{{ $u->correo }}</td>
                    <td>
                        <button class="btn ver-btn" 
                                data-idu="{{ $u->idu }}" 
                                data-nombre="{{ $u->nombre }}" 
                                data-apellido="{{ $u->apellido }}" 
                                data-correo="{{ $u->correo }}" 
                                data-activo="{{ $u->activo }}" 
                                data-image="{{ asset('storage/' . $u->image) }}" 
                                data-tipo="{{ $u->idtu }}"
                                data-matricula="{{ $u->matricula }}">Ver
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <img id="modalImage" class="profile-picture-modal" src="" />
        <div class="profile-info">
            <h1 id="modalName" class="name-modal"></h1>
            <p id="modalCorreo" class="correo-modal"></p>
            <p id="modalTipo" class="modal-tipo"></p>
            <p id="modalActivo" class="modalActivo"></p>
            <p id="modalmatricula" class="modalmatricula"></p>
            <a href="#" id="editButton">
                <button class="btn">Editar</button>
            </a>
        </div>
    </div>
</div>
<script>
document.getElementById('search').addEventListener('input', function() {
    let filter = this.value.toLowerCase();
    let rows = Array.from(document.querySelectorAll('#userTableBody tr'));

    rows.sort((a, b) => {
        let nameA = a.querySelector('.name').textContent.toLowerCase();
        let nameB = b.querySelector('.name').textContent.toLowerCase();

        let matchA = nameA.includes(filter);
        let matchB = nameB.includes(filter);

        if (matchA && !matchB) return -1;
        if (!matchA && matchB) return 1;
        return 0;
    });

    let userTableBody = document.getElementById('userTableBody');
    userTableBody.innerHTML = '';
    rows.forEach(row => userTableBody.appendChild(row));
});

let modal = document.getElementById('myModal');
let span = document.getElementsByClassName('close')[0];

document.querySelectorAll('.ver-btn').forEach(button => {
    button.onclick = function() {
        let tipoUsuario = this.dataset.tipo;
        let tipoTexto = tipoUsuario == 1 ? 'Administrador' : (tipoUsuario == 2 ? 'Alumno' : 'Desconocido');
        
        document.getElementById('modalName').innerText = this.dataset.nombre + ' ' + this.dataset.apellido;
        document.getElementById('modalCorreo').innerText = 'Correo: ' + this.dataset.correo;
        document.getElementById('modalActivo').innerText = 'Activo: ' + this.dataset.activo;
        document.getElementById('modalImage').src = this.dataset.image;
        document.getElementById('modalTipo').innerText = 'Tipo de usuario: ' + tipoTexto;
        document.getElementById('modalmatricula').innerText = 'Matricula: ' + this.dataset.matricula;
        
        // Configurar el enlace del botón "Editar"
        let editButton = document.getElementById('editButton');
        editButton.href = "{{ url('editarusuario') }}/" + this.dataset.idu;
        
        modal.style.display = 'block';
    }
});
span.onclick = function() {
    modal.style.display = 'none';
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}
</script>
@stop

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
