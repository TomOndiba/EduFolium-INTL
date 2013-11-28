<?php
/**
 * Elgg membersmap plugin language pack
 *
 * @package MembersMap
 */

$language = array(

    //Menu items and titles
    'membersmap' => "Χάρτης Μελών",
    'membersmap:menu' => "Χάρτης Μελών",
    'membersmap:all' => "Χάρτης Μελών",
    'membersmap:allmembers' => "Όλα τα Μέλη",
    'membersmap:membersof' => "Μέλη του %s",
    'membersmap:map' => "Map",
    
    //tabs
    'membersmap:label:all' => "Όλοι οι Χρήστες",
    'membersmap:label:friends' => "Οι Φίλοι μου",
    'membersmap:label:online' => "Online Χρήστες",
    
    //search 
    'membersmap:search' => "Αναζήτηση μελών",
    'membersmap:search:location' => "τοποθεσία",
    'membersmap:search:radius' => "απόσταση (μέτρα)",
    'membersmap:search:radius:meters' => "απόσταση (μέτρα)",
    'membersmap:search:radius:km' => "απόσταση (χιλιόμετρα)",
    'membersmap:search:radius:miles' => "απόσταση (μίλια)",    
    'membersmap:search:meters' => "μέτρα",
    'membersmap:search:km' => "χμ",
    'membersmap:search:miles' => "μίλια",    
    'membersmap:search:showradius' => "Εμφάνιση περιοχής αναζήτησης",
    'membersmap:search:submit' => "Αναζήτηση",
    'membersmap:searchnearby' => "Κοντινά μέλη",
    'membersmap:mylocationsis' => "Η τοποθεσία μου: ",
    'membersmap:searchbyname' => "Αναζήτηση μελών με όνομα",
    'membersmap:search:name' => "όνομα μέλους",
    'membersmap:search:searchname' => "Αναζήτηση μελών για %s",
    'membersmap:search:usernotfound' => "Δεν βρέθηκαν μέλη κατά την αναζήτηση σας",
    'membersmap:search:usersfound' => "Χρήστες που βρέθηκαν",
    'membersmap:search:around' => "Μέλη κοντινά στους χρήστες που βρέθηκαν",    
 
    //groups
    'mambersmap:group' => "Χάρτης Μελών Ομάδας",
    'mambersmap:group:none' => "Δεν υπάρχουν μέλη στην Ομάδα",
    'mambersmap:group:enablemaps' => "Ενεργοποίηση Χάρτη Μελών",
    
    //js alerts
    'membersmap:map:1' => "Παρακαλούμε καταχωρείστε μια έγκυρη προεπιλεγμένη διεύθυνση στην ενότητα διαχείρισης",
    'membersmap:map:2' => "Μη έγκυρη τοποθεσία",
    'membersmap:map:3' => "Geocode was not successful for the following reason",
    
    // settings
    'membersmap:settings:google_maps' => 'Google Maps',
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
    'membersmap:settings:cluster:no' => 'Όχι', 
    'membersmap:settings:cluster:yes' => 'Ναι', 
    'membersmap:settings:cluster:note' => 'Select Yes for clustering nearby members on map. ',
    'membersmap:settings:markericon' => 'Επιλογή εικόνας', 
    'membersmap:settings:markericon:blue-light' => 'Ανοικτό μπλε', 
    'membersmap:settings:markericon:blue' => 'Μπλε', 
    'membersmap:settings:markericon:green' => 'Πράσινο', 
    'membersmap:settings:markericon:grey' => 'Γκρι', 
    'membersmap:settings:markericon:orange' => 'Πορτοκαλί', 
    'membersmap:settings:markericon:pink' => 'Ροζ', 
    'membersmap:settings:markericon:purple-light' => 'Ανοικτό μωβ', 
    'membersmap:settings:markericon:purple' => 'Μωβ', 
    'membersmap:settings:markericon:red' => 'Κόκκινο', 
    'membersmap:settings:markericon:yellow' => 'Κίτρινο', 
    'membersmap:settings:markericon:note' => 'Επιλέξτε εικονίδιο για την προβολή μελών στο χάρτη',  
    'membersmap:settings:searchbyname' => 'Αναζήτηση μελών με όνομα', 
    'membersmap:settings:searchbyname:no' => 'Όχι', 
    'membersmap:settings:searchbyname:yes' => 'Ναι', 
    'membersmap:settings:searchbyname:note' => 'Επιλέξτε εάν θέλετε να εμφανίζεται η φόρμα "Αναζήτηση μελών με όνομα" form. ',     
    'membersmap:settings:unitmeas' => 'Distance Unit of Measurement', 
    'membersmap:settings:unitmeas:meters' => 'Meters', 
    'membersmap:settings:unitmeas:km' => 'Kilometers', 
    'membersmap:settings:unitmeas:miles' => 'Miles',
    'membersmap:settings:unitmeas:note' => 'Select Unit of Measurement will be used in searching.',   
    'membersmap:settings:memberstab' => 'Add "Map of Members" tab on Elgg Members Page', 
    'membersmap:settings:memberstab:note' => 'Select if you want to add a "Map of Members" tab on Elgg Members Page (domain/members). ',    
    'membersmap:settings:maponmenu' => 'Add "Map of Members" item on site menu', 
    'membersmap:settings:maponmenu:note' => 'Select if you want to add a "Map of Members" item on site menu. ',      
    'membersmap:settings:no' => 'No', 
    'membersmap:settings:yes' => 'Yes',
    'membersmap:settings:batchusers' => 'Batch Users Geolocation',
    'membersmap:settings:batchusers:start' => 'Start Geolocation',
    'membersmap:settings:batchusers:note' => 'If you already members on your Elgg site, click on this button for converting users location to coordinates.<br />You have to do it <strong>just once</strong> when you start using this plugin.',
    
    
    // widget
    'membersmap:wg:title' => 'Τοποθεσία', 
    'membersmap:wg:detail' => 'Εμφανίστε την τοποθεσία σας',
    'membersmap:zoom' => 'Zoom', 
);

add_translation("el", $language);
