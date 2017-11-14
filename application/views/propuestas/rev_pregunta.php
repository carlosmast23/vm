<div class="panel panel-primary">
	<div class="panel-heading">Un proveedor ha preguntado "<b><?=$prg_pregunta?></b>" </div>
	<div class="panel-body">
		<p>
			Tu busqueda: <b>'<?=datoDeTablaCampo("busquedas","bus_id","bus_texto",$bus_id)?>' </b>, fecha   <?=datoDeTablaCampo("busquedas","bus_id","bus_fecha",$bus_id)?>
		</p>
		<form action="<?=base_url()?>propuestas/registrar_respuesta" method="POST">
			<div class="col-md-12">
				<label>Ingrese respuesta:</label>
				<textarea class="form-control" name="prg_respuesta" id="prg_respuesta"></textarea>
				<br>
				<input type="hidden" name="prg_id" id="prg_id" value="<?=$prg_id?>">
				<button type="submit" class="btn btn-success">ENVIAR</button>
			</div>
		</form>

	</div>
</div>

