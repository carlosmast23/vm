<form id="form_{bus_id}" method="POST" action="<?=base_url()?>admin/busquedas/asignar">
	<tr>
		<td>
			{bus_texto}
			<br>
			<b>Responder: </b>	{bus_fechafin}
		</td>
		<td>
		</td>
		<td>
			<div class="col-md-6">
				<?php if($bus_tiempo=='n'): ?> 
					<select name="tiempo" id="tiempo" class="form-control">
						<option value="">Tiempo:</option>
						<option value="d">Moderada (1 semana)</option>
						<option value="m">Media (1 dia)</option>
						<option value="a">Alta (1 hora)</option>
						<option value="u">Urgente (30 minutos)</option>
					</select>
				<?php else:?>
					<b>*Tiempo asignado</b>
				<?php endif;?>
			</div>
			<div class="col-md-6">
				{cmb_actividades} 
			</div>
		</td>
		<td>
			<input type="submit" value="Enviar" class="btn btn-primary"/>
		</td>
	</tr>

	<input type="hidden" name="bus_id" id="bus_id" value="{bus_id}" />
</form>
