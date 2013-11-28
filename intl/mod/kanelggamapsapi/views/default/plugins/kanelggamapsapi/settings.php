<?php
/**
 * Elgg kanelggamapsapi plugin
 * @package KanelggaMapsApi 
 */
	
$plugin = $vars["entity"];


// Google API
$google = elgg_view('input/text', array('name' => 'params[google_api_key]', 'value' => $plugin->google_api_key));
$google .= "<div class='elgg-subtext'>" . elgg_echo('kanelggamapsapi:settings:google_api_key:clickhere') . "</div>";
echo elgg_view_module("inline", elgg_echo('kanelggamapsapi:settings:google_api_key'), $google);        

