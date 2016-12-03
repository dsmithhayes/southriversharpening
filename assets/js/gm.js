/*
  Initializes Google Maps on different pages
*/

function initMap() {
  var map;

  var latLng = {
    lat: 45.840379,
    lng: -79.379600
  };

  map = new google.maps.Map(document.getElementById('map'), {
    center: latLng,
    zoom: 14
  });

  var marker = new google.maps.Marker({
    position: latLng,
    map: map,
    title: 'South River Sharpening'
  });
}
