<tr>
    <td>{id}</td>
    <td>{arc_nombre}</td>
    <td>{arc_fecha}</td>
    <td>{arc_publico}</td>
    <td align="left">
        <a href='#' valor='{id}' rel='descargar'><span class="glyphicon glyphicon-download-alt" title="Descargar"></span></a>
        <?php if ($ver != true): ?>
            <a href='#' valor='{id}' rel='eliminar'><span class="glyphicon glyphicon-remove" title="Eliminar"></span></a>
        <?php endif; ?> 
        <?php if (strpos($arc_nombre, '.jpg') != FALSE || strpos($arc_nombre, '.png') != FALSE): ?>
            <a href='<?= base_url() ?>gestion/archivos/configurar/{id}/{ref_id}'><span class="glyphicon glyphicon-tag" title="Configuraciones para publicación"></span></a>
            <?php endif; ?> 
    </td>
</tr>