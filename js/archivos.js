$(document).ready(function () {

    $("a[rel='descargar']").click(function (evento) {
        evento.preventDefault();
        var id = $(this).attr('valor');
        var url = $("#base_url").val() + "gestion/archivos/descargar_archivo/" + id;
        $('<form action="' + url + '" method="post">' + '</form>').appendTo('body').submit().remove();
    });

    $("a[rel='eliminar']").click(function (evento) {
        evento.preventDefault();
        var id = $(this).attr('valor');
        if (confirm("¿Está seguro de eliminar archivo el archivo seleccionado?")) {
            var url = $("#base_url").val() + "gestion/archivos/eliminar_archivo/" + id;
            $.ajax({
                type: "POST",
                url: url
            });
            $(this).parent("td").parent("tr").remove();

        }
    });

    $("#userfile").change(function () {
        var ext = $('#userfile').val().split('.').pop().toLowerCase();
        if ($.inArray(ext, ['exe', 'com', 'dll', 'bat', 'jar', 'bin', 'sys']) != -1) {
            alert('Formato no permitido!');
        } else
            subirArchivos();
    });


    function subirArchivos() {
        // numero de archivos actualmente subidos, menos uno pq es titulo :)
        var arcActuales = $("#tblArch tr").length - 1;
        var files = document.getElementById('userfile').files;
        var len = files.length + arcActuales;
        for (i = arcActuales; i < len; i++) {
            var file = document.getElementById('userfile').files[i - arcActuales];
            arcpbId = insertarListado(file);
            uploadFile(file, i);
        }

    }

    function insertarListado(archivo) {
        var fileSize = 0;

        if (archivo.size > 1024 * 1024)
            archivoSize = (Math.round(archivo.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
        else
            archivoSize = (Math.round(archivo.size * 100 / 1024) / 100).toString() + 'KB';
        // archivo.type no usamos

        // id identificador de la barra de progreso para cada archivo
        var arcpbId = "arcpbId" + i;
        var arcElId = "arcElId" + i;
        var arcAvaId = "arcAvaId" + i;
        //var arcDescargaId = "arcDescargaId" + i;
        var archivoEstado = "<progress id='" + arcpbId + "' value='0' max='100' min='0'></progress><span id='" + arcAvaId + "'>0 %</span>";
        var archivoEliminar = "<input type='button' id='" + arcElId + "' value='X' onclick='eliminar_archivo(this)' disabled/>";
        //var arcDescargar = "<input type='button' id='" + arcDescargaId + "' value='Descargar' disabled/>";
        $('#tblArch tr:last').after(
                "<tr><td>" + archivo.name +
                "</td><td>" + archivoSize +
                "</td><td>" + archivoEstado +
                "</td><td align='center'>" + archivoEliminar +
                "</td></tr>");
        return arcpbId;
    }

    function uploadFile(archivo, arcIdTemp) {
        //var fd = new FormData();
        //fd.append("fileToUpload", document.getElementById('fileToUpload').files[0]);
        //var fd = new FormData(document.getElementById('form1'));
        var fd = new FormData();
        fd.append("userfile", archivo);
        var id_deque = $("#id_deque").val();
        fd.append("iddeque", id_deque);
        var arc_ref_id = $("#arc_ref_id").val();
        fd.append("ref_id", arc_ref_id);
        var xhr = new XMLHttpRequest();

        xhr.upload.addEventListener("progress", function (evt) {
            mostrarAvance(evt, arcIdTemp);
        }, false);

        xhr.addEventListener("load", function (evt) {
            terminoCarga(evt, arcIdTemp)
        }, false);

        xhr.addEventListener("error", falla, false);
        xhr.addEventListener("abort", anulo, false);
        // el tercer parámetro dice si es sicronico o asincronico
        // value that determines whether the request should be dealt with asynchronously
        var base_url = $("#base_url").val();
        //console.log("hola"+base_url);
        xhr.open("POST", base_url + "gestion/archivos/almacenar_archivo", true);
        xhr.send(fd);
    }

    function mostrarAvance(evt, arcIdTemp) {
        if (evt.lengthComputable) {
            var percentComplete = Math.round(evt.loaded * 100 / evt.total);
            $("#arcpbId" + arcIdTemp).animate({value: percentComplete}, 0);
            $("#arcAvaId" + arcIdTemp).html(percentComplete + " %");
        } // else, si no se puede calcular, no importa, seguimos el envio
        // else, si no se puede calcular, no importa, seguimos el envio
    }

    function falla(evt) {
        alert("Existe un problema al subir el archivo. Intente nuevamente." + evt.target.responseText);
    }

    function anulo(evt) {
        alert("Se anuló el envío del archivo o bien el navegador perdió la conexión.");
    }
    function terminoCarga(evt, arcIdTemp) {
        //console.log("evt.target.responseText:"+evt.target.responseText);
        var arc_id = evt.target.responseText;
        if (isNaN(arc_id) == false) {
            //$("#arcDescargaId" + arcIdTemp).prop("disabled", false);
            $("#arcElId" + arcIdTemp).prop("disabled", false);
            $("#arcElId" + arcIdTemp).attr("arc_id", arc_id);
            var archivos = $("#w_archivos").val();
            var extra = "";
            if (archivos != "")
                extra = ",";
            else
                extra = "";
            archivos = archivos + extra + arc_id;
            $("#w_archivos").val(archivos);
        }
        else
            alert("Ya existe este archivo: " + arc_id);
    }


});

function eliminar_archivo(obj) {
    var id = $(obj).attr('arc_id');
    var url = $("#base_url").val() + "gestion/archivos/eliminar_archivo/" + id;
    $.ajax({
        type: "POST",
        url: url
    });
    $(obj).parent("td").parent("tr").remove();
    //  $("#tblArch tr:gt(" + i + ")").remove();
}

