<style>
    .alerta{
        width: 500px;
    }
</style>
@if($bandera==1)
<div class="alerta">
    <div class="alert alert-dismissible alert-danger">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Oh no!</strong>  El captcha que introdujo no es correcto
    </div>
</div>
@endif

@if($bandera==2)
<div class="alerta">
    <div class="alert alert-dismissible alert-danger">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Oh no!</strong>  El correo ingresado no existe 
    </div>
</div>
@endif

@if($bandera==3)
<div class="alerta">
    <div class="alert alert-dismissible alert-success">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Muchas Gracias</strong> En este momento enviaremos un correo con su nueva contraseña
    </div>
</div>
@endif
