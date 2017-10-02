	<div class="container">

		<form action="<?=base_url()?>admin/actividades/almacenar" method="post">
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nombre:</label>
				<div class="col-sm-10">
					<input class="form-control" type="text" id="act_nombre" name="act_nombre" placeholder="Ingrese nombre de la actividad">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Descripción:</label>
				<div class="col-sm-10">
					<textarea class="form-control" id="act_descripcion" name="act_descripcion" placeholder="Ingrese descripcion de la actividad comercial"></textarea> 
				</div>
			</div>
			
			<div class="form-group row">
				<div class="center">
					<button type="submit" class="btn btn-primary">REGISTRAR</button>
				</div>
			</div>
		</form>
	</div>