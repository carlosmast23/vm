<br><br><br>
<table class="table">
	<tr>
		<th>Fecha limite</th>
		<th>Producto</th>
		<th >Opciones</th>
	</tr>	
	<?=$html?>	
</table>	

<script>
	$("a[rel='eliminar']").click(function () {
		if (confirm("Esta seguro que desea eliminar esta propuesta?") == true){ 
			var bus_id=$(this).attr('bus_id');
			$.ajax({
				type: "POST",
				url: $("#base_url").val()+"admin/busquedas/eliminar/"+bus_id,
				success: function () {
					location.reload();
				}
			});
		}
	});
</script>