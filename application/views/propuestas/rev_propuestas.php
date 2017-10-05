<br><br><br>
<div class="panel panel-primary">
	<div class="panel-heading">Propuestas para  <b>'<?=datoDeTablaCampo("busquedas","bus_id","bus_texto",$bus_id)?>' </b>  (*Escoja una propuesta) </div>
	<div class="panel-body">
		<?=$html?>
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

<script type="text/javascript">


	$("button[rel='aprobar']").click(function () {
		var val=$(this).attr('val');
		var prv_id=$(this).attr('prv_id');
		var bus_id=$(this).attr('bus_id');
		var v=$(this);
		$.ajax({
			type: "POST",
			url: $("#base_url").val() + "propuestas/aprobar",
			data: {pro_id: val,prv_id:prv_id,bus_id:bus_id},
			success: function () {
				$("#infop").modal("show");
				v.prop( "disabled", true );
				setTimeout(location.reload(), 20000) 
			}
		});
	});

	$("button[rel='rechazar']").click(function () {
		if (confirm("Esta seguro que desea eliminar esta propuesta?") == true){ 
			var val=$(this).attr('val');
			$.ajax({
				type: "POST",
				url: $("#base_url").val() + "propuestas/rechazar",
				data: {pro_id: val},
				success: function () {
					location.reload();
				}
			});
		}
	});

</script>