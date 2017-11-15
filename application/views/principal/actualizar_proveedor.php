<link href="<?= base_url(); ?>assets/bootstrap-chosen-master/bootstrap-chosen.css" media="screen" rel="stylesheet" type="text/css">

<div class="container-fluid">

 <div class="panel panel-primary">
  <div class="panel-heading">Registro Proveedor</div>
  <div class="panel-body">
    <form class="form-horizontal" action="<?=base_url()?>general/actualizar_prov" method="POST" id="form_almacenar">
     <div class="col-md-6">
       <div class="form-group">
         <label class="col-md-2 control-label">Usuario:</label>
         <div class="col-md-8">
           <input type="text" class="form-control" name="prv_usuario" id="prv_usuario" value="<?=$prv_usuario?>" />
         </div>
       </div>
       <div class="form-group">
         <label class="col-md-2 control-label">*Email:</label>
         <div class="col-md-8">
           <input type="text" class="form-control" name="prv_email" id="prv_email" value="<?=$prv_email?>" placeholder="demo@dominio.com"/>
         </div>
       </div>
       <div class="form-group">
         <label class="col-md-2 control-label" title="Celular" data-toggle="popover" data-trigger="hover" data-content="Ejemplo: 0983528439" data-placement="bottom">*Celular:</label>
         <div class="col-md-8">
           <input type="text" class="form-control" name="prv_telefono" id="prv_telefono" value="<?=$prv_telefono?>" placeholder="0983528439"/><span id="alert"></span> <input type="hidden" value="false" name="bandera" id="bandera" />
         </div> 
       </div>
       <div class="form-group">
       <label class="col-md-2 control-label">Teléfono:</label>
         <div class="col-md-8">
           <input type="text" class="form-control" name="prv_convencional" id="prv_convencional" value="<?=$prv_convencional?>" />
         </div>
       </div> 
       <div class="form-group">
         <label class="col-md-2 control-label">RUC:</label>
         <div class="col-md-8">
           <input type="text" class="form-control" name="prv_ruc" id="prv_ruc" value="<?=$prv_ruc?>" />
         </div>
       </div>
     </div>
     <div class="col-md-6">
       <div class="form-group">
         <label class="col-md-3 control-label">Razon social:</label>
         <div class="col-md-8">
           <input type="text" class="form-control" name="prv_razonsocial" id="prv_razonsocial" value="<?=$prv_razonsocial?>" />
         </div>   
       </div>   
       <div class="form-group">
         <label class="col-md-3 control-label">Representante legal:</label>
         <div class="col-md-8">
           <input type="text" class="form-control" name="prv_representante" id="prv_representante" value="<?=$prv_representante?>" />
         </div> 
       </div>      
       <div class="form-group">
         <label class="col-md-3 control-label">Actividad:</label>
         <div class="col-md-8">    
           <?=$cmb_actividades?>
         </div>
       </div>
     </div>
     <div class="col-md-12"> 
      <div class="form-group">
        <label class="col-md-2 control-label">Direccion</label>
        <div class="col-md-6">
          <input type="text" class="form-control" name="prv_direccion" id="prv_direccion" placeholder="Ingrese direccion y seleccionar ubicación"/>
        </div>
        <div class="col-md-3">
          <label>Mapa <span class="glyphicon glyphicon-screenshot"></span> </label>
          <a href="#" rel="mapa" title="Tu ubicación" data-toggle="popover" data-trigger="hover" data-content="Esto nos ayuda a encontrar clientes cercanos a tu negocio.">Aqui tu ubicación</a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="col-md-2 control-label">Latitud</label>
        <div class="col-md-8">
          <input type="text" class="form-control" name="loc_latitud" id="loc_latitud" placeholder="Mi latitud" readonly="false"/>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="col-md-2 control-label">Longitud</label>
        <div class="col-md-8">
          <input type="text" class="form-control" name="loc_longitud" id="loc_longitud" placeholder="Mi longitud" readonly="false"/>
        </div>
      </div>
    </div>

    <input type="hidden" name="coordenadas" id="coordenadas"/>
    <div class="col-md-2 col-md-offset-5">
      <button type="button" class="btn btn-primary btn-block" id="almacenar">ENVIAR</button>
    </div>
    
    <input type="hidden" name="prv_id" id="prv_id" value="<?=$prv_id?>" />
    <input type="hidden" name="deque" id="deque" value="m" />
  </form>
</div>
</div>


</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"></div>

<script src="<?= base_url() ?>assets/choseen/chosen.jquery.js"></script>
<script src="<?= base_url() ?>js/reg_proveedor.js"></script>


<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDFvGA-_lV83Zp6DPbbXMbtPVaMimUiOek&libraries=places"></script>
<script src="<?= base_url() ?>js/admin/mapa.js"></script>

