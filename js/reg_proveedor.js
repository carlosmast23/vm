$(document).ready(function() {

	if ($(".chosen-select").length)
		$(".chosen-select").chosen({no_results_text: "No existe informacion", width: "80%"});

	$("#almacenar").click(function () {
		$("#form_almacenar").submit();
	});

	$("#form_almacenar").validate({
		rules: {
			prv_usuario: "required",
			prv_telefono: {required: true, digits: true,minlength:10,maxlength:10},
			prv_email: {
				required: true,
				email: true,
			},
			act_id:"required"

		},
		messages: {
			prv_usuario: "* Campo requerido",
			prv_telefono: {
				required:"* Campo requerido, ingrese numero celular (0994725020)",
				digits:"* Solo se puede ingresar números",
				maxlength:"* Ingrese numero celular válido (0994725020)"
			},
			prv_email: {
				required: "* Campo requerido, ingrese email válido",
				email: "* Ingrese correo electrónico válido  ejm: name@domain.com",
				remote: "* Este correo electrónico ya ha sido usado "
			},
			act_id:"* Campo requerido"
		}
	});


});
