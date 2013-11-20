<?php
/**
 * Elgg membersmap plugin language pack
 *
 * @package MembersMap
 */

$spanish = array(

    //Menu items and titles
    'membersmap' => "Mapa de Docentes",
    'membersmap:menu' => "Mapa de Docentes",
    'membersmap:all' => "Mapa de Docentes",
    'membersmap:allmembers' => "Todos los Docentes",
    'membersmap:membersof' => "Docentes de",
    
    //tabs
    'membersmap:label:all' => "Todos los Docentes",
    'membersmap:label:friends' => "Mis Amigos",
    'membersmap:label:online' => "Docentes en Línea",
    
    //search 
    'membersmap:search' => "Buscar docentes por ubicación",
    'membersmap:search:location' => "Ubicación",
    'membersmap:search:radius' => "Radio (metros)",
    'membersmap:search:showradius' => "Mostrar area de búsqueda",
    'membersmap:search:submit' => "Búqueda",
    'membersmap:searchnearby' => "Buscar docentes cercanos",
    'membersmap:mylocationsis' => "Mi ubicación es: ",
    'membersmap:searchbyname' => "Buscar docentes por nombre",
    'membersmap:search:name' => "nombre",
    'membersmap:search:searchname' => "Buscar miebros cercanos y %s ",
    'membersmap:search:usernotfound' => "Docentes no encontrados",
    'membersmap:search:usersfound' => "Docentes encontrados",
    'membersmap:search:around' => "Docentes cercanos encontrados",
 
    //groups
    'mambersmap:group' => "Agrupar docentes en el mapa",
    'mambersmap:group:none' => "No hay docentes en este grupo",
    'mambersmap:group:enablemaps' => "Habilitar mapa de docentes",
    
    //js alerts
    'membersmap:map:1' => "Por favor entre una ubicación por defecto valida en la sección de administración",
    'membersmap:map:2' => "La dirección de la búsqueda no es valida",
    'membersmap:map:3' => "Geocode no fue satiscafactorio por la siguiente razón",
    
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

add_translation("es", $spanish);
