    <div class="container-fluid">
 <div class="panel panel-primary">
    <div class="panel-heading">Actualizar localidad</div>
    <div class="panel-body">

        <form class="form-horizontal" action="<?= base_url() ?>admin/localidades/actualizar" method="post" id="form_almacenar">
            <div class="form-group">
                <label class="col-xs-2 control-label">Nombre</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" name="loc_nombre" id="loc_nombre" placeholder="Ingrese nombre" value="<?= $loc_nombre ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-2 control-label">Latitud</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" name="loc_latitud" id="loc_latitud" placeholder="Ingrese latitud" value="<?= $loc_latitud ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-2 control-label">Longitud</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" name="loc_longitud" id="loc_longitud" placeholder="Ingrese longitud" value="<?= $loc_longitud ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-2 control-label"><a href="#" rel="mapa">Mapa</a></label>
            </div>
            <input type="hidden" name="loc_id" id="loc_id" value="<?= $loc_id ?>"/>
            <input type="hidden" name="pid" id="pid" value="<?= $pid ?>"/>            
        </form>
    </div>
    <div class="panel-footer">
        <input id="almacenar" class="btn btn-primary pull-right" type="submit" value="Actualizar"/>
    </div>
</div>
</div>
<script src="http://maps.googleapis.com/maps/api/js?libraries=places"></script>
<script src="<?= base_url() ?>js/admin/localidades.js"></script>
<script src="<?= base_url() ?>js/admin/mapa.js"></script>
