<div class="container-fluid">
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

			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Solicitar más información</a>
					</h4>
				</div>

				<div id="collapse3" class="panel-collapse collapse in">
					<div class="panel-body">
						<form action="#" method="POST" id="form_almacenarp" >
							<div class="col-md-12">
								<label>Ingrese pregunta a realizar al cliente:</label>
								<p><strong>*</strong>Si necesitas mas información antes de generar la propuesta </p>
								<textarea class="form-control" name="prg_pregunta" id="prg_pregunta" ></textarea>
							</div>
							<div class="col-md-3">
								<input type="hidden" name="bus_id" id="bus_id" value="<?=$bus_id?>">
								<input type="hidden" name="prv_id" id="prv_id" value="<?=$prv_id?>">
								<button type="button" class="btn btn-success btn-block" id="almacenarp">ENVIAR</button>
							</div>

						</form>
						<div class="col-md-12">

							<label>Preguntas registradas:</label>

							<table class="table">
								<tr>
									<th>Pregunta</th>
									<th>Respuesta</th>
								</tr>
								<?=$preguntas?>
							</table>

						</div>
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
									<input type="number" class="form-control" name="pro_cantidad" id="pro_cantidad" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Precio:</label>
									$<input type="number" class="form-control" name="pro_precio" id="pro_precio" />
								</div>
							</div>
							<div class="col-md-6">
								<label>Observación:</label>
								<textarea class="form-control" name="pro_obs" id="pro_obs" rows="5"></textarea>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Tipo:</label><br>
									<input type="radio" name="tipo" id="pro_tipo_n" value="n" checked /> Nuevo
									<input type="radio" name="tipo" id="pro_tipo_u" value="u" /> Usado
								</div>
								<div class="form-group">
									<label>Entrega a domicilio:</label><br>
									<input type="radio" name="entrega" id="pro_entrega_n" value="n" checked /> No
									<input type="radio" name="entrega" id="pro_entrega_s" value="s" /> Si
								</div>
								<div class="form-group">
									<label>Imagen adjunta:</label><br>
									<input type="file" name="userfileTemp" id="userfileTemp" />
								</div>
							</div>
							<div class="col-md-6">
								<input type="hidden" name="pro_tipo" id="pro_tipo">
								<input type="hidden" name="pro_entrega" id="pro_entrega">
								<input type="hidden" name="bus_id" id="bus_id" value="<?=$bus_id?>">
								<input type="hidden" name="prv_id" id="prv_id" value="<?=$prv_id?>">
								<button type="submit" class="btn btn-success btn-block" id="almacenar">ENVIAR</button>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>


	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
		<div id="map"></div>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFvGA-_lV83Zp6DPbbXMbtPVaMimUiOek"></script>

		<script>
			function initialize() {
				var marcadores = [
				<?=$data?>
				];
				var map = new google.maps.Map(document.getElementById('map'), {
					zoom: 8,
					center: new google.maps.LatLng(-0.1865938, -78.5706269),
					mapTypeId: google.maps.MapTypeId.ROADMAP
				});
				var infowindow = new google.maps.InfoWindow();
				var marker, i;
				for (i = 0; i < marcadores.length; i++) {  
					marker = new google.maps.Marker({
						position: new google.maps.LatLng(marcadores[i][1], marcadores[i][2]),
						map: map
					});
					google.maps.event.addListener(marker, 'click', (function(marker, i) {
						return function() {
							infowindow.setContent(marcadores[i][0]);
							infowindow.open(map, marker);
						}
					})(marker, i));
				}
			}
			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
	</div>
</div>


<!-- Agregado libreria de javascript para redimensionar las imagenes -->
<script type="text/javascript" src="<?=base_url()?>js/ImageTools.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/propuestas.js"></script>


