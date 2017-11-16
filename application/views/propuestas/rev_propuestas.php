<div class="panel panel-primary">
	<div class="panel-heading">Propuestas para  <b>'<?=datoDeTablaCampo("busquedas","bus_id","bus_texto",$bus_id)?>' </b>  (*Escoja una propuesta) </div>
	<div class="panel-body">
		<?=$html?>
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


<div class="modal fade" id="infop" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Aviso!</h4>
			</div>
			<div class="modal-body">
				<div class="alert alert-info">
					<b>*</b> Gracias por preferirnos. 
					<br>
					<b>*</b> En un momento se comunicaran contigo.
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" id="cerrar">Cerrar</button>
			</div>
		</div>
	</div>
</div>


<input type="hidden" name="bus_id" id="bus_id" value="<?=$bus_id?>" />
<script type="text/javascript" src="<?=base_url()?>js/rev_propuestas.js"></script>
