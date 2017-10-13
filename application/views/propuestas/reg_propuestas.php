<br><br><br>
<div class="panel-group" id="accordion">
	<div class="col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Solicitud del cliente</a>
				</h4>

			</div>

			<div id="collapse1" class="panel-collapse collapse in">
				<div class="panel-body">
					<table class="table">
						<tr>
							<th>Producto solicitado:</th>
							<td><?=$bus_texto?></td>
						</tr>	
						<tr>
							<th>Fecha de solicitud:</th>
							<td><?=$bus_fecha?></td>
						</tr>		
						<tr>
							<th>Prioridad:</th>
							<td><?=$bus_tiempo_txt?></td>
						</tr>
						<tr>
							<th>Tiempo de respuesta:</th>
							<td><?=$bus_fechafin?></td>
						</tr>
					</table>


				</div>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Propuesta</a>
				</h4>		
			</div>
			<div id="collapse2" class="panel-collapse collapse in">
				<div class="panel-body">
					<form action="<?=base_url()?>propuestas/registrar_propuesta" method="POST" id="form_almacenar" enctype="multipart/form-data">
						<div class="col-md-12">
							<label>Descripción:</label>
							<textarea class="form-control" name="pro_desc" id="pro_desc" ></textarea>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Cantidad:</label>
								<input type="text" class="form-control" name="pro_cantidad" id="pro_cantidad" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Precio:</label>
								<input type="text" class="form-control" name="pro_precio" id="pro_precio" />
							</div>
						</div>
						<div class="col-md-6">
							<label>Observación:</label>
							<textarea class="form-control" name="pro_obs" id="pro_obs" rows="5"></textarea>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Tipo:</label><br>
								<input type="radio" name="pro_tipo" value="n" checked /> Nuevo
								<input type="radio" name="pro_tipo" value="u" /> Usado
							</div>
							<div class="form-group">
								<label>Entrega a domicilio:</label><br>
								<input type="radio" name="pro_entrega" value="n" checked /> No
								<input type="radio" name="pro_entrega" value="s" /> Si
							</div>
							<div class="form-group">
								<label>Imagen adjunta:</label><br>
								<input type="file" name="userfileTemp" id="userfileTemp" />
							</div>
						</div>
						<div class="col-md-6">
							<input type="hidden" name="bus_id" value="<?=$bus_id?>">
							<input type="hidden" name="prv_id" value="<?=$prv_id?>">
							<button type="submit" class="btn btn-success btn-block" id="almacenar">ENVIAR</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>

<!-- Agregado libreria de javascript para redimensionar las imagenes -->
<script type="text/javascript" src="<?=base_url()?>js/ImageTools.js"></script>

<script type="text/javascript">

	//Vaiable global que va a contener el archivo file comprimido 
	blobFile=null;

	$("#almacenar").click(function () {
		//$("#form_almacenar").submit(); //esta linea se comento porque generaba problemas implementando el metodo submit
	});

	$("#form_almacenar").validate({
		rules: {
			pro_desc: {required:true},
			pro_cantidad: {required: true, number: true},
			pro_precio: {required: true, number: true},
		},
		messages: {
			pro_desc: "* Campo requerido",
			pro_cantidad: "* Campo requerido, ingrese número válido",
			pro_precio: "* Campo requerido, ingrese número válido",
		}
	});

	/*$( "#form_almacenar" ).submit(
		function( event ) 
		{
			var form = $( "#form_almacenar" );
			var isValid = form.valid();
			alert(isValid);
		}
	);*/

	//Implementar el metodo submit del formulario para agregar manualmente los datos   
	$( "#form_almacenar" ).submit(
		function( event ) 
		{
			var form = $( "#form_almacenar" );
			if(!form.valid())
				return false; // Evita que si el formulario no esta validado no continuar con el envio de datos

		    var request = new XMLHttpRequest();

		    // Metodo que direcciona a la pagina correcta si el proceso es normal
		    request.addEventListener("load", function(event) 
		    {
		    	alert('carga terminada');
		        window.location.href = "<?=base_url()?>propuestas/successp";
		    });

		 	// Metodo que direcciona a la pagina de error si el proceso es incorrecto
		    request.addEventListener("error", function(event) 
		    {
		    	alert('carga con error');
		    	//Falta implementar  
		    });
	    	
	    	//Objeto del formulario creado desde 0 seteando las propiedades del formulario
	    	var formData = new FormData();
	    	formData.append("prv_id",$("#prv_id").val());
	    	formData.append("bus_id",$("#bus_id").val());
	    	formData.append("pro_desc",$("#pro_desc").val());
	    	formData.append("pro_cantidad",$("#pro_cantidad").val());
	    	formData.append("pro_precio",$("#pro_precio").val());
	    	formData.append("pro_tipo",$("#pro_tipo").val());
	    	formData.append("pro_entrega",$("#pro_entrega").val());
	    	formData.append("pro_obs",$("#pro_obs").val());
	    	
	    	//Seteando el valor del archivo que fue modificado sus dimenciones
	    	formData.append("userfile",blobFile);

	    	//Configurando metodo de envio y direccion
	 		request.open("POST", "<?=base_url()?>propuestas/registrar_propuesta");
			request.send(formData);

			//Cancelar el evento por defecto de la funcion
			event.preventDefault();
		}
	);

	//Implementado el metodo cuando se realiza algun cambio en el file
	$( "#userfileTemp" ).change(
		function() 
		{
			//Obtener solo el primer archivo que se cargo en el file
			fileTemp=this.files[0]

			//Libreria que permie modificar las dimensiones de la imagen
  			ImageTools.resize(this.files[0], 
		    {
		        width: 800, // maximum width
		        height: 800 // maximum height
		    }, 
		    function(blob, didItResize) 
		    {
		    	//Blob.- es el archivo sin formato reducido el tamaño
		    	//didItResize .- Variable booleana que devuelve true si la imagen se modifico o false si no sufrio transformacion	    	
		    	//Convertir el archivo blob a File para agregar al formulario posteriormente
		        blobFile = new File([blob], fileTemp.name, {type: fileTemp.type, lastModified: Date.now()});

		    });
		}
	);

</script>