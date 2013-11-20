<?php
/**
 * Elgg membersmap helper functions
 *
 * @package MembersMap
 */

// Based on user location, save his coords. 
function save_user_coords($location, $owner) {
    $mapkey = trim(elgg_get_plugin_setting('google_api_key', 'membersmap'));
    $geocoder = new Geocoder($mapkey);

    if ($location) {
        try {
            $placemarks = $geocoder->lookup($location);
        }
        catch (Exception $ex) {
            system_message($ex->getMessage());
            exit;
        }   

        if (count($placemarks) > 0) { 
            $owner->setLatLong($placemarks[0]->getPoint()->getLatitude(),$placemarks[0]->getPoint()->getLongitude());
            $owner->setLocation($location);
            return true;
        } 
    }
    return false;
}

function get_online_users_map() {
     //$count = find_active_users(600, 10, 0, true);
     $objects = find_active_users(600, 0);
 
     return $objects;
}

// Retrieve map width from settings
function get_map_width() {
    $mapwidth = trim(elgg_get_plugin_setting('map_width', 'membersmap'));
    if (strripos($mapwidth, '%') === false) {
        if (is_numeric($mapwidth))  $mapwidth = $mapwidth.'px';
        else $mapwidth = '100%';
    } 

    return $mapwidth;
}

// Retrieve map height from settings
function get_map_height() {
    $mapheight = trim(elgg_get_plugin_setting('map_height', 'membersmap'));
    if (strripos($mapheight, '%') === false) {
        if (is_numeric($mapheight))  $mapheight = $mapheight.'px';
        else $mapheight = '500px';
    } 

    return $mapheight;
}

// Retrieve map default location from settings
function get_map_default_location() {
    $defaultlocation = trim(elgg_get_plugin_setting('map_default_location', 'membersmap'));

    return $defaultlocation;
}

// Retrieve map zoom from settings
function get_map_zoom() {
    $mapzoom = trim(elgg_get_plugin_setting('map_default_zoom', 'membersmap'));
    if (!is_numeric($mapzoom)) $mapzoom = 8;
    if ($mapzoom<0) $mapzoom = 8;
    if ($mapzoom>20) $mapzoom = 8;

    return $mapzoom;
}

// Retrieve cluster feature from settings
function get_map_clustering() {
    $cluster = trim(elgg_get_plugin_setting('cluster', 'membersmap'));
    if ($cluster === 'yes') {
        return true;
    }
    
    return false;
}
