// search area
function codeAddressExtend(givenaddr, defaultzoom, siteurl, defaultlocation, echomembersmapmap2, showgreenusers) {
    var map;
    map = new google.maps.Map(document.getElementById('map'), {
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          zoom: defaultzoom
        });
    var geocoder = new google.maps.Geocoder();    
    
    var address;
    var radius;
    var showradius;
    if (!givenaddr || 0 === givenaddr.length) {
        address = document.getElementById('address').value;
        if (document.getElementById('radius').value == "") radius = 1000; // set default radius
        else radius = document.getElementById('radius').value;
        
        showradius = document.getElementById('showradius');
    }
    else {
        address = givenaddr;
        if (document.getElementById('radiusmyloc').value == "") radius = 1000; // set default radius
        else radius = document.getElementById('radiusmyloc').value;   
        
        showradius = document.getElementById('showradiusloc');
    }
    if (isNaN(radius)) radius = 1000; // set default radius

    var request = {
      location: address,
      radius: radius
    }; 
    var service = new google.maps.places.PlacesService(map);
    service.search(request, callback);    

    var markerBounds = new google.maps.LatLngBounds();
      
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: map,
              position: results[0].geometry.location,
              icon: siteurl+'mod/membersmap/graphics/flag.png'
            });

            www1 = results[0].geometry.location.lat();
            www2 = results[0].geometry.location.lng();
 
            google.maps.event.addListener(marker, 'click', function() {
              //infowindow.setContent(ddd.toString());
              infowindow.setContent('Search address: '+address+'<br />Search radius: '+radius);
              infowindow.open(map, this);
            }); 

            if (showradius.checked) { //show search area if checked
                // Add a Circle overlay to the map.
                var circle = new google.maps.Circle({
                  map: map,
                  radius: parseInt(radius),
                  fillColor: 'yellow',
                  fillOpacity: 0.2
                });
                // Bind circle and marker
                circle.bindTo('center', marker, 'position');
                map.fitBounds(circle.getBounds());
            }
            else    {
                markerBounds.extend(results[0].geometry.location);
                map.fitBounds(markerBounds); 

                if (map.getZoom() > defaultzoom) map.setZoom(defaultzoom); 
            }
            showusers(geocoder, radius, showradius, markerBounds, map, results[0].geometry.location.lat(), results[0].geometry.location.lng());  
      } else {
        alert(echomembersmapmap2);
        
        geocoder.geocode( { 'address': defaultlocation}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            map.setZoom(defaultzoom);
          } else {
                geocoder.geocode( { 'address': 'Europe'}, function(results, status) {
                myOptions = {
                   zoom: defaultzoom,
                   center: results[0].geometry.location,
                   mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(document.getElementById("map"), myOptions);
                }); 
          }
        });

      }
    }); 

    if (showgreenusers==1) {   // used in search "members by name" section
        showusersfound(geocoder, radius, showradius, markerBounds, map, 0); 
    }
} 

function codeAddressExtendobs(givenaddr, defaultzoom, siteurl, defaultlocation, echomembersmapmap2, showgreenusers) {
    var map;
    map = new google.maps.Map(document.getElementById('map'), {
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          zoom: defaultzoom
        });
    var geocoder = new google.maps.Geocoder();    

    var address;
    var radius;
    var showradius;
    if (!givenaddr || 0 === givenaddr.length) {
        address = document.getElementById('address').value;
        if (document.getElementById('radius').value == "") radius = 1000; // set default radius
        else radius = document.getElementById('radius').value;
        
        showradius = document.getElementById('showradius');
    }
    else {
        address = givenaddr;
        if (document.getElementById('radiusmyloc').value == "") radius = 1000; // set default radius
        else radius = document.getElementById('radiusmyloc').value;   
        
        showradius = document.getElementById('showradiusloc');
    }
    if (isNaN(radius)) radius = 1000; // set default radius

    var request = {
      location: address,
      radius: radius
    }; 
    var service = new google.maps.places.PlacesService(map);
    service.search(request, callback);    

    var markerBounds = new google.maps.LatLngBounds();
      
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
          map.setCenter(results[0].geometry.location);
          var marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location,
            icon: siteurl+'mod/membersmap/graphics/flag.png'
          });

          www1 = results[0].geometry.location.lat();
          www2 = results[0].geometry.location.lng();

          google.maps.event.addListener(marker, 'click', function() {
            //infowindow.setContent(ddd.toString());
            infowindow.setContent('Search address: '+address+'<br />Search radius: '+radius);
            infowindow.open(map, this);
          }); 

        if (showradius.checked) { //show search area if checked
            // Add a Circle overlay to the map.
            var circle = new google.maps.Circle({
              map: map,
              radius: parseInt(radius),
              fillColor: 'yellow',
              fillOpacity: 0.2
            });
            // Bind circle and marker
            circle.bindTo('center', marker, 'position');
            map.fitBounds(circle.getBounds());
        }
        else    {
            markerBounds.extend(results[0].geometry.location);
            map.fitBounds(markerBounds);            
        }
      } else {
        alert(echomembersmapmap2);

        geocoder.geocode( { 'address': defaultlocation}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            map.setZoom(defaultzoom);
          } else {
                geocoder.geocode( { 'address': 'Europe'}, function(results, status) {
                myOptions = {
                   zoom: defaultzoom,
                   center: results[0].geometry.location,
                   mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(document.getElementById("map"), myOptions);
                }); 
          }
        });

      }
    }); 

    showusers(geocoder, radius, showradius, markerBounds, map);  
    if (showgreenusers==1) {   // used in search "members by name" section
        showusersfound(geocoder, radius, showradius, markerBounds, map, 0); 
    }
} 


// search area for member
function codeMember(address, map, geocoder, radius, showradius, markerBounds) {
    var request = {
      location: address,
      radius: radius
    }; 
    var service = new google.maps.places.PlacesService(map);
    service.search(request, callback);    
/* obs
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            www1 = results[0].geometry.location.lat();
            www2 = results[0].geometry.location.lng();
        } 
    }); 
*/
    showusers(geocoder, radius, showradius, markerBounds, map, 0, 0);
} 

function callback(results, status) {
    if (status == google.maps.places.PlacesServiceStatus.OK) {
      for (var i = 0; i < results.length; i++) {
        createMarker(results[i]);
      }
    }
}    

function calcDistance (fromLat, fromLng, toLat, toLng) {
    return google.maps.geometry.spherical.computeDistanceBetween(
      new google.maps.LatLng(fromLat, fromLng), new google.maps.LatLng(toLat, toLng));
}  

function getcoords (address) {
    var geocoder1 = new google.maps.Geocoder();  
    geocoder1.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        //map.setCenter(results[0].geometry.location);
        var www1 = results[0].geometry.location.lat();
        var www2 = results[0].geometry.location.lng();
        var www = new google.maps.LatLng(www1, www2);
      } else {
        // do nothing alert('Geocode was not successful for the following reason: ' + status);
      }
    }); 
    return www;
}          

function createMarker(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
    position: place.geometry.location
  });

  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(place.name);
    infowindow.open(map, this);
  });
} 

