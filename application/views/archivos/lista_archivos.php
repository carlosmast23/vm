 <div class="panel panel-primary">
 <div class="panel-heading">Listado de anuncios</div>
   <div class="panel-body">
    <div class="text-right">
        <a href="<?= base_url() ?>archivos/vensubir/<?= $arc_ref_id ?>" class="btn btn-primary btn-md"> <span class="glyphicon glyphicon-cloud-upload" ></span> Subir ANUNCIOS</a>
    </div>
    <table id="tblResultados_archivo" class="table ">
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
</div>
<script src="<?= base_url() ?>js/archivos.js"></script>  