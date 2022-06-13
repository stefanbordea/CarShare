let mapOptions = {
    center:[37.98736426234379, 23.758481042349693],
    zoom:100
}


let map = new L.map('map' , mapOptions);

let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
map.addLayer(layer);

let marker = new L.Marker([37.98736426234379, 23.758481042349693]);
marker.addTo(map);

