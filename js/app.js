var app = {};
app.markers = [];

function initMap() {
    app.map = new google.maps.Map(document.getElementById('map-canvas'), {
        center: {
            lat: -33.8688,
            lng: 151.2195
        },
        zoom: 13
    });

    var input = /** @type {!HTMLInputElement} */ (
        document.getElementById('search-city'));

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', app.map);

   
    autocomplete.addListener('place_changed', function() {
        
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }

        app.place = place;

    });


}

function getTweets(latLng) {
	clearMarkers();
    $.ajax({
        url: 'http://localhost/twitterGeoFeeds/tweets/tweets.php',
        method: "get",
        data: latLng
    })
        .done(function(data) {
            var _data = null;
            try {
                _data = JSON.parse(data);
                setMarkers(_data);
            } catch (e) {
                alert(e);
            }

        });
}
function clearMarkers(){
	if(app.markers.length > 0){
		app.infowindow.close();
		for (var i = 0; i < app.markers.length; i++) {
		    if (app.markers[i]) {
		      app.markers[i].setMap(null);
		    }
		 }
	  	app.markers = [];
	}
	
}
function setMarkers(_data) {
    app.infowindow = new google.maps.InfoWindow();
    $.each(_data.statuses, function(key, item) {
        var image = {
            url: item.profile_image_url || "img/marker.png",
            // This marker is 64 pixels wide by 64 pixels high.
            size: new google.maps.Size(64, 64),
            // Scale marker to 48 pixels by 48 pixels
            scaledSize: new google.maps.Size(48, 48),
            // The origin for this image is (0, 0).
            //origin: new google.maps.Point(0, 0),
            // The anchor for this image is the base of the flagpole at (0, 32).
            anchor: new google.maps.Point(24, 24)
        };

        // Add the marker at the clicked location
        if(item.geo != null ){
        	app.markers[key] = new google.maps.Marker({
	            position: new google.maps.LatLng(item.geo.coordinates[0], item.geo.coordinates[1]),
	            icon: item.user.profile_image_url,
	            title: item.user.name,
	            animation: google.maps.Animation.DROP,
	            map: app.map,
	        });

	        app.markers[key].desc = item.text;
	        google.maps.event.addListener( app.markers[key], 'click', function() {
			    app.infowindow.setContent(item.text+"<br>"+item.created_at);
			    app.infowindow.open( app.map , this);
			  });
	        //app.markers[key].setMap(app.map);
	       app.map.setZoom(14);
	       app.map.setCenter(new google.maps.LatLng(item.geo.coordinates[0], item.geo.coordinates[1]));
        }
        
    });
}

$(document).ready(function(){
	setTimeout(function(){
		initMap();
	}, 700)
	
	$("#search").on('click', function(){
		 // If the place has a geometry, then present it on a map.
        if (app.place.geometry.viewport) {
            app.map.fitBounds(app.place.geometry.viewport);
        } else {
            app.map.setCenter(app.place.geometry.location);
            app.map.setZoom(14); // Why 17? Because it looks good.
        }

		getTweets({
            lat: app.place.geometry.location.lat(),
            lng: app.place.geometry.location.lng()
        });
	});
})

