<tr>
    <td>{loc_id}</td>
    <td>{loc_nombre}</td>
    <td>
        <a href="<?= base_url() ?>admin/localidades/modificar/{loc_id}/{pid}"><span class="glyphicon glyphicon-edit" title="Modificar datos de la localidad"></span></a>
        <a href="<?= base_url() ?>admin/localidades/eliminar/{loc_id}/{pid}" class="eliminar"><span class="glyphicon glyphicon-remove" title="Eliminar localidad"></span></a>
        <a href="<?= base_url() ?>admin/localidades/ver_localidad/{loc_id}/{pid}"><span class="glyphicon glyphicon-sort-by-attributes-alt" title="Localidades"></span></a>
    </td>
</tr>
