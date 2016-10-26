<!DOCTYPE html>
<html lang="en">
<head>
	<title>Tiempo real</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">  
	<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script src="js/cufon-yui.js" type="text/javascript"></script>
	<script src="js/cufon-replace.js" type="text/javascript"></script>
	<script src="js/Vegur_500.font.js" type="text/javascript"></script>
	<script src="js/Ropa_Sans_400.font.js" type="text/javascript"></script> 
	<script src="js/FF-cash.js" type="text/javascript"></script>	 
	<script src="js/script.js" type="text/javascript"></script> 
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

</head>
<body id="page2">
	<!--==============================header=================================-->
	<header>
		<div class="border-bot">
			<div class="main">
				<h1><a href="index.html">Global Tracking System</a></h1>
				<nav>
					<ul class="menu">
						<li><a class="active" href="index.php">Home</a></li>
						<li><a class="active" href="historico.php">Historico</a></li>
					</ul>
				</nav>
				<div class="clear"></div>
			</div>
		</div>
	</header>
<style>
      html, body {
        height: 100%;
        margin: 0;
      }
      #map {
        height: 100%;
        width: 100%;
      } 
    </style>
    <style>
#vartime {
  position: absolute;
  top: 120px;
  left: 49%;
  z-index: 5;
  background-color: #FFFFFF;
  width: 90px;
  padding: 5px;
  border: 1px solid #999;
  text-align: left;
  font-family: 'Roboto', 'sans-serif';
  line-height: 10px;
}
#ubicar{
  position: absolute;
  top: 95px;
  left: 45%;
}
</style>

<div id="ubicar">
  <h3>RPM:</h3>
</div>

<div class="btn btn-default" id="vartime">
<div id="floating-var">
Sin datos
</div>
</div>

<div id="map"></div>
<script>
        
var map;
//var hora;

function initMap() {
    
    var point;
    var locations = new Array();
    var point2;
    var locations2 = new Array();
    var lastmarker;
    map = new google.maps.Map(document.getElementById("map"), {
                zoom: 13
            });
    firstp =  new google.maps.LatLng(10.9857, -74.8109);
    map.setCenter(firstp);

setInterval(function(){
    downloadUrl("dynamicdb.php", function(data) {
    var xml = data.responseXML;
    var markers = xml.documentElement.getElementsByTagName("marker");
    

    
    for (var i = 0; i < markers.length; i++) {
        point = new google.maps.LatLng(
        parseFloat(markers[i].getAttribute("lat")),
        parseFloat(markers[i].getAttribute("lng")));
          }



        if(locations[0]==null){
        locations[0]=point;
        }else {      
         var f=locations.length;
         locations[0+f]=point;
        }

  

    var myIcon = {
     url: "http://icons.iconarchive.com/icons/iconshow/transport/128/Sportscar-car-2-icon.png", //url
     scaledSize: new google.maps.Size(30, 30) };

var marker = new google.maps.Marker({
    position: locations[0+f-1],
    icon:myIcon,
    map: map
  });


var recorrido = new google.maps.Polyline({
    path: locations,
    strokeColor: "#FF0000",
    strokeOpacity: 1.0,
    strokeWeight: 2
    });



    recorrido.setMap(map);
    });
    }, 1000);


setInterval(function(){

    downloadUrl("dynamicdb2.php", function(data) {
    var xml2 = data.responseXML;
    var markers2 = xml2.documentElement.getElementsByTagName("marker");
    
    for (var i2 = 0; i2 < markers2.length; i2++) {
        point2 = new google.maps.LatLng(
        parseFloat(markers2[i2].getAttribute("lat")),
        parseFloat(markers2[i2].getAttribute("lng")));

 }


          //__======================================
    for (var i3 = 0; i3< markers2.length; i3++){
       revol = parseFloat(markers2[i3].getAttribute("variable"));
    }
    //========revisar
    document.getElementById('floating-var').innerHTML = revol;


        if(locations2[0]==null){
        locations2[0]=point2;
        }else {      
         var f=locations2.length;
         locations2[0+f]=point2;
           
        }


  

    var myIcon2 = {
     url: "http://icons.iconarchive.com/icons/iconshow/transport/48/Motorcycle-icon.png", //url
     scaledSize: new google.maps.Size(30, 30) };

var marker2 = new google.maps.Marker({
    position: locations2[0+f-1],
    icon:myIcon2,
    map: map
  });


var recorrido2 = new google.maps.Polyline({
    path: locations2,
    strokeColor: "#FF0000",
    strokeOpacity: 1.0,
    strokeWeight: 2
    });



    recorrido2.setMap(map);
    });
    }, 1000);

}



    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;
        request.onreadystatechange = function() {
            if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
            }
        };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}

  

  </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtxNxHoSNOl8JMvcc4KAIlkoSlURTKL54&callback=initMap"
            async defer></script>
	<!--==============================footer=================================-->
	<footer>
		<div class="main">
			<div class="container_12">
				<div class="wrapper">
					<div class="grid_3">
						<div class="spacer-1">
							<a href="index.php"><img src="images/logo1.png" alt=""></a>
						</div>
					</div>
					<div class="grid_5">
						<div class="indent-top2">
							<p class="prev-indent-bot">&copy; 2016 Proyecto 2 by Cristian Camargo, Gonzalo Duarte y Guido Mercado</p>
							Phone: +1 800 559 6580 Email: <a href="#">dgonzalo@uninorte.edu.co</a>
						</div>
					</div>
					<div class="grid_4">
						<ul class="list-services">
							<li><a class="item-1" href="#"></a></li>
							<li><a class="item-2" href="#"></a></li>
							<li><a class="item-3" href="#"></a></li>
							<li><a class="item-4" href="#"></a></li>
						</ul>
						<span class="footer-text">&copy; 2016 <a class="link color-2" href="#">Privacy Policy</a></span>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
