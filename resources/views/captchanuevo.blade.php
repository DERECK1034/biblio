<script type="text/javascript">
    $(document).ready(function(){

        $("#otro").click(function() {
            $("#seleccionacaptcha").load('{{url('captchanuevo')}}');
        });
    });
    </script>
    
    <img src="{{asset('captchas/'.$captcha->ruta)}}" height='120' width='150'>
            <input type="button" value="Otro" id="otro" class="btn btn-info btn-sm">
            <br>
        
            <br>
            Teclea el valor del captcha
            <input type="hidden" name="textcap" id="textcap" value="{{$captcha->idcap}}"><br>