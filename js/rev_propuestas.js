$(document).ready(function() {

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

	$("button[rel='rechazar']").click(function (e) {
		e.preventDefault();
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

});
