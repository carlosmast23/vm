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
<script type="text/javascript" src="<?=base_url()?>js/rev_propuestas.js"></script>
