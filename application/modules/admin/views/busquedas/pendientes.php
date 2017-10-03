<br><br><br>

<table class="table table-striped">
	<tr>
		<th>Producto</th>
		<th colspan="2">Opciones</th>
	</tr>	
	<?=$html?>	

</table>	
<script type="text/javascript">
	
	

	$("[rel='aprobar']").click(function () {
		$("[rel='combo_act']").each(function () {
			var variable_id = $(this).attr('id');
			alert(variable_id);
			console.log(variable_id);
		});
	});


</script>