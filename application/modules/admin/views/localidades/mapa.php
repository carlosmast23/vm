<link href="<?= base_url('css/mapa.css') ?>" rel="stylesheet">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">GEOVISUALIZADOR</h4>
        </div>
        <div class="modal-body">
            <input id="pac-input" class="controls" type="text" placeholder=""Localidad a Buscar>
            <div id="map"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardar">Guardar Coordenada Georeferencial</button>
            </div>
        </div>
    </div>
</div>

