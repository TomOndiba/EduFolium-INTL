<?php
/**
 * Elgg membersmap plugin
 *
 * @package MembersMap 
 */

elgg_register_event_handler('init', 'system', 'membersmap_init');

/**
 * MembersMap plugin initialization functions.
 */
function membersmap_init() {  
	define('CUSTOM_DEFAULT_COORDS', '49.037868,14.941406');	// set coords of Europe in case default location is not set
	define('CUSTOM_DEFAULT_LOCATION', 'Africa');	// set default location in case default location is not set
	define('CUSTOM_DEFAULT_ZOOM', 10);	// set default zoom in case is not set
	define('CUSTOM_CLUSTER_ZOOM', 7);	// set cluster zoom that define when markers grouping ends	
	
    // load kanelgga maps api libraries if it's enabled. If not, it will not be working
    if(elgg_is_active_plugin("kanelggamapsapi")){
		elgg_load_library('elgg:kanelggamapsapi');  
		elgg_load_library('elgg:kanelggamapsapigeocoder'); 
	}
    
       
    // Site navigation: add if enabled in settings
    if(elgg_is_active_plugin("kanelggamapsapi")){
		if (check_if_map_menu_item('membersmap'))	{
			$item = new ElggMenuItem('membersmap', elgg_echo('membersmap:menu'), 'membersmap/all');
			elgg_register_menu_item('site', $item); 
		}
    }
    
    // Extend CSS
    elgg_extend_view('css/elgg', 'membersmap/css');

    // register extra js files
    $mapkey = trim(elgg_get_plugin_setting('google_api_key', 'kanelggamapsapi'));
    elgg_register_js('basicjs', '/mod/membersmap/assets/membersmap.js');
    elgg_register_js('placeholderjs', '/mod/membersmap/assets/jquery.placeholder.js');
    elgg_register_js('gmap1', 'https://maps.googleapis.com/maps/api/js?sensor=false&amp;key=' . $mapkey);
    elgg_register_js('gmap2', 'https://maps.googleapis.com/maps/api/js?sensor=true&libraries=places&amp;key=' . $mapkey);    
    elgg_register_js('gmap3', 'https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&amp;key=' . $mapkey);
    elgg_register_js('gmap4', 'http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclusterer/src/markerclusterer_compiled.js');
    elgg_register_js('omsjs', '/mod/membersmap/assets/oms.min.js');
    
    // extend group main page 
    elgg_extend_view('groups/tool_latest', 'membersmap/group_module');
    
    // add the group members maps tool option
    add_group_tool_option('membersmap', elgg_echo('mambersmap:group:enablemaps'), true);    

    // Register a page handler, so we can have nice URLs
    elgg_register_page_handler('membersmap', 'membersmap_page_handler');

    // Register actions
    //$action_path = elgg_get_plugins_path() . 'membersmap/actions';
    //elgg_unregister_action('profile/edit');
    //elgg_register_action("profile/edit", "$action_path/edit.php");
    
    // Register widget
    elgg_register_widget_type('membersmap',elgg_echo("membersmap:wg:title"),elgg_echo("membersmap:wg:detail"));
    
	// Register a handler for create members
	elgg_register_event_handler('create', 'user', 'membersmap_geolocation');   
	// Register a handler for update members
	elgg_register_event_handler('update', 'user', 'membersmap_geolocation');		 
      
}

/**
 *  Dispatches membersmap pages.
 *
 * @param array $page
 * @return bool
 */

function membersmap_page_handler($page) {
	$base = elgg_get_plugins_path() . 'membersmap/pages/membersmap';

	if (!isset($page[0])) {
		$page[0] = 'all';
	}

	$vars = array();
	$vars['page'] = $page[0];

	if ($page[0] == 'search') {
		$vars['search_type'] = $page[1];
		require_once "$base/search.php";
	} else {
		require_once "$base/world.php";
	}
	return true;
}

/**
 * Geolocate User based on location field
 */
function membersmap_geolocation($event, $object_type, $object) {
	$location = $object->location;
	if ($location) {
		$ccc = save_object_coords($location, $object, 'kanelggamapsapi');
	}	
	//register_error(elgg_echo('skata'));
	
	return true;
}



