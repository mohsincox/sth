<!DOCTYPE html>
<html>
<head>
  <title></title>
  <!-- <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTmFQD7pTG98MDWNoq-RMGJ5u9jHqIULk">
    </script> -->
    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyBTmFQD7pTG98MDWNoq-RMGJ5u9jHqIULk'></script>
</head>
<body>

  <div id="map" style="height:500px; width:500px;"></div>
  <script>

    function initialize() {


     // var myLatLng = {lat: 42.52501, lng: 2.938979}; 
     var myLatLng = {lat: 23.777176, lng: 90.399452}; 
         var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: myLatLng,
        scrollwheel: false,
        draggable:true,



      });
         var image='logo.png';
         var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon:image

      });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
</body>
</html>