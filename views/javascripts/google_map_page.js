var currentLatX = 22.325406;
var currentLatY = 114.206129;
var map = null;
var marker = null;
function myMap() {
	var latlng = new google.maps.LatLng(22.325406, 114.206129);
	var mapProp= {
	    center:latlng,
	    zoom:15,
	};
	var image = '../../../rabbitforever/views/images/icons/tortoise.png';
	var myCenter = new google.maps.LatLng(22.325406, 114.206129);
	  marker = new google.maps.Marker({
		    position: myCenter,
//		    animation: google.maps.Animation.BOUNCE,
		    animation: google.maps.Animation.DROP,
		    raiseOnDrag: true,
//		    label: 'Tortoise',
		    labelOrigin: new google.maps.Point(9, 9),
		    icon: image,
		    draggable: true
	  });
	map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
	marker.setMap(map);
	checkMovingDataByInterval();
}

function moveBus( map, marker, latLng ) {
    marker.setPosition(latLng);
    map.panTo(latLng);
};
var CHECK_DATA_INTERVAL_FORM = 6000; 
function checkMovingDataByInterval(){
	setInterval(function(){
		var newCurrentLatX = currentLatX + 0.0001;
		var newCurrentLatY = currentLatY + 0.0001;
		var latLng = new google.maps.LatLng( currentLatX, currentLatY );
		drawingTrackLine(currentLatX, currentLatY, newCurrentLatX, newCurrentLatY);
		currentLatX = newCurrentLatX;
		currentLatY = newCurrentLatY;
		moveBus(map, marker, latLng);
	}, CHECK_DATA_INTERVAL_FORM);
}
function drawingTrackLine(latA, lngA, latB, lngB){
    var flightPlanCoordinates = [
        {lat: latA, lng: lngA},
        {lat: latB, lng: lngB},
      ];
    
    var flightPath = new google.maps.Polyline({
        path: flightPlanCoordinates,
        geodesic: true,
        strokeColor: '#FF0000',
        strokeOpacity: 1.0,
        strokeWeight: 2
      });
    
    flightPath.setMap(map);
}
$(document).ready(function(){
	//myMap();
//	checkMovingDataByInterval();
//	currentLatX = currentLatX + 50;
//	currentLatY = currentLatY + 50;
//	var latLng = new google.maps.LatLng( currentLatX, currentLatY );
//	moveBus(map, marker, latLng);
}); // end $(document).ready
