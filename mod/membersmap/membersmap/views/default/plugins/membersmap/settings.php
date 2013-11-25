<?php 
	
$plugin = $vars["entity"];


// add tab on elgg members page
$customtab = $plugin->customtab;
if(empty($customtab)){
        $customtab = 'yes';
}   
$potential_memberstab = array(
    "no" => elgg_echo('membersmap:settings:no'),
    "yes" => elgg_echo('membersmap:settings:yes'),
); 

$memberstabfield = elgg_view('input/dropdown', array('name' => 'params[customtab]', 'value' => $customtab, 'options_values' => $potential_memberstab));
$memberstabfield .= "<div class='elgg-subtext'>" . elgg_echo('membersmap:settings:memberstab:note') . "</div>";
echo elgg_view_module("inline", elgg_echo('membersmap:settings:memberstab'), $memberstabfield);

// add tab on elgg members page
$maponmenu = $plugin->maponmenu;
if(empty($maponmenu)){
        $maponmenu = 'yes';
}    
$potential_maponmenu = array(
    "no" => elgg_echo('membersmap:settings:no'),
    "yes" => elgg_echo('membersmap:settings:yes'),
); 

$maponmenufield = elgg_view('input/dropdown', array('name' => 'params[maponmenu]', 'value' => $maponmenu, 'options_values' => $potential_maponmenu));
$maponmenufield .= "<div class='elgg-subtext'>" . elgg_echo('membersmap:settings:maponmenu:note') . "</div>";
echo elgg_view_module("inline", elgg_echo('membersmap:settings:maponmenu'), $maponmenufield);

// set if show 'search by name' form
$searchbyname = $plugin->searchbyname;
if(empty($searchbyname)){
        $searchbyname = 'yes';
}    
$potential_searchbyname = array(
    "no" => elgg_echo('membersmap:settings:no'),
    "yes" => elgg_echo('membersmap:settings:yes'),
); 

$searchbynamefield = elgg_view('input/dropdown', array('name' => 'params[searchbyname]', 'value' => $searchbyname, 'options_values' => $potential_searchbyname));
$searchbynamefield .= "<div class='elgg-subtext'>" . elgg_echo('membersmap:settings:searchbyname:note') . "</div>";
echo elgg_view_module("inline", elgg_echo('membersmap:settings:searchbyname'), $searchbynamefield);


// set default location
$defaultlocation = $plugin->map_default_location;
if(empty($defaultlocation)){
	$defaultlocation = CUSTOM_DEFAULT_LOCATION;
}

// Default map location
$defaultlocation = elgg_view('input/text', array('name' => 'params[map_default_location]', 'value' => $defaultlocation));
$defaultlocation .= "<div class='elgg-subtext'>" . elgg_echo('membersmap:settings:defaultlocation:note') . "</div>";
echo elgg_view_module("inline", elgg_echo('membersmap:settings:defaultlocation'), $defaultlocation);

// Default map zoom
$defaultzoomc = (int) $plugin->map_default_zoom;
if($defaultzoomc == ""){
	$defaultzoomc = CUSTOM_DEFAULT_ZOOM;
}

$defaultzoom = elgg_view('input/dropdown', array('name' => 'params[map_default_zoom]', 'value' => $defaultzoomc, 'options' => range(0, 19)));
$defaultzoom .= "<div class='elgg-subtext'>" . elgg_echo('membersmap:settings:defaultzoom:note') . "</div>";
echo elgg_view_module("inline", elgg_echo('membersmap:settings:defaultzoom'), $defaultzoom);  

// Map width
$map_width = elgg_view('input/text', array('name' => 'params[map_width]', 'value' => $plugin->map_width));
$map_width .= "<div class='elgg-subtext'>" . elgg_echo('membersmap:settings:map_width:how') . "</div>";
echo elgg_view_module("inline", elgg_echo('membersmap:settings:map_width'), $map_width);	

// Map height
$map_height = elgg_view('input/text', array('name' => 'params[map_height]', 'value' => $plugin->map_height));
$map_height .= "<div class='elgg-subtext'>" . elgg_echo('membersmap:settings:map_height:how') . "</div>";
echo elgg_view_module("inline", elgg_echo('membersmap:settings:map_height'), $map_height);	 

// set if use map cluster or no
$cluster = $plugin->cluster;
if(empty($cluster)){
        $cluster = 'yes';
}    
$potential_cluster = array(
    "no" => elgg_echo('membersmap:settings:no'),
    "yes" => elgg_echo('membersmap:settings:yes'),
); 

$clusterfield = elgg_view('input/dropdown', array('name' => 'params[cluster]', 'value' => $cluster, 'options_values' => $potential_cluster));
$clusterfield .= "<div class='elgg-subtext'>" . elgg_echo('membersmap:settings:cluster:note') . "</div>";
echo elgg_view_module("inline", elgg_echo('membersmap:settings:cluster'), $clusterfield);

// set if use map cluster or no
$markericon = $plugin->markericon;
if(empty($markericon)){
        $markericon = 'smiley';
}    
$potential_icon = array(
    "blue-light" => elgg_echo('membersmap:settings:markericon:blue-light'),
    "blue" => elgg_echo('membersmap:settings:markericon:blue'),
    "green" => elgg_echo('membersmap:settings:markericon:green'),
    "grey" => elgg_echo('membersmap:settings:markericon:grey'),
    "orange" => elgg_echo('membersmap:settings:markericon:orange'),
    "pink" => elgg_echo('membersmap:settings:markericon:pink'),
    "purple-light" => elgg_echo('membersmap:settings:markericon:purple-light'),
    "purple" => elgg_echo('membersmap:settings:markericon:purple'),
    "red" => elgg_echo('membersmap:settings:markericon:red'),
    "yellow" => elgg_echo('membersmap:settings:markericon:yellow'),
); 

$map_icon = elgg_view('input/dropdown', array('name' => 'params[markericon]', 'value' => $markericon, 'options_values' => $potential_icon));
$map_icon .= "<div class='elgg-subtext'>" . elgg_echo('membersmap:settings:markericon:note') . "</div>";
echo elgg_view_module("inline", elgg_echo('membersmap:settings:markericon'), $map_icon);


// set unit of measurement for distance searching
$unitmeas = $plugin->unitmeas;
if(empty($unitmeas)){
        $unitmeas = 'meters';
}    
$potential_unitmeas = array(
    "meters" => elgg_echo('membersmap:settings:unitmeas:meters'),
    "km" => elgg_echo('membersmap:settings:unitmeas:km'),
    "miles" => elgg_echo('membersmap:settings:unitmeas:miles'),
); 

$unit_of_measurement = elgg_view('input/dropdown', array('name' => 'params[unitmeas]', 'value' => $unitmeas, 'options_values' => $potential_unitmeas));
$unit_of_measurement .= "<div class='elgg-subtext'>" . elgg_echo('membersmap:settings:unitmeas:note') . "</div>";
echo elgg_view_module("inline", elgg_echo('membersmap:settings:unitmeas'), $unit_of_measurement);


// batch convert geolocation	
$batchlink = elgg_view('output/url', array(
	'href' => "mod/membersmap/putusersonmap.php",
	'text' => elgg_echo('membersmap:settings:batchusers:start'),
	'class' => "elgg-button-action",
	'target' => "_blank",
	'style' => "padding: 3px;",
));
$batchlink .= "<div style='float:right;'>" . elgg_echo('membersmap:settings:batchusers:note') ."</div>";			
echo elgg_view_module("inline", elgg_echo('membersmap:settings:batchusers'),"<div class='elgg-text'>".$batchlink."</div>");
