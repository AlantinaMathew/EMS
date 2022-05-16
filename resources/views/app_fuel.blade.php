<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        .content
        {
            width: 50%;
            height: 50%;
            position: absolute;
            top: 250px;
            left: 100;
            background-color: #fff;
        }
        #map {
            height: 100%;
            width: 100%;
        }
    </style>
    <script
      src="https://code.jquery.com/jquery-3.6.0.js"
      integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
      crossorigin="anonymous"
    ></script>
    
  </head>
  <body>
  <a href="/dash_fuel">
  <button style="background-color: DodgerBlue;
  border: none;
  color: white;
  margin-left:2px;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;"class="btn"><i class="fa fa-chevron-circle-left" aria-hidden="true">Go back</i></button></a>
  @foreach($a as $tr)
  
  
      
    <input type="hidden" name="latitude" id="latitude"value="{{$tr->latitude}}"disabled /><br><br>
    
    <input type="hidden" name="longitude" id="longitude"value="{{$tr->longitude}}"/><br><br>
   @endforeach<button onclick="showMap()"style="background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">Show in Map</button>
    <div class="content">
        <div id="map">

        </div>
    </div>
    
    <script>
           var Long = $("#longitude").val();
           alert(Long);
           var Lat = $("#latitude").val();
           alert(Lat);
           function showMap()
        {
            initMap(Long,Lat);
        }
         function initMap(longitude,latitude) {
                // The location of Uluru
                //alert("jnj");
                var uluru = {
                    lat: parseInt(latitude),
                    lng: parseInt(longitude)
                };
                // The map, centered at Uluru
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 4,
                    center: uluru,
                });
                // The marker, positioned at Uluru
                const marker = new google.maps.Marker({
                    position: uluru,
                    map: map,
                });
            }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?signed_in=true&libraries=visualization&callback=initMap"></script>
  </body>
</html>
