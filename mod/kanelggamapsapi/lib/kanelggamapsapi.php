<?php
/**
 * Elgg kanelggamapsapi plugin
 * @package KanelggaMapsApi 
 */

// Based on user location, save his coords. 
function save_object_coords($location, $object, $pluginname) {
    $mapkey = trim(elgg_get_plugin_setting('google_api_key', $pluginname));
    $geocoder = new Geocoder($mapkey);

    if ($location) {
        try {
            $placemarks = $geocoder->lookup($location);
        }
        catch (Exception $ex) {
            system_message($ex->getMessage());
            //exit;
        }   

        if (count($placemarks) > 0) { 
            $object->setLatLong($placemarks[0]->getPoint()->getLatitude(),$placemarks[0]->getPoint()->getLongitude());
            $object->setLocation($location);
            return true;
        } 
    }
    
    return false;
}

// get online users
function get_online_users_map() {
     //$count = find_active_users(600, 10, 0, true);
     $objects = find_active_users(600, 0);
 
     return $objects;
}

// Retrieve map width from settings
function get_marker_icon($pluginname = null) {
    $markericon = trim(elgg_get_plugin_setting('markericon', $pluginname));
    if (!isset($markericon) || !$markericon) {
        $markericon = 'smiley.png';
    }
    else {
        $markericon = $markericon.'.png';
    }

    return $markericon;
}

// Retrieve map width from settings
function get_map_width($pluginname = null) {
    $mapwidth = trim(elgg_get_plugin_setting('map_width', $pluginname));
    if (strripos($mapwidth, '%') === false) {
        if (is_numeric($mapwidth))  $mapwidth = $mapwidth.'px';
        else $mapwidth = '100%';
    } 

    return $mapwidth;
}

// Retrieve map height from settings
function get_map_height($pluginname = null) {
    $mapheight = trim(elgg_get_plugin_setting('map_height', $pluginname));
    if (strripos($mapheight, '%') === false) {
        if (is_numeric($mapheight))  $mapheight = $mapheight.'px';
        else $mapheight = '500px';
    } 

    return $mapheight;
}

// Retrieve map default location from settings
function get_map_default_location($pluginname = null) {
    $defaultlocation = trim(elgg_get_plugin_setting('map_default_location', $pluginname));

    return $defaultlocation;
}

// Retrieve map zoom from settings
function get_map_zoom($pluginname = null) {
    $mapzoom = trim(elgg_get_plugin_setting('map_default_zoom', $pluginname));
    if (!is_numeric($mapzoom)) $mapzoom = 8;
    if ($mapzoom<0) $mapzoom = 8;
    if ($mapzoom>20) $mapzoom = 8;

    return $mapzoom;
}

// Retrieve cluster feature from settings
function get_map_clustering($pluginname = null) {
    $cluster = trim(elgg_get_plugin_setting('cluster', $pluginname));
    if ($cluster === 'yes') {
        return true;
    }
    
    return false;
}

// Retrieve 'search by name' feature from settings
function get_search_by_name($pluginname = null) {
    $searchbyname = trim(elgg_get_plugin_setting('searchbyname', $pluginname));
    if ($searchbyname === 'yes') {
        return true;
    }
    
    return false;
}

// Retrieve unit of measurement for distance searching
function get_unit_of_measurement($pluginname = null) {
    $unitmeas = trim(elgg_get_plugin_setting('unitmeas', $pluginname));
    if ($unitmeas === 'meters') {
        return 1;
    }
    else if ($unitmeas === 'km') {
        return 1000;
    }
    else if ($unitmeas === 'miles') {
        return 1609.344;
    }
    
    return 1; // default value is for meters
}

// Retrieve unit of measurement string for distance searching input box
function get_unit_of_measurement_string($pluginname = null) {
    $unitmeas = trim(elgg_get_plugin_setting('unitmeas', $pluginname));
    if ($unitmeas === 'meters') {
        return elgg_echo("kanelggamapsapi:search:radius:meters");
    }
    else if ($unitmeas === 'km') {
        return elgg_echo("kanelggamapsapi:search:radius:km");
    }
    else if ($unitmeas === 'miles') {
        return elgg_echo("kanelggamapsapi:search:radius:miles");
    }
    
    return elgg_echo("kanelggamapsapi:settings:unitmeas:meters"); // default value is for meters
}

// Retrieve unit of measurement string for map tooltip
function get_unit_of_measurement_string_simple($pluginname = null) {
    $unitmeas = trim(elgg_get_plugin_setting('unitmeas', $pluginname));
    if ($unitmeas === 'meters') {
        return elgg_echo("kanelggamapsapi:search:meters");
    }
    else if ($unitmeas === 'km') {
        return elgg_echo("kanelggamapsapi:search:km");
    }
    else if ($unitmeas === 'miles') {
        return elgg_echo("kanelggamapsapi:search:miles");
    }
    
    return elgg_echo("kanelggamapsapi:search:meters"); // default value is for meters
}

// check if add tab on members page from settings
function check_if_add_tab_on_entity_page($pluginname = null) {
    $customtab = trim(elgg_get_plugin_setting('customtab', $pluginname));
    if ($customtab === 'yes') {
        return true;
    }
    
    return false;
}

// check if add "Map of Members" item on site menu
function check_if_map_menu_item($pluginname = null) {
    $maponmenu = trim(elgg_get_plugin_setting('maponmenu', $pluginname));
    if ($maponmenu === 'no') {
        return false;
    }
    
    return true;
}

// remove single and double quotes from strings
function remove_shits($toclear) {
     $cleared = str_replace("'", "&#39;", $toclear);
     $cleared = str_replace('"', "&quot;", $cleared);
 
     return $cleared;
}

// hack for disable public access to maps for specific site
function not_permit_public_access() {
	$current_site = elgg_get_site_entity();
	$temp = array();
	$temp = explode(".", get_site_domain($current_site->guid));
	if (in_array("socialbusinessworld", $temp)) {
		return true;
	}
	
	return false;
}
