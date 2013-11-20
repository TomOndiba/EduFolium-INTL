<?php 
	
$plugin = $vars["entity"];

$defaultlocation = $plugin->map_default_location;

if(empty($defaultlocation)){
        $defaultlocation = 'Greece';
}

$defaultzoomc = (int) $plugin->map_default_zoom;
if($plugin->map_default_zoom == ""){
        $defaultzoomc = 10;
}

// Default map location
$defaultlocation = elgg_view('input/text', array('name' => 'params[map_default_location]', 'value' => $plugin->map_default_location));
$defaultlocation .= "<div class='elgg-subtext'>" . elgg_echo('membersmap:settings:defaultlocation:note') . "</div>";
echo elgg_view_module("inline", elgg_echo('membersmap:settings:defaultlocation'), $defaultlocation);

// Default map zoom
// $defaultzoom = elgg_view('input/text', array('name' => 'params[map_default_zoom]', 'value' => $plugin->map_default_zoom));
$defaultzoom = elgg_view('input/dropdown', array('name' => 'params[map_default_zoom]', 'value' => $defaultzoomc, 'options' => range(0, 19)));
$defaultzoom .= "<div class='elgg-subtext'>" . elgg_echo('membersmap:settings:defaultzoom:note') . "</div>";
echo elgg_view_module("inline", elgg_echo('membersmap:settings:defaultzoom'), $defaultzoom);  

// set if use map cluster or no
$cluster = $plugin->cluster;
if(empty($cluster)){
        $cluster = 'yes';
}    
$potential_cluster = array(
    "no" => elgg_echo('membersmap:settings:cluster:no'),
    "yes" => elgg_echo('membersmap:settings:cluster:yes'),
); 

$clusterfield = elgg_view('input/dropdown', array('name' => 'params[cluster]', 'value' => $cluster, 'options_values' => $potential_cluster));
$clusterfield .= "<div class='elgg-subtext'>" . elgg_echo('membersmap:settings:cluster:note') . "</div>";
echo elgg_view_module("inline", elgg_echo('membersmap:settings:cluster'), $clusterfield); 


// Google API
$google = elgg_view('input/text', array('name' => 'params[google_api_key]', 'value' => $plugin->google_api_key));
$google .= "<div class='elgg-subtext'>" . elgg_echo('membersmap:settings:google_api_key:clickhere') . "</div>";
echo elgg_view_module("inline", elgg_echo('membersmap:settings:google_api_key'), $google);        

// Map width
$map_width = elgg_view('input/text', array('name' => 'params[map_width]', 'value' => $plugin->map_width));
$map_width .= "<div class='elgg-subtext'>" . elgg_echo('membersmap:settings:map_width:how') . "</div>";
echo elgg_view_module("inline", elgg_echo('membersmap:settings:map_width'), $map_width);	

// Map height
$map_height = elgg_view('input/text', array('name' => 'params[map_height]', 'value' => $plugin->map_height));
$map_height .= "<div class='elgg-subtext'>" . elgg_echo('membersmap:settings:map_height:how') . "</div>";
echo elgg_view_module("inline", elgg_echo('membersmap:settings:map_height'), $map_height);	        
	