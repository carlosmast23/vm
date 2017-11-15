     <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading">Nueva localidad</div>
            <div class="panel-body">
                <form class="form-horizontal" action="<?= base_url() ?>admin/localidades/almacenar" method="post" id="form_almacenar">
                    <div class="form-group">
                        <label class="col-xs-2 control-label">Nombre</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="loc_nombre" id="loc_nombre" placeholder="Ingrese nombre"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">Latitud</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="loc_latitud" id="loc_latitud" placeholder="Ingrese latitud" readonly="false"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label">Longitud</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="loc_longitud" id="loc_longitud" placeholder="Ingrese longitud" readonly="false"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-2 control-label"><a href="#" rel="mapa">Mapa</a></label>
                    </div>
                    <input type="hidden" name="pid" id="pid" value="<?= $pid ?>"/>
                    <input type="hidden" name="coordenadas" id="coordenadas"/>
                </form>
            </div>
            <div class="panel-footer">
                <input id="almacenar" class="btn btn-primary pull-right" type="submit" value="Almacenar"/>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    </div>



    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAwdsPBllE9wJ2qY2A-denqXjhCnrkyFjs&libraries=places"></script>
    <script src="<?= base_url() ?>js/admin/localidades.js"></script>
    <script src="<?= base_url() ?>js/admin/mapa.js"></script>
<!-- <input id="pac-input" class="controls" type="text" placeholder=""Localidad a Buscar>
            <div id="map"></div>
<script src="http://maps.googleapis.com/maps/api/js?libraries=places"></script>
<script>
    function initialize() {
        var mapProp = {
            center: new google.maps.LatLng(-2.147596, -79.920260),
            zoom: 6,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map"), mapProp);
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function () {
            searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // [START region_getplaces]
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function () {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function (marker) {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function (place) {
                var icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };

                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
        // [END region_getplaces]

        google.maps.event.addListener(map, 'click', function (e) {
            alert(e.latLng);
            alert(e.latLng.lat());
            alert(e.latLng.lng());
            $("#loc_latitud").val(e.latLng.lat());
            $("#loc_longitud").val(e.latLng.lng());
            var marker = false;
            if (marker != false)
                marker.setMap(null);
            $("#coordenadas").val(e.latLng);
            marker = new google.maps.Marker({
                map: map, //el mapa creado en el paso anterior
                position: e.latLng, //objeto con latitud y longitud
                draggable: false //que el marcador se pueda arrastrar
            });
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>-->


