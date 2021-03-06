<?php
/**
 * Elgg kanelggamapsapi plugin
 * @package KanelggaMapsApi 
 */

$language = array(

	'kanelggamapsapi:menu' => 'Map',
    'kanelggamapsapi:search:radius:meters' => 'radius (meters)',
    'kanelggamapsapi:search:radius:km' => 'radius (km)',
    'kanelggamapsapi:search:radius:miles' => 'radius (miles)',
    'kanelggamapsapi:search:meters' => 'meters',
    'kanelggamapsapi:search:km' => 'km',
    'kanelggamapsapi:search:miles' => 'miles', 
    'kanelggamapsapi:all' => 'Global Map',
    'kanelggamapsapi:members' => 'Members',
    'kanelggamapsapi:groups' => 'Groups',
    'kanelggamapsapi:agora' => 'Classifieds',

    // settings
    'kanelggamapsapi:settings:google_maps' => 'Google Maps settings',
    'kanelggamapsapi:settings:google_api_key' => 'Enter your Google API key',
    'kanelggamapsapi:settings:google_api_key:clickhere' => 'Go to <a target="_blank" href="https://developers.google.com/maps/documentation/javascript/tutorial#api_key">https://developers.google.com/maps/documentation/javascript/tutorial#api_key</a> to get your "Google API key". <br />(<strong>Note:</strong> the API key is NOT required. Only if you want stats on your api usage, or if you have a paid API account the key is needed)',
    'kanelggamapsapi:settings:defaultzoom' => 'Default map zoom',     
    'kanelggamapsapi:settings:defaultzoom:note' => 'Enter a numeric value for zoom', 
    'kanelggamapsapi:settings:map_width' => 'Width of map',
    'kanelggamapsapi:settings:map_width:how' => 'Numeric value (e.g. 500) or % (e.g. 100%)',
    'kanelggamapsapi:settings:map_height' => 'Height of map',
    'kanelggamapsapi:settings:map_height:how' => 'Numeric value (e.g. 500)', 
	'kanelggamapsapi:settings:defaultlocation' => 'Default location address',     
    'kanelggamapsapi:settings:defaultlocation:note' => 'Enter a valid location address (postal address or postal code or city or country... e.g. 73100, Greece)', 
    'kanelggamapsapi:settings:defaultzoom:note' => 'Enter a numeric value for zoom',    
    'kanelggamapsapi:settings:cluster' => 'Use cluster feature of Google Maps', 
    'kanelggamapsapi:settings:cluster:no' => 'No', 
    'kanelggamapsapi:settings:cluster:yes' => 'Yes', 
    'kanelggamapsapi:settings:cluster:note' => 'Select Yes for clustering nearby entities on map.', 
    'kanelggamapsapi:settings:no' => 'No', 
    'kanelggamapsapi:settings:yes' => 'Yes',    
    'kanelggamapsapi:settings:unitmeas' => 'Distance Unit of Measurement', 
    'kanelggamapsapi:settings:unitmeas:meters' => 'Meters', 
    'kanelggamapsapi:settings:unitmeas:km' => 'Kilometers', 
    'kanelggamapsapi:settings:unitmeas:miles' => 'Miles',
    'kanelggamapsapi:settings:unitmeas:note' => 'Select Unit of Measurement will be used in searching.',  
    
    'kanelggamapsapi:settings:maponmenu' => 'Enable Global Entities Map and Search',
    'kanelggamapsapi:settings:maponmenu:note' => 'Select Yes if you want to enable global map search on all entities with geolocation',
    'kanelggamapsapi:settings:entities:notenabled' => 'None of map plugins are enabled',
    'kanelggamapsapi:settings:entities' => 'Select Entities to Include on Map',
    'kanelggamapsapi:settings:membersmap' => 'Include Members',
    'kanelggamapsapi:settings:membersmap:note' => 'Select Yes if you want to include members on global entities map ',
    'kanelggamapsapi:settings:groupsmap' => 'Include Groups',
    'kanelggamapsapi:settings:groupsmap:note' => 'Select Yes if you want to include groups on global entities map ',
	'kanelggamapsapi:settings:agora' => 'Include Classifieds',
    'kanelggamapsapi:settings:agora:note' => 'Select Yes if you want to include classifieds on global entities map ',
    'kanelggamapsapi:settings:gm_init' => 'Map Initialization',
    'kanelggamapsapi:settings:gm_init:note' => 'Select parameters below to determine entities to display when map is loading first time. Depending on the amount of entities, you should choose these parameters carefully for not allowing website to be overloaded and slow down.',
    'kanelggamapsapi:settings:gm_default_loc' => 'Default Location',
    'kanelggamapsapi:settings:gm_default_loc:note' => 'Select default location for initial search for guests or for members without location determined.',
    'kanelggamapsapi:settings:gm_distance' => 'Distance Radius',
    'kanelggamapsapi:settings:gm_distance:note' => 'Select radius distance in km. Value must be numeric.',    
    'kanelggamapsapi:settings:gm_entities_no' => 'No of Entities',
    'kanelggamapsapi:settings:gm_entities_no:note' => 'Select no of each entity to display. Value must be numeric. Enter 0 for unlimited (not recommended).',
	'admin:settings:kanelggamapsapi' => 'Kanelgga Maps API',
	'kanelggamapsapi:settings:save:ok' => 'Settings were successfully saved',
	'kanelggamapsapi:settings:tabs:general_options' => 'General Maps Options',
	'kanelggamapsapi:settings:tabs:global_options' => 'Global Map Options',
	'kanelggamapsapi:settings:gm_cluster' => 'Use cluster feature on Global Map', 
    'kanelggamapsapi:settings:gm_cluster:note' => 'Select Yes for clustering nearby entities on map. If disabled, an index table will be displayed for showing/hiding entities', 
    	
	
    //search 
    'kanelggamapsapi:search' => 'Search by location',
    'kanelggamapsapi:search:location' => 'location',
    'kanelggamapsapi:search:radius' => 'radius (meters)',
    'kanelggamapsapi:search:radius:meters' => 'radius (meters)',
    'kanelggamapsapi:search:radius:km' => 'radius (km)',
    'kanelggamapsapi:search:radius:miles' => 'radius (miles)',
    'kanelggamapsapi:search:meters' => 'meters',
    'kanelggamapsapi:search:km' => 'km',
    'kanelggamapsapi:search:miles' => 'miles',    
    'kanelggamapsapi:search:showradius' => 'Show search area',
    'kanelggamapsapi:search:submit' => 'Search',
    'kanelggamapsapi:searchnearby' => 'Search nearby',
    'kanelggamapsapi:mylocationsis' => 'My location is: ',
    'kanelggamapsapi:searchbyname' => 'Search by name',
    'kanelggamapsapi:search:name' => 'name',
    'kanelggamapsapi:search:searchname' => 'Search for %s and nearby',
    'kanelggamapsapi:search:usernotfound' => 'Entities not found',
    'kanelggamapsapi:search:usersfound' => 'Entities found',
    'kanelggamapsapi:search:around' => 'Entities nearby on members found',
    'kanelggamapsapi:showhideentities' => 'Show / Hide Entities',
);

add_translation('en', $language);
