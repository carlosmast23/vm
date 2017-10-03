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
					<form action="<?=base_url()?>general/registrar_propuesta" method="POST" id="form_almacenar">
						<div class="col-md-12">
							<label>Descripción:</label>
							<textarea class="form-control" name="pro_desc" id="pro_desc"></textarea>
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
							<textarea class="form-control" name="pro_obs" id="pro_obs"></textarea>
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


<script type="text/javascript">

	$("#almacenar").click(function () {
		$("#form_almacenar").submit();
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

</script>