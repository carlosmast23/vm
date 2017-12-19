<!-- box-intro -->
<section class="box-intro">
  <div class="table-cell">
    <h1 class="box-headline letters rotate-2">
      <span class="box-words-wrapper">
        <b class="is-visible">QUE &nbsp; NECESITAS ?.</b>
        <b >&nbsp;VIRTUALL MALL .</b>
        <b>LO &nbsp; TIENE.</b>
      </span>
    </h1>
    <h5>
      Forma parte de nuestra cadena de clientes, proveedores y negocios locales, <b class="numprov"> ya somos <?=$numprov?> </b> <a href="<?=base_url()?>general/registro">Registrate aqui</a></h5>
    </div>

  </section>

  <link href="<?= base_url(); ?>assets/bootstrap-chosen-master/bootstrap-chosen.css" media="screen" rel="stylesheet" type="text/css">

  <div class="row" id="cont_busqueda">
    <form class="" action="#" id="form_buscar">
      <div class="col-xs-12 col-xs-offset-0 col-sm-7 col-sm-offset-0 col-md-6 col-md-offset-1">
        <input type="text" class="form-control" id="txt_buscar"  placeholder="Escribe aquí lo que que estas buscando de manera detallada..." maxlength="100" >
      </div>

      <div class="col-xs-12 col-xs-offset-0 col-sm-2 col-sm-offset-0 col-md-3 col-md-offset-0 ">
        <button class="btn btn-success btn-block" type="button" data-toggle="modal" data-target="#mbuscar">Buscar</button>
      </div>

    </form>
    <div class="col-md-12 text-center">
      <p><b>Ejemplo :</b> Zapatos deportivos marca nike de $50 en adelante.</p>
    </div>
  </div>


  <div class="container-fluid">    
    <div class="row">
     <img 
     src="<?=base_url()?>img/banner-sd.png" alt="Instrucciones" width="100%" height="100%" srcset="<?=base_url()?>img/banner-hd.png 1024w , 
     <?=base_url()?>img/banner-md.png 700w , 
     <?=base_url()?>img/banner-sd.png 360w" 
     />
   </div>


   <br>
   <div class="row">
    <div class="col-md-4">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <?=$anuncios?>
        </div>


        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
    </div>
    <div class="col-md-8">
      <div class="alert alert-success">   <span class="glyphicon glyphicon-bell" id="txtnovedad">  Novedades</span>
      </div>
      <table class="table" id="transacciones">
       <?=$transacciones?>
     </table>
   </div>



 </div>
</div>



<div id="mbuscar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Información</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label>Ingresa tu número de celular (Ejm: 0994725020)</label>
            <input type="number" class="form-control" id="celular" value="" maxlength="10"  />
          </div>

          <div class="form-group">
            <label>Seleccione el tiempo de respuesta</label>
            <div class="funkyradio">

              <div class="funkyradio-primary">
                <input type="radio" name="radio" id="radio6" value="d" checked />
                <label for="radio6">Moderada (1 semana)</label>
              </div>
              <div class="funkyradio-success">
                <input type="radio" name="radio" id="radio3" value="m" />
                <label for="radio3">Media (1 dia)</label>
              </div>
              <div class="funkyradio-warning">
                <input type="radio" name="radio" id="radio5" value="a" />
                <label for="radio5">Alta (1 hora)</label>
              </div>
              <div class="funkyradio-danger">
                <input type="radio" name="radio" id="radio4" value="u" />
                <label for="radio4">Urgente (30 minutos)</label>
              </div>

            </div>

          </div>

        </form>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="enviar">Enviar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>

  </div>
</div>



<div class="modal fade" id="info_error" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Aviso</h4>
      </div>
      <div class="modal-body">
       <div class="alert alert-danger">
         <strong>Datos obligatorios:</strong> 
         <ul>
           <li>* Ingrese un texto para su búsqueda.</li>  
           <li>* Ingrese número de celular para contactarnos con usted. </li>  
           <li>* Seleccione el tiempo en que desea obtener una respuesta. </li>  
         </ul>   
       </div>
     </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="info" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Aviso!</h4>
      </div>
      <div class="modal-body">
       <div class="alert alert-info">
         <b>*</b> Tu solicitud ha sido enviada a nuestros proveedores.
         <b>*</b> Espera un momento y obtendras una respuesta.
       </div>
     </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="video" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Virtual Mall!</h4>
      </div>
      <div class="modal-body">

       <div id="player">

       </div>

     </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal" id="cerrarvm">Cerrar</button>
    </div>
  </div>
</div>
</div>




</div><!-- .container -->



<script src="<?= base_url() ?>assets/choseen/chosen.jquery.js"></script>

<script>
  'use strict';
    // repeat with the interval of 2 seconds
    //let timerId = setInterval(() => alert('tick'), 2000);
    
    // after 5 seconds stop
    setTimeout(() => { $("#video").modal("show"); }, 5000);
  </script>


  <script>
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '400',
          width: '100%',
          videoId: 'jk4BntyPKD4',
          events: {
            'onReady': onPlayerReady,
            //'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 6000);
          done = true;
        }
      }
      function stopVideo() {
        player.stopVideo();
      }


      $("#cerrarvm").on("click",function () {
        stopVideo();
      });
    </script>

    <script>


     if ($(".chosen-select").length)
      $(".chosen-select").chosen({no_results_text: "No existe informacion", width: "100%"});

    $("#enviar").on("click",function () {

      var tiempo= $('input:radio[name=radio]:checked').val()

      $("#mbuscar").modal("hide");

  var act_id = 0;//$("#act_id").val();
  var celular=$("#celular").val();
  var txt_buscar=$("#txt_buscar").val();

  if((celular.length==10 && isNaN(celular)==false)  && txt_buscar.length>3 && $('input:radio[name=radio]').is(':checked') ){

    var base_url = $("#base_url").val();
    $.ajax({
      type: "POST",
      url: base_url + "busquedas/buscar",
      data: {act_id: act_id,celular:celular,txt_buscar:txt_buscar,tiempo:tiempo},
      success: function (data) {
        $("#info").modal("show");
      }
    });
  }else{
   $("#info_error").modal("show");
 }
 
 $("#txt_buscar").val("");


});



</script>

