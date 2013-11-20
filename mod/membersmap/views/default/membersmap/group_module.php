<?php
/**
 * Group map module
 */

$group = elgg_get_page_owner_entity();

if ($group->membersmap_enable == "no") {
	return true;
}

elgg_load_library('elgg:membersmap');
elgg_load_library('elgg:membersmapgeocoder');
// load google maps js
elgg_load_js('gmap1');
elgg_load_js('gmap2');
elgg_load_js('gmap3');
elgg_load_js('gmap4');

//define map settings
$mapwidth = '99%';
$mapheight = '200px';
$mapzoom = 8;

//Read map default location from settings
$defaultlocation = trim(elgg_get_plugin_setting('map_default_location', 'membersmap'));

// Retrieve cluster feature
$clustering = get_map_clustering();

$options = array('type' => 'user', 'full_view' => false);
$options['relationship'] = 'member';
$options['relationship_guid'] = $group->guid;
$options['types'] = 'user';
$options['limit'] = 0;
$options['inverse_relationship'] = true;
$users = elgg_get_entities_from_relationship($options);


// get coords of default location
$defaultcoords = '49.037868,14.941406'; // set coords of Europe in case default location is not set

$mapkey = trim(elgg_get_plugin_setting('google_api_key', 'membersmap'));
$geocoder = new Geocoder($mapkey);
if ($defaultlocation) {
    try {
        $placemarks = $geocoder->lookup($defaultlocation);
    }
    catch (Exception $ex) {
        system_message($ex->getMessage());
        exit;
    }   

    if (count($placemarks) > 0) { 
        $defaultcoords = $placemarks[0]->getPoint()->getLatitude().','.$placemarks[0]->getPoint()->getLongitude();
    } 
}

$all_link = elgg_view('output/url', array(
	'href' => "membersmap/group/$group->guid/all",
	'text' => elgg_echo('link:view:all'),
	'is_trusted' => true,
));

$content = '
<script type="text/javascript"><!--
$(document).ready(function(){

        infowindow = new google.maps.InfoWindow();
        var myLatlng = new google.maps.LatLng('.$defaultcoords.');
        var mapOptions = {
            zoom: '.$mapzoom.',
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        var markerBounds = new google.maps.LatLngBounds();
        
	var markerBounds = new google.maps.LatLngBounds(); 
        var markers = [];
        
';        // end of $content 


    foreach ($users as $u)  {
        if (!isset($u->location) || !$u->location) {
            //do nothing
        }
        else    {
            if ($u->getLatitude() && $u->getLongitude())  {
                $namecleared = str_replace("'", "&#39;", $u->name);
                $namecleared = str_replace('"', "&quot;", $namecleared); 
                
                $content .= '
                    var myLatlng = new google.maps.LatLng('.$u->getLatitude().','.$u->getLongitude().');
                    var marker = new google.maps.Marker({
                        map: map,
                        position: myLatlng,
                        title: \''.$namecleared.'\',
                        icon: \''.elgg_get_site_url().'mod/membersmap/graphics/smiley.png\'
                    });
                    google.maps.event.addListener(marker, \'click\', function() {
                      infowindow.setContent(\'<img src="'.$u->getIconURL('tiny').'" alt="'.$namecleared.'" style="float:left; margin: 6px 4px 0 0;border-radius: 3px 3px 3px 3px;" />  <a href="'.elgg_get_site_url().'profile/'.$u->username.'">'.$namecleared.'</a><br />'.$u->location.'\');
                      infowindow.open(map, this);
                    });   
                    markers.push(marker);
                    markerBounds.extend(myLatlng);
                    map.fitBounds(markerBounds);
                '; // end of $content 
            }
        }
    }
 
if ($clustering)    {
$content .= '
    var markerCluster = new MarkerClusterer(map, markers);
';    
}            
$content .= '
});       
//--></script>
'; // end of $content 


$content .= '<div id="map" style="width:'.$mapwidth.'; height:'.$mapheight.';"></div>';

if (!$content) {
	$content = '<p>' . elgg_echo('mambersmap:group:none') . '</p>';
}

echo elgg_view('groups/profile/module', array(
	'title' => elgg_echo('mambersmap:group'),
	'content' => $content,
	'all_link' => $all_link,
));
