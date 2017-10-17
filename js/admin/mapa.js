$(document).ready(function () {
    function initialize() {
        var marker = false;
        var longitud = $("#loc_longitud").val().trim();
        var latitud = $("#loc_latitud").val().trim();
        if (longitud != '' && latitud != '') {
            var nombre = $("#loc_nombre").val();
            var mapOptions = {
                center: new google.maps.LatLng(latitud, longitud),
                zoom: 6,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(latitud, longitud),
                map: map,
                title: nombre
            });

        } else {
            var mapOptions = {
                center: new google.maps.LatLng(-2.147596, -79.920260),
                zoom: 6,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);

        }
    
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
//                alert(e.latLng);
//                alert(e.latLng.lat());
//                alert(e.latLng.lng());
            $("#loc_latitud").val(e.latLng.lat());
            $("#loc_longitud").val(e.latLng.lng());


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
    // google.maps.event.addDomListener(window, 'load', initialize);
    // initialize();


    $('#myModal').on('shown.bs.modal', function () {
        initialize(); // with initializeMap function get map.
    });
});


