<?php
/**
 * Members search page
 *
 */

elgg_load_library('elgg:membersmap');
elgg_load_library('elgg:membersmapgeocoder');

$name = sanitize_string(get_input('name'));
$radius = sanitize_string(get_input('radius'));

elgg_push_breadcrumb(elgg_echo('membersmap'), "membersmap/all");
elgg_push_breadcrumb(elgg_echo('membersmap:searchbyname'));
$title = elgg_echo('membersmap:search:searchname', array($name));

// Retrieve map width 
$mapwidth = get_map_width();
// Retrieve map height
$mapheight = get_map_height();
// Retrieve map default location
$defaultlocation = get_map_default_location();
// Retrieve map zoom
$mapzoom = get_map_zoom();
// Retrieve cluster feature
$clustering = get_map_clustering();

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

$db_prefix = elgg_get_config('dbprefix');
$params1 = array(
    'type' => 'user', 
    'full_view' => false,
    'limit' => 0,
    'joins' => array("JOIN {$db_prefix}users_entity u ON e.guid=u.guid"),
    'wheres' => array("(u.name LIKE \"%{$name}%\" OR u.username LIKE \"%{$name}%\")"),
);

$usersfound = array();
$usersfound = elgg_get_entities($params1);

if (empty($usersfound)) {
    $content = elgg_echo('membersmap:search:usernotfound');
}
else    {
    $params2 = array(
        'type' => 'user', 
        'full_view' => false,
        'limit' => 0,
        'joins' => array("JOIN {$db_prefix}users_entity u ON e.guid=u.guid"),
        'wheres' => array("(u.name NOT LIKE \"%{$name}%\" AND u.username NOT LIKE \"%{$name}%\")"),
    );    
    $users = elgg_get_entities($params2);
    //$users = elgg_get_entities(array('types'=>'user'));
    $content = elgg_view('maps/searchname', array(
        'usersfound'=>$usersfound,
        'user'=>$users,
        'mapwidth'=>$mapwidth,
        'mapheight'=>$mapheight,
        'defaultlocation'=>$defaultlocation,
        'defaultzoom'=>$mapzoom,
        'radius'=>$radius,
        'name'=>$name,
        'defaultcoords'=>$defaultcoords,
        'clustering'=>$clustering
        )
    );
}

$params = array(
	'title' => $title,
	'content' => $content,
	'sidebar' => elgg_view('membersmap/sidebar'),
);

$body = elgg_view_layout('one_sidebar', $params);

echo elgg_view_page($title, $body);
