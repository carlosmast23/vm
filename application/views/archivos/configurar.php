<div class="box-header with-border">
    <h3 class="box-title">Configuraciones para publicación</h3>
</div>
<div class="panel-body box-body">
    <form  class="form-horizontal" action="<?= base_url() ?>gestion/archivos/actualizar" method="post" id="form_almacenar">
        <div class="form-group">
            <label class="col-xs-2 control-label">Titulo</label>
            <div class="col-xs-8">
                <input type="text" class="form-control" name="arc_titulo" id="arc_titulo" placeholder="Ingrese titulo de publicación" maxlength="150" value="<?= $arc_titulo ?>"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">Descripción</label>
            <div class="col-xs-8">
                <textarea class="form-control" name="arc_desc" id="arc_desc" placeholder="Ingrese descripción para publicación"/><?= $arc_desc ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">Publicar</label>
            <div class="col-xs-8">
                <label class="radio-inline">
                    <input type="radio" name="arc_publico"  value="n" <?php if ($arc_publico == 'n') echo "checked"; ?>/>No
                </label>
                <label class="radio-inline">
                    <input type="radio" name="arc_publico" value="s" <?php if ($arc_publico == 's') echo "checked"; ?>/>Si
                </label>
            </div>
        </div>
        <input type="hidden" name="id" id="id" value="<?= $id ?>"/>
        <input type="hidden" name="act_id" id="act_id" value="<?= $ref_id ?>"/>
    </form>
</div>
<div class="box-footer">
    <input id="almacenar" class="btn btn-primary pull-right" type="submit" value="Actualizar"/>
</div>
<script src="<?= base_url() ?>js/gestion/multimedia.js"></script>
