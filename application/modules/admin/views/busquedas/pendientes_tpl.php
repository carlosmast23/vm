	<tr >
		<form id="form_{bus_id}" method="POST" action="<?=base_url()?>admin/busquedas/asignar">

			<td style="background-color: {color}">
				{bus_fechafin}
			</td>
			<td>
				{bus_texto}
			</td>
			<td>
				<div class="row">
					<div class="col-md-12">
						<a href="<?=base_url()?>admin/busquedas/asignar_prov/{bus_id}" class="btn btn-primary" rel="asignar" bus_id="{bus_id}" class="col-md-6">Asignar</a>	

						<a href="<?=base_url()?>admin/busquedas/eliminar/{bus_id}" class="btn btn-danger" rel="eliminar" bus_id="{bus_id}" class="col-md-6">Eliminar</a>
					</div>
				</div>
				
			</td>

		</form>

	</tr>

