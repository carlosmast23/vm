
<div class="list-group">
	<h4 class="list-group-item-heading"><b>Precio: </b> ${pro_precio} - <b>Cantidad: </b>({pro_cantidad})</h4>
	<p class="list-group-item-text">
		<div class="row">
			<div class="col-xs-12 col-md-6">
				<b>Descripción: </b>{pro_desc} 
				<br>
				<b>Tipo: </b> <?php if ($pro_tipo=='n') echo "Nuevo";else echo "Usado";?>
				<br>
				<b>Entrega a domiclio: </b>  <?php if ($pro_entrega=='s') echo "Si";else echo "No";?>
				<br>
				<b>Observación: </b>{pro_obs}
			</div>
			<div class="col-xs-12 col-md-6">
				<button class="btn btn-primary col-xs-5 col-xs-offset-0" rel="aprobar" val="{pro_id}" prv_id="{prv_id}" bus_id="{bus_id}">Aprobar</button>
				<button class="btn btn-danger col-xs-5 col-xs-offset-1" rel="rechazar" val="{pro_id}">Rechazar</button>
			</div>
		</div>
	</p>
</div>
