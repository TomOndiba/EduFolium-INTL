<?php
/**
 * Elgg kanelggamapsapi plugin
 * @package KanelggaMapsApi 
 */

elgg_register_event_handler('init', 'system', 'kanelggamapsapi_init');

/**
 * kanelggamapsapi plugin initialization functions.
 */
function kanelggamapsapi_init() {  
    // register a library of helper functions
    elgg_register_library('elgg:kanelggamapsapi', elgg_get_plugins_path() . 'kanelggamapsapi/lib/kanelggamapsapi.php');
    elgg_register_library('elgg:kanelggamapsapigeocoder', elgg_get_plugins_path() . 'kanelggamapsapi/lib/Geocoder.php');
       
    // register extra js files
    $mapkey = trim(elgg_get_plugin_setting('google_api_key', 'kanelggamapsapi'));
    elgg_register_js('kmpbasicjs', '/mod/kanelggamapsapi/assets/kanelggamapsapi.js');
    elgg_register_js('kmpplaceholderjs', '/mod/kanelggamapsapi/assets/jquery.placeholder.js');
    elgg_register_js('kmpgmap1', 'https://maps.googleapis.com/maps/api/js?sensor=false&amp;key=' . $mapkey);
    elgg_register_js('kmpgmap2', 'https://maps.googleapis.com/maps/api/js?sensor=true&libraries=places&amp;key=' . $mapkey);    
    elgg_register_js('kmpgmap3', 'https://maps.google.com/maps/api/js?sensor=false&libraries=geometry&amp;key=' . $mapkey);
    elgg_register_js('kmpgmap4', 'http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclusterer/src/markerclusterer_compiled.js');
    elgg_register_js('kmpomsjs', '/mod/kanelggamapsapi/assets/oms.min.js');
    
}



