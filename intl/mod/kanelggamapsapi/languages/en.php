<?php
/**
 * Elgg kanelggamapsapi plugin
 * @package KanelggaMapsApi 
 */

$language = array(

    'kanelggamapsapi:search:radius:meters' => "radius (meters)",
    'kanelggamapsapi:search:radius:km' => "radius (km)",
    'kanelggamapsapi:search:radius:miles' => "radius (miles)",
    'kanelggamapsapi:search:meters' => "meters",
    'kanelggamapsapi:search:km' => "km",
    'kanelggamapsapi:search:miles' => "miles", 

    // settings
    'kanelggamapsapi:settings:google_maps' => 'Google Maps settings',
    'kanelggamapsapi:settings:google_api_key' => 'Enter your Google API key',
    'kanelggamapsapi:settings:google_api_key:clickhere' => 'Go to <a target="_blank" href="https://developers.google.com/maps/documentation/javascript/tutorial#api_key">https://developers.google.com/maps/documentation/javascript/tutorial#api_key</a> to get your "Google API key". <br />(<strong>Note:</strong> the API key is NOT required. Only if you want stats on your api usage, or if you have a paid API account the key is needed)',
    
    'kanelggamapsapi:settings:unitmeas' => 'Distance Unit of Measurement', 
    'kanelggamapsapi:settings:unitmeas:meters' => 'Meters', 
    'kanelggamapsapi:settings:unitmeas:km' => 'Kilometers', 
    'kanelggamapsapi:settings:unitmeas:miles' => 'Miles',
    'kanelggamapsapi:settings:unitmeas:note' => 'Select Unit of Measurement will be used in searching.',      

);

add_translation("en", $language);
