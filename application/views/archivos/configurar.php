 <div class="panel panel-primary">
 <div class="panel-heading">Configuraciones de publicación</div>
  <div class="panel-body">
    <form  class="form-horizontal" action="<?= base_url() ?>archivos/actualizar" method="post" id="form_almacenar">

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
        <input type="hidden" name="id" id="id" value="<?= $arc_id ?>"/>
        <input type="hidden" name="act_id" id="act_id" value="<?= $ref_id ?>"/>
        <input id="almacenar" class="btn btn-primary pull-right" type="submit" value="Actualizar"/>

    </form>
</div>
</div>

