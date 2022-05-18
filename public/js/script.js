const lattitude = 48.856614;
const longitude = 2.3522219;
var map = L.map('map').setView([lattitude, longitude], 13);

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
   
}).addTo(map);
// L.Control.geocoder().addTo(map);

// var marker = L.marker([lattitude, longitude]).addTo(map);

// marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();



var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(map);
}

map.on('click', onMapClick);
    

    

