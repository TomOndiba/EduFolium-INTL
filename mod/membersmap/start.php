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
    // register a library of helper functions
    elgg_register_library('elgg:membersmap', elgg_get_plugins_path() . 'membersmap/lib/membersmap.php');
    elgg_register_library('elgg:membersmapgeocoder', elgg_get_plugins_path() . 'membersmap/lib/Geocoder.php');
        
    // Site navigation
    $item = new ElggMenuItem('membersmap', elgg_echo('membersmap:menu'), 'membersmap/all');
    //elgg_register_menu_item('site', $item); 
    
    // Extend CSS
    elgg_extend_view('css/elgg', 'membersmap/css');

    // register extra js files
    $mapkey = trim(elgg_get_plugin_setting('google_api_key', 'membersmap'));
    elgg_register_js('basicjs', 'mod/membersmap/assets/membersmap.js');
    elgg_register_js('placeholderjs', 'mod/membersmap/assets/jquery.placeholder.js');
    elgg_register_js('gmap1', 'https://maps.googleapis.com/maps/api/js?sensor=false&amp;key=' . $mapkey);
    elgg_register_js('gmap2', 'https://maps.googleapis.com/maps/api/js?sensor=true&libraries=places&amp;key=' . $mapkey);    
    elgg_register_js('gmap3', 'https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&amp;key=' . $mapkey);
    elgg_register_js('gmap4', 'http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclusterer/src/markerclusterer_compiled.js');
    
    // extend group main page 
    elgg_extend_view('groups/tool_latest', 'membersmap/group_module');
    
    // add the group members maps tool option
    add_group_tool_option('membersmap', elgg_echo('membersmap:group:enablemaps'), true);    

    // Register a page handler, so we can have nice URLs
    elgg_register_page_handler('membersmap', 'membersmap_page_handler');

    // Register actions
    $action_path = elgg_get_plugins_path() . 'membersmap/actions';
    elgg_unregister_action('profile/edit');
    elgg_register_action("profile/edit", "$action_path/edit.php");
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



