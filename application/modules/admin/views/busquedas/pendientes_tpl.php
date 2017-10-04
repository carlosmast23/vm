<form id="form_{bus_id}" method="POST" action="<?=base_url()?>admin/busquedas/asignar">

	<tr>
		<td>
			{bus_texto}
			<br>
		<b>Responder: </b>	{bus_fechafin}
		</td>

		<td>{cmb_actividades} </td>
		<td>

			<input type="submit" value="Enviar" class="btn btn-primary"/>
		</td>
	</tr>

	<input type="hidden" name="bus_id" id="bus_id" value="{bus_id}" />
</form>
