<!DOCTYPE html>
<head>
    <style>
                    /* 
            * Always set the map height explicitly to define the size of the div element
            * that contains the map. 
            */
            #map {
            height: 100%;
            }

            /* 
            * Optional: Makes the sample page fill the window. 
            */
            html,
            body {
            height: 100%;
            margin: 0;
            padding: 0;
            }
    </style>
</head>
<body class="antialiazed">
    <button onclick="update_position()">Update Position</button>
<div id="map"></div>
<script
      src="{{ asset('js/app.js') }}"></script>  
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkyiluSWRnS31aLeBeygANZUrq62gDqZs&callback=initMap&v=weekly"
      async
    ></script>

   
<script>
    let map;
    let marker;
    function initMap() {
  // The location of Uluru
  const uluru = { lat: -25.344, lng: 131.031 };
  // The map, centered at Uluru
   map = new google.maps.Map(document.getElementById("map"), {
    zoom: 18,
    center: uluru,
  });
  // The marker, positioned at Uluru
  marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}
function update_position(newlat,newlng){
alert('gvgv');
const lat_long = { lat: newlat, lng: newlng };
marker.setPosition(lat_long);
map.setCenter(lat_long);

}
Echo.channel('EMS')
    .listen('CarMoved', (e) => {
        update_position(e.lng,e.lat);
       
    });

window.initMap = initMap;
</script>
</body>
</html>