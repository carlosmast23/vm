<link href="<?= base_url(); ?>assets/bootstrap-chosen-master/bootstrap-chosen.css" media="screen" rel="stylesheet" type="text/css">

<br>	
<br>	
<br>	
<div class="container-fluid">

   <div class="panel panel-primary">
      <div class="panel-heading">Registro Proveedor</div>
      <div class="panel-body">
         <form action="<?=base_url()?>general/registrar_proveedor" method="POST" id="form_almacenar">
            <div class="form-group">
               <label>Usuario o nick:</label>
               <input type="text" class="form-control" name="prv_usuario" id="prv_usuario" />
           </div>
           <div class="form-group">
               <label>Email:</label>
               <input type="text" class="form-control" name="prv_email" id="prv_email" />
           </div>
           <div class="form-group">
               <label>Celular:</label>
               <input type="text" class="form-control" name="prv_telefono" id="prv_telefono" />
           </div>	
           <div class="form-group">
               <label>Actividad:</label>
               <?=$cmb_actividades?>
           </div>

           <button type="button" class="btn btn-primary" id="almacenar">ENVIAR</button>
       </form>
   </div>
</div>


</div>


<script src="<?= base_url() ?>assets/choseen/chosen.jquery.js"></script>
<script src="<?= base_url() ?>js/reg_proveedor.js"></script>
