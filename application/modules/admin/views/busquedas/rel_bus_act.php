
<link href="<?= base_url(); ?>assets/multiselect/multi-select.css" media="screen" rel="stylesheet" type="text/css">

<form action="<?= base_url() ?>admin/busquedas/alm_rel_bus_act" method="post">

    <div class="form-group">
        <label>Busqueda:</label>
        <input type="text" class="form-control" name="usu_nombres" id="usu_nombres" value="<?= $bus_texto ?>" disabled="true"/>
    </div>

    <div class="form-group">
        <label>Tiempo:</label>
        <?php if($bus_tiempo=='n'): ?> 
            <select name="tiempo" id="tiempo" class="form-control">
                <option value="">Tiempo:</option>
                <option value="d">Moderada (1 semana)</option>
                <option value="m">Media (1 dia)</option>
                <option value="a">Alta (1 hora)</option>
                <option value="u">Urgente (30 minutos)</option>
            </select>
        <?php else:?>
            <b>*Tiempo asignado</b>
        <?php endif;?>
    </div>
    <div class="form-group">
        <label>Categorias:</label>
        <?= $combo ?>
    </div>

    <div class="box-footer">
        <input type="hidden" name="bus_id" id="bus_id" value="<?= $id ?>">
        <input class="btn btn-primary pull-right" type="submit" value="Almacenar"/>
    </div>
</form>
<script src="<?= base_url(); ?>assets/multiselect/jquery.multi-select.js"></script>
<script src="<?= base_url(); ?>assets/multiselect/jquery.quicksearch.js"></script>  
<script src="<?= base_url(); ?>assets/multiselect/script.js"></script>

