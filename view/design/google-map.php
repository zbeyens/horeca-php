<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>

<script>
var map;
var bounds = new google.maps.LatLngBounds();
var loc;

function init(){
    var mapOptions = { mapTypeId: google.maps.MapTypeId.ROADMAP, maxZoom: 18 };
    map =  new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

    loc = new google.maps.LatLng(<?php echo $ficheEstab['AdLatitude'].','.$ficheEstab['AdLongitude']?>);
    bounds.extend(loc);
    addMarker(loc, 'Event A', "active");

    map.fitBounds(bounds); //auto-zoom
    map.panToBounds(bounds); //auto-center
}

function addMarker(location, name, active) {          
    var marker = new google.maps.Marker({
        position: location,
        map: map,
        title: name,
        status: active
    });
}

$(function(){ init(); });
</script>