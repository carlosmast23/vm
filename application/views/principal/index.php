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
<!--
            <div class="mouse">
                <div class="scroll"></div>
            </div>
          -->
        </section>


        <link href="<?= base_url(); ?>assets/bootstrap-chosen-master/bootstrap-chosen.css" media="screen" rel="stylesheet" type="text/css">


        <div class="row">

          <form class="" action="#" id="form_buscar">

            <div class="col-xs-12 col-xs-offset-0 col-sm-7 col-sm-offset-0 col-md-6 col-md-offset-1">
              <input type="text" class="form-control" id="txt_buscar"  placeholder="Escribe aquí lo que que estas buscando de manera detallada...">
            </div>
    <!--
    <div class="col-xs-12 col-xs-offset-0 col-sm-3 col-sm-offset-0 col-md-4 col-md-offset-0 ">
      <?=$cmb_actividades?>
    </div>
  -->
  <div class="col-xs-12 col-xs-offset-0 col-sm-2 col-sm-offset-0 col-md-3 col-md-offset-0 ">
    <button class="btn btn-primary btn-block" type="button" data-toggle="modal" data-target="#mbuscar">Buscar</button>
  </div>
</form>


</div>
<br>
<div class="alert alert-info">
  <p><b>Ejemplo 1:</b> Zapatos deportivas marca nike de $50 en adelante.</p>
  <p><b>Ejemplo 2:</b> Camisetas deportivas marca adidas para mujer.</p>
  <p><b>Ejemplo 3:</b> Sala de eventos para cumpleaños.</p>
</div>

<div class="container-fluid text-center">    
  <div class="row">
   <img 
   src="<?=base_url()?>img/banner-sd.png" alt="Instrucciones" width="100%" height="100%" srcset="<?=base_url()?>img/banner-hd.png 1024w , 
   <?=base_url()?>img/banner-md.png 700w , 
   <?=base_url()?>img/banner-sd.png 360w" 
   />
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
           <li>* Seleccione la categoría.</li>  
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


</div><!-- .container -->



<script src="<?= base_url() ?>assets/choseen/chosen.jquery.js"></script>
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
 


});

</script>

