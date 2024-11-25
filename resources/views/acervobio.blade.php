@extends('principal')

@section('contenido')
<style>
    h1 {
        font-family: 'Times New Roman', serif;
        color: white;
        font-size: 40px;
    }
    h2 {
        font-family: 'Times New Roman', serif;
        color: white;
        font-size: 30px;
    }
    .book {
        width: 300px;
        height: 400px;
        background: #000;
        border-radius: 30px;
        overflow: hidden;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all .25s ease;
        backface-visibility: hidden;
    }
    .book:hover {
        transform: scale(0.9);
    }
    .book:hover:after {
        height: 200px;
    }
    .book:hover .con-text p {
        margin-bottom: 0px;
        opacity: 1;
    }
    .book:hover img {
        transform: scale(1.25);
    }
    .book:hover .ul {
        transform: translate(0);
        opacity: 1;
    }
    .book:after {
        width: 100%;
        content: '';
        left: 0px;
        bottom: 0px;
        height: 150px;
        position: absolute;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 1) 100%);
        z-index: 20;
        transition: all .25s ease;
    }
    .book img {
        height: 100%;
        z-index: 10;
        transition: all .25s ease;
    }
    .book .con-text {
        z-index: 30;
        position: absolute;
        bottom: 0px;
        color: #fff;
        padding: 20px;
        padding-bottom: 5px;
    }
    .book .con-text p {
        font-size: .8rem;
        opacity: 0;
        margin-bottom: -170px;
        transition: all .25s ease;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        flex-direction: column;
    }
    .ul {
        position: absolute;
        right: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        z-index: 40;
        border-radius: 14px;
        padding-left: 8px;
        padding-top: 8px;
        padding-bottom: 8px;
        top: 0px;
        opacity: 0;
        transform: translate(100%);
        transition: all .25s ease;
    }
    .ul li {
        background: #fff;
        list-style: none;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: .7;
        transition: all .25s ease;
        backface-visibility: hidden;
    }
    .ul li:last-child {
        border-radius: 8px 8px 12px 12px;
    }
    .ul li:first-child {
        border-radius: 12px 12px 0px 0px;
    }
    .ul li:hover {
        opacity: 1;
        transform: translate(-7px, -4px);
        border-radius: 6px;
    }
    .ul li svg {
        width: 24px;
        height: 24px;
    }
    .ul li i {
        font-size: 1.4rem;
        color: #000;
    }
    .card {
        display: flex;
        align-items: center;
        width: 30%;
        margin: auto;
        padding: 20px;
        background-color: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(10px);
        box-shadow: 0 0 70px rgba(0, 0, 0, 0.5);
        border-radius: 8px;
        color: #9D9D9D;
        text-align: left;
    }

    .card img {
        max-width: 150px;
        width: 100%;
        height: auto;
        object-fit: cover;
        border-radius: inherit;
        box-shadow: 0 60px 40px rgba(0, 0, 0, 0.08);
        margin-right: 20px;
    }

    .card-content {
        flex: 1;
    }

    .card h2 {
        font-size: 26px;
        font-weight: 400;
        margin-top: 0;
        margin-bottom: 10px;
    }

    .card h3 {
        font-size: 20px;
        font-weight: 400;
        margin: 0;
        opacity: 0.5;
    }

    @media (max-width: 600px) {
        .card {
            width: 90%;
            padding: 20px;
        }
    }

    @media (max-width: 440px) {
        .card img {
            max-width: 100px;
            height: auto;
        }
    }
    .book-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 50px;
    }
    .search-container {
        background: #fff;
        height: 40px;
        width: 500px;
        border-radius: 30px;
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
        margin-bottom: 30px;
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto; 
    }
    .search-container:hover>.search-input {
        width: 400px;
    }
    .search-container .search-input {
        background: transparent;
        border: none;
        outline: none;
        width: 0px;
        font-weight: 500;
        font-size: 16px;
        transition: 0.8s;
    }
    .search-container .search-btn .fas {
        color: #5cbdbb;
    }
</style>

<center><h1>Biología</h1></center><br>
<div class="search-container">
    <input type="text" id="search" placeholder="Buscar libro por nombre..." class="search-input">
    <a href="" class="search-btn">
        <i class="fas fa-search"></i>
    </a>
</div>
<br>
<div class="card">
    <img src="{{ asset('archivos/bio.jpg') }}" />
    <div class="card-content">
        <h2>Total de libros: {{ $totalLibros }}</h2>
        <h3>Activos: {{ $librosActivos }}</h3>
        <h3>Inactivos: {{ $librosInactivos }}</h3>
    </div>
</div>
<br><br>

<div class="book-container" id="book-container">
    @foreach ($consulta as $libro)
    @php $masid = Crypt::encrypt($libro->idlib); @endphp
    <div class="book" data-name="{{ strtolower($libro->nombre) }}">
        <ul class="ul">
            <a href="{{url('editarlibro')}}/{{$masid}}">
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path d="m2.695 14.762-1.262 3.155a.5.5 0 0 0 .65.65l3.155-1.262a4 4 0 0 0 1.343-.886L17.5 5.501a2.121 2.121 0 0 0-3-3L3.58 13.419a4 4 0 0 0-.885 1.343Z" />
                    </svg>
                </li>
            </a>
            <a href="{{url('eliminarlibro')}}/{{$masid}}">
                <li>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z" clip-rule="evenodd" />
                </svg>

                </li>
            </a>
            <a href="{{url('verlibro')}}/{{$masid}}">
                <li>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                    <path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                    <path fill-rule="evenodd" d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z" clip-rule="evenodd" />
                </svg>
                </li>
            </a>
        </ul>
        
        <img src="{{ asset('storage/' . $libro->img) }}" alt="">
        <div class="con-text">
            <h2>{{$libro->nombre}}</h2>
            <p>{{$libro->autor}}</p>
            <p>{{$libro->descripcion}}</p>
        </div>
    </div>
    @endforeach
</div>

<script>
    document.getElementById('search').addEventListener('keyup', function() {
        let input = this.value.toLowerCase();
        let books = document.getElementsByClassName('book');

        for (let i = 0; i < books.length; i++) {
            let bookName = books[i].getAttribute('data-name');
            if (bookName.includes(input)) {
                books[i].style.display = "block";
            } else {
                books[i].style.display = "none";
            }
        }
    });
</script>

@stop
