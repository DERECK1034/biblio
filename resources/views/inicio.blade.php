@extends('principal')

@section('contenido')
<style>
@import url('https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap');

h1 {
    color: white;
    font-family: 'Times New Roman', Times, serif;
}
.c {
  min-width: 1100px;
  width: 1100px; 
  height: 600px;
  left: 350px; 
  border-radius: 12px;
  padding: 20px;
  padding-bottom: 40px;
  box-shadow: 0 8px 48px 2px hsla(10 6% 15% / .4);

  display: flex;
  align-items: flex-end;
  justify-content: center;

  position: relative;
  overflow: hidden;
  background: hsl(0 0% 90%);

  box-sizing: border-box;
}

.ci {
  position: absolute;
  top: 0;
  left: 0;

  width: inherit;
  height: inherit;
  transform-origin: left 50%;

  background: inherit;

  z-index: var(--z);
  transition: .3s ease-out;
}

.ci img {
  -moz-user-select: none;
  user-select: none;
  width: 100%; 
  height: 100%;
  object-fit: cover; 
}

.ch {
  position: absolute;
  top: 70%;
  left: 4%;
  transform: translateY(-50%);

  font-size: 2.5rem; 
  color: hsla(var(--h) var(--s) var(--l) / .8);
  text-shadow: 0 2px 10px hsla(var(--h) var(--s) 10% / .3);
}

input {
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
  z-index: -10;
}

label {
  width: 12%; 
  height: 12px; 
  margin-right: 4px;
  border-radius: 20px;

  background: hsla(0 0% 90% / .3);
  cursor: pointer;

  position: relative;
  z-index: 10;
}

label:last-child {
  margin-right: 0;
}

input:checked+label {
  background: linear-gradient(to right,
  #692907, 
  #692907);
}

input:not(:checked)+label+.ci {
  transform: translateX(-100%);
  opacity: 0;
}

input:checked+label+.ci~.ci {
  transform: translateX(100%);
}

input:not(:checked)+label+.ci {
  transition: 0;
}

.abs-site-link {
  position: fixed;
  z-index: 11;
  bottom: 20px;
  left: 20px;
  color: hsla(32 50% 50% / .8);
  font-size: 1.6rem;
  font-weight: bold;
  border-bottom: 3px solid currentColor;
  text-decoration: none;
  background-color: inherit;
}

.abs-profiles {
  position: fixed;
  z-index: 10;
  right: 20px;
  bottom: 23px;
  opacity: .8;
}

.abs-profiles img {
  filter: hue-rotate(71deg) brightness(1.1);
}

.abs-profiles a {
  display: inline-block;
  margin-left: 6px;
}
</style>


<center>
<h1>@if (Session::has('sesionname'))
      <div>BIENVENIDO
          <br>{{ Session::get('sesionname')}}
        @endif</h1>
</center>
<br>
<div class="c">

  <input type="radio" name="a" id="cr-1" checked>
  <label for="cr-1" style="--hue: 32"></label>
  <div class="ci" style="--z: 4">
    <h2 class="ch" style="--h: 32; --s: 80%; --l: 90%"></h2>
    <img src="{{ asset('archivos/b1.jpg') }}" alt="Snow on leafs">
  </div>

  <input type="radio" name="a" id="cr-2">
  <label for="cr-2" style="--hue: 82"></label>
  <div class="ci" style="--z: 3">
    <h2 class="ch" style="--h: 82; --s: 80%; --l: 90%"></h2>
    <img src="{{ asset('archivos/b2.jpg') }}" alt="Trees">
  </div>

  <input type="radio" name="a" id="cr-3">
  <label for="cr-3" style="--hue: 40"></label>
  <div class="ci" style="--z: 2">
    <h2 class="ch" style="--h: 40; --s: 100%; --l: 89%"></h2>
    <img src="{{ asset('archivos/b3.jpg') }}" alt="Mountains and houses">
  </div>

  <input type="radio" name="a" id="cr-4">
  <label for="cr-4" style="--hue: 210"></label>
  <div class="ci" style="--z: 1">
    <h2 class="ch" style="--h: 210; --s: 70%; --l: 90%"></h2>
    <img src="{{ asset('archivos/b4.jpg') }}" alt="Sky and mountains">
  </div>

</div>

@stop