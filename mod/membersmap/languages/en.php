<?php
/**
 * Elgg membersmap plugin language pack
 *
 * @package MembersMap
 */

$english = array(

    //Menu items and titles
    'membersmap' => "Map of Members",
    'membersmap:menu' => "Map of Members",
    'membersmap:all' => "Map of Members",
    'membersmap:allmembers' => "All Members",
    'membersmap:membersof' => "'s Members",
    
    //tabs
    'membersmap:label:all' => "All Members",
    'membersmap:label:friends' => "My Friends",
    'membersmap:label:online' => "Online Members",
    
    //search 
    'membersmap:search' => "Search members by location",
    'membersmap:search:location' => "location",
    'membersmap:search:radius' => "radius (meters)",
    'membersmap:search:showradius' => "Show search area",
    'membersmap:search:submit' => "Search",
    'membersmap:searchnearby' => "Search nearby members",
    'membersmap:mylocationsis' => "My location is: ",
    'membersmap:searchbyname' => "Search members by name",
    'membersmap:search:name' => "name",
    'membersmap:search:searchname' => "Member search for %s and nearby",
    'membersmap:search:usernotfound' => "Members not found",
    'membersmap:search:usersfound' => "Members found",
    'membersmap:search:around' => "Members nearby on members found",
 
    //groups
    'mambersmap:group' => "Group Members on Map",
    'mambersmap:group:none' => "No members on this group",
    'mambersmap:group:enablemaps' => "Enable Map of Members",
    
    //js alerts
    'membersmap:map:1' => "Please enter a valid default location on admin section",
    'membersmap:map:2' => "No valid search address",
    'membersmap:map:3' => "Geocode was not successful for the following reason",
    
    // settings
    'membersmap:settings:google_maps' => 'Google Maps settings',
    'membersmap:settings:google_api_key' => 'Enter your Google API key',
    'membersmap:settings:google_api_key:clickhere' => 'Go to <a target="_blank" href="https://developers.google.com/maps/documentation/javascript/tutorial#api_key">https://developers.google.com/maps/documentation/javascript/tutorial#api_key</a> to get your "Google API key". <br />(<strong>Note:</strong> the API key is NOT required. Only if you want stats on your api usage, or if you have a paid API account the key is needed)',
    'membersmap:settings:map_width' => 'Width of map',
    'membersmap:settings:map_width:how' => 'Numeric value (e.g. 500) or % (e.g. 100%)',
    'membersmap:settings:map_height' => 'Height of map',
    'membersmap:settings:map_height:how' => 'Numeric value (e.g. 500)',    
    'membersmap:settings:defaultlocation' => 'Default location address',     
    'membersmap:settings:defaultlocation:note' => 'Enter a valid location address (postal address or postal code or city or country... e.g. 73100, Greece)', 
    'membersmap:settings:defaultzoom' => 'Default map zoom',     
    'membersmap:settings:defaultzoom:note' => 'Enter a numeric value for zoom',    
    'membersmap:settings:cluster' => 'Use cluster feature of Google Maps', 
    'membersmap:settings:cluster:no' => 'No', 
    'membersmap:settings:cluster:yes' => 'Yes', 
    'membersmap:settings:cluster:note' => 'Select Yes for clustering nearby members on map. ', 
);

add_translation("en", $english);
