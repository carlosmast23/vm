<tr>
    <td>{act_id}</td>
    <td>{act_nombre}</td>
    <td>{act_descripcion}</td>
    <td>
        <a href="<?= base_url() ?>admin/actividades/modificar/{act_id}"><span class="glyphicon glyphicon-edit" title="Modificar datos del cargo"></span></a>
        <a href="<?= base_url() ?>admin/actividades/eliminar/{act_id}"><span class="glyphicon glyphicon-remove" title="Eliminar cargo"></span></a>
    </td>
</tr>
