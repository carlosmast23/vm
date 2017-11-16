<link href="<?= base_url(); ?>assets/bootstrap-chosen-master/bootstrap-chosen.css" media="screen" rel="stylesheet" type="text/css">

	
<div class="container-fluid">

 <div class="panel panel-primary">
  <div class="panel-heading">Registro Proveedor</div>
  <div class="panel-body">
   <form action="<?=base_url()?>general/registrar_proveedor" method="POST" id="form_almacenar">
    <div class="form-group">
     <label title="Usuario o nick" data-toggle="popover" data-trigger="hover" data-content="Ejemplo: alcodejc / sin espacios" data-placement="bottom">Usuario o nick:</label>
     <input type="text" class="form-control" name="prv_usuario" id="prv_usuario" />
   </div>
   <div class="form-group">
     <label>Email:</label>
     <input type="email" class="form-control" name="prv_email" id="prv_email" placeholder="demo@dominio.com" />
   </div>
   <div class="form-group">
     <label>Celular:</label>
     <input type="number" class="form-control" name="prv_telefono" id="prv_telefono" placeholder="0983528439" />
   </div>	
   <div class="form-group">
     <label>Actividad:</label>
     <?=$cmb_actividades?>
   </div>

   <button type="button" class="btn btn-primary" id="almacenar">ENVIAR</button>
   <input type="hidden" name="prv_id" id="prv_id" value="0" />
   <input type="hidden" name="deque" id="deque" value="c" />

 </form>
</div>
</div>


</div>


<script src="<?= base_url() ?>assets/choseen/chosen.jquery.js"></script>
<script src="<?= base_url() ?>js/reg_proveedor.js"></script>
