$(document).ready(function() {

	if ($(".chosen-select").length)
		$(".chosen-select").chosen({no_results_text: "No existe informacion", width: "80%"});

	$("#almacenar").click(function (e) {
		$("#form_almacenar").submit();
	});

	var prv_id=$("#prv_id").val();
	var deque=$("#deque").val();


	$("#form_almacenar").validate({
		rules: {
			prv_usuario: "required",
			prv_telefono: {
				required: true,
				minlength: 10,
				remote: $("#base_url").val() + "validaciones/prov/" + prv_id + "/t/"+deque
			},
			prv_email: {
				required: true,
				email: true,
				remote: $("#base_url").val() + "validaciones/prov/" + prv_id + "/e/"+deque
			},
			prv_direccion:"required",
			act_id:"required",
			loc_latitud:"required",
			loc_longitud:"required",
		},
		messages: {
			prv_usuario: "* Campo requerido",
			prv_telefono: {
				required:"* Campo requerido, ingrese numero celular (0994725020)",
				minlength:"* Ingrese un numero celular válido",
				remote: "* Este numero celular ha sido usado ",
			},
			prv_email: {
				required: "* Campo requerido, ingrese email válido",
				email: "* Ingrese correo electrónico válido  ejm: name@domain.com",
				remote: "* Este correo electrónico ya ha sido usado ",
			},
			prv_direccion:"* Campo requerido. Ingrese direccón",
			act_id:"* Campo requerido",
			loc_latitud:"* Campo requerido. Ingrese latitud",
			loc_longitud:"* Campo requerido. Ingrese longitud",
		}
	});

	$('[data-toggle="popover"]').popover();   

	$("a[rel='mapa']").on('click', function (ev) {
		var url = $('#base_url').val() + "admin/localidades/mapa";
		$.ajax({
			url: url
		}).success(function (result) {
			$("#myModal").html(result);
			$('#myModal').modal('show');
		});
		ev.preventDefault();
	});

	$("#almacenar").prop("disabled", true);
	$("#acepto").click(function () {
		if ($('#acepto').prop('checked'))
			$("#almacenar").attr("disabled", false) ;
		else
			$("#almacenar").attr("disabled", true);

	});

});
