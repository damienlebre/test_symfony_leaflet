const lattitude = document.querySelector('#lat').innerText;
const longitude = document.querySelector('#lon').innerText;
var map = L.map('map').setView([lattitude, longitude], 13);
console.log(lattitude);
L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
   
}).addTo(map);

L.marker(lattitude, longitude).addTo(map);



var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(map);
}

map.on('click', onMapClick);
 


    

