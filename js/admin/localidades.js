$(document).ready(function () {


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


    $("#almacenar").click(function () {
        $("#form_almacenar").submit();
    });

    $("a[rel='paginador']").click(function (evento) {
        evento.preventDefault();
        var pagina = $(this).attr('href');
        $("#desde").val(pagina);
        $("#form_buscar").trigger("submit");
    });
    $(".buscar").on("click", function (evento) {
        evento.preventDefault();
        $("#form_buscar_paises").trigger("submit");
    });


    $("#form_almacenar").validate({
        rules: {
            loc_nombre: "required",
            loc_latitud: "required",
            loc_longitud: "required"
        },
        messages: {
            loc_nombre: "* Campo requerido",
            loc_latitud: "* Campo requerido",
            loc_longitud: "* Campo requerido"
        }
    });


//
    var base_url = $("#base_url").val();
    $("#op2").click(function (e) {
        e.preventDefault();
        var loc_pid = $('#loc_id').val();
        window.location = base_url + "admin/localidades/ver_localidad/" + loc_pid;
    });


    $("#mod").click(function (e) {
        e.preventDefault();
        var loc_pid = $('#loc_id').val();
        window.location = base_url + "admin/localidades/modificar/" + loc_pid;
    });

    $("#eli").click(function (e) {
        e.preventDefault();
        var arb_pid = $('#loc_id :selected').attr('pid');
        var arb_id = $('#loc_id').val();
        var arbol = $('#loc_id :selected').text();
        var nl = confirm("Seguro desea eliminar " + arbol);
        if (nl == true)
            $.ajax({
                type: "POST",
                url: base_url + "admin/localidades/eliminar2/" + arb_id,
                success: function (html) {
                    e.preventDefault();
                    if (html == false) {
                        alert("Este país esta relacionado con otra información, no se puede eliminar");
                    } else
                        window.location = base_url + "admin/localidades/ver_localidad/" + arb_pid;
                }
            });
    });
    $("#agr").click(function (e) {
        e.preventDefault();
        var loc_pid = $('#pid').val();
        window.location = base_url + "admin/localidades/crear/" + loc_pid;
    });


    $(".chosen-select").change(function () {
        var id = $("#LOCACIONES_ID").val();
        var base_url = $("#base_url").val();
        $.ajax({
            type: "POST",
            url: base_url + "locaciones/combo_general",
            data: {ID: id},
            success: function (data) {
                $("#loc_info").html(data);
                $(this).focus();
            }
        });
    });

    $(".buscarf").on("click", function (evento) {
        evento.preventDefault();
        $("#form_buscar").trigger("submit");
    });

    $("a[rel='eliminar_pais']").click(function (event) {
        var id = $(this).attr('val');
        var base_url = $("#base_url").val();
        var res = confirm("Â¿Seguro desea eliminar?");
        if (res) {
            $.ajax({
                type: "POST",
                url: base_url + "paises/eliminar_pais/" + id,
                success: function (html) {
                    event.preventDefault();
                    if (html == false) {
                        alert("Esta regiÃ³n esta relacionado con otra informaciÃ³n, no se puede eliminar");
                    } else
                        window.location = base_url + "paises";
                }
            });
        }
    });
    if ($(".chosen-select").length)
        $(".chosen-select").chosen({no_results_text: "No existe la localidad", width: "50%"});
});
