<div class="box-header with-border">
    <h3 class="box-title">Archivos Multimedia</h3>
</div>
<div class="panel-body box-body">
    <div>
        <a href="<?= base_url() ?>gestion/archivos/vensubir/<?= $arc_ref_id ?>" class="btn btn-primary btn-md"> <span class="glyphicon glyphicon-cloud-upload" ></span> Subir Contenido Multimedia</a>
    </div>
    <table id="tblResultados_archivo" class="table table-bordered">
        <tr>
            <th width="2%">ID</th>
            <th width="50%">Nombre</th>
            <th width="15%">Fecha</th>
            <th width="5%">Publicado</th>
            <th width="8%">Opciones</th>
        </tr>
        <?= $archivos ?>
    </table>
</div>
<div id="dialog" title="Adjuntar archivos"></div>
<script src="<?= base_url() ?>js/archivos.js"></script>  