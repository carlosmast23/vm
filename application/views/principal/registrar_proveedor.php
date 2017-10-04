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
    <script>
    	if ($(".chosen-select").length)
    		$(".chosen-select").chosen({no_results_text: "No existe informacion", width: "80%"});
    </script>

    <script type="text/javascript">

    	$("#almacenar").click(function () {
    		$("#form_almacenar").submit();
    	});

    	$("#form_almacenar").validate({
    		rules: {
    			prv_usuario: "required",
    			prv_telefono: {required: true, digits: true,minlength:10,maxlength:10},
    			prv_email: {
    				required: true,
    				email: true,
    			},
    			act_id:"required"

    		},
    		messages: {

    			prv_usuario: "* Campo requerido",
    			prv_telefono: {
    				required:"* Campo requerido, ingrese numero celular (0994725020)",
                    digits:"* Solo se puede ingresar números",
    				maxlength:"* Ingrese numero celular válido (0994725020)"
    			},
    			prv_email: {
    				required: "* Campo requerido, ingrese email válido",
    				email: "* Ingrese correo electrónico válido  ejm: name@domain.com",
    				remote: "* Este correo electrónico ya ha sido usado "
    			},
                act_id:"* Campo requerido"
    		}
    	});

    </script>