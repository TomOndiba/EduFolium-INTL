<?php
/**
 * Show map based on search of members by name and nearby users
 *
 * @package MembersMap
 */
?>

<?php
    // access check for closed groups
    group_gatekeeper();

    $users = $vars['user'];
    $usersfound = $vars['usersfound'];
    $mapwidth = $vars['mapwidth'];
    $mapheight = $vars['mapheight'];
    $defaultlocation = $vars['defaultlocation'];
    $defaultzoom = $vars['defaultzoom'];
    $radius = $vars['radius'];
    $name = $vars['name'];
    $defaultcoords = $vars['defaultcoords'];
    $clustering = $vars['clustering'];

    // load google maps js
    elgg_load_js('basicjs');
    elgg_load_js('placeholderjs');
    elgg_load_js('gmap1');
    elgg_load_js('gmap2');
    elgg_load_js('gmap3');
    elgg_load_js('gmap4');
?>

<script type="text/javascript"><!--
    $(document).ready(function(){

        infowindow = new google.maps.InfoWindow();
        var myLatlng = new google.maps.LatLng('.$defaultcoords.');
        var mapOptions = {
            zoom: <?php echo $defaultzoom;?>,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        var markerBounds = new google.maps.LatLngBounds();
        var geocoder = new google.maps.Geocoder();

        var radius = '<?php echo $radius;?>';
        if (isNaN(radius)) radius = 30000; // set default radius

        var showradius = document.getElementById('showradius');
        showradius.checked = true;    // by default show radius 

        showusersfound(geocoder, radius, showradius, markerBounds, map, 1);
    });

    var www1;
    var www2;

    // search area
    function codeAddress(givenaddr) {
        codeAddressExtend(givenaddr,<?php echo $defaultzoom;?>,'<?php echo elgg_get_site_url();?>','<?php echo $defaultlocation;?>','<?php echo elgg_echo("membersmap:map:2");?>', 1);
    }
    
    function showusersfound(geocoder, radius, showradius, markerBounds, map, showradius) {
<?php
    foreach ($usersfound as $u)  {
        if (!isset($u->location) || !$u->location) {
            //do nothing
        }
        else    {
            if ($u->getLatitude() && $u->getLongitude())  {
                // remove single and double quotes from username
                $namecleared = str_replace("'", "&#39;", $u->name);
                $namecleared = str_replace('"', "&quot;", $namecleared);                
                
?> 
                var myLatlng = new google.maps.LatLng(<?php echo $u->getLatitude();?>,<?php echo $u->getLongitude();?>);
                map.setCenter(myLatlng);
                var marker = new google.maps.Marker({
                  map: map,
                  position: myLatlng,
                  icon: '<?php echo elgg_get_site_url();?>mod/membersmap/graphics/members.png'
                });
                markerBounds.extend(myLatlng);
                map.fitBounds(markerBounds);
                //map.setZoom(defaultzoom); 
                
                www1 = <?php echo $u->getLatitude();?>;
                www2 = <?php echo $u->getLongitude();?>;

                google.maps.event.addListener(marker, 'click', function() {
                  infowindow.setContent('<?php echo '<img src="'.$u->getIconURL('tiny').'" alt="'.$namecleared.'" style="float:left; margin: 6px 4px 0 0;border-radius: 3px 3px 3px 3px;" />  <a href="'.elgg_get_site_url().'profile/'.$u->username.'">'.$namecleared.'</a><br />'.$u->location.'<br/>'.$u->briefdescription;?>');
                  infowindow.open(map, this);
                });           

                if (showradius==1) {   // show circle only at search "members by name" section
                    // Add a Circle overlay to the map.
                    var circle = new google.maps.Circle({
                      map: map,
                      radius: parseInt(radius),
                      fillColor: 'yellow',
                      fillOpacity: 0.15
                    });
                    // Bind circle and marker
                    circle.bindTo('center', marker, 'position');
                }

                codeMember('<?php echo $u->location;?>', map, geocoder, radius, showradius, markerBounds);
<?php
            }
        }
    }
?> 
    } // end of showusersfound
    
    function showusers(geocoder, radius, showradius, markerBounds, map) {
        var ddd;
        var markers = [];
<?php
    foreach ($users as $u)  {
        if (!isset($u->location) || !$u->location) {
            //do nothing
        }
        else    {
            if ($u->getLatitude() && $u->getLongitude())  {
                // remove single and double quotes from username
                $namecleared = str_replace("'", "&#39;", $u->name);
                $namecleared = str_replace('"', "&quot;", $namecleared);                 
?> 
                if (radius>=0) ddd = calcDistance(www1, www2, <?php echo $u->getLatitude();?>, <?php echo $u->getLongitude();?>);
                if (ddd <= radius || radius<0)   {
                    var myLatlng = new google.maps.LatLng(<?php echo $u->getLatitude();?>,<?php echo $u->getLongitude();?>);
                    var marker = new google.maps.Marker({
                        map: map,
                        position: myLatlng,
                        title: '<?php echo $namecleared;?>',
                        icon: '<?php echo elgg_get_site_url();?>mod/membersmap/graphics/smiley.png'
                    });                
                    google.maps.event.addListener(marker, 'click', function() {
                      infowindow.setContent('<?php echo '<img src="'.$u->getIconURL('tiny').'" alt="'.$namecleared.'" style="float:left; margin: 6px 4px 0 0;border-radius: 3px 3px 3px 3px;" />  <a href="'.elgg_get_site_url().'profile/'.$u->username.'">'.$namecleared.'</a><br />'.$u->location.'<br/>'.$u->briefdescription;?>');
                      infowindow.open(map, this);
                    });  
                    markers.push(marker);

                    if (!showradius.checked)    {
                        markerBounds.extend(myLatlng);
                        map.fitBounds(markerBounds);                    
                    } 
                } 
<?php
            }
        }
    }
        
    if ($clustering)    {
?> 
        var markerCluster = new MarkerClusterer(map, markers);
<?php
    }
?> 
        
        //set map to default zoom
        var listener = google.maps.event.addListener(map, "idle", function() { 
            
          if (map.getZoom() > <?php echo $defaultzoom;?>) map.setZoom(<?php echo $defaultzoom;?>); 
          google.maps.event.removeListener(listener); 
        });
    } // end of showusers   
  
//--></script>

<div id="map" style="width:<?php echo $mapwidth; ?>; height:<?php echo $mapheight; ?>;"></div>

<div id="parent">
    <img src="<?php echo elgg_get_site_url();?>mod/membersmap/graphics/members.png" width="32" height="37" alt="<?php echo elgg_echo('membersmap:search:usersfound'); ?>"/>
    <span><?php echo elgg_echo('membersmap:search:usersfound'); ?></span>
</div>
<div id="parent">
    <img src="<?php echo elgg_get_site_url();?>mod/membersmap/graphics/smiley.png" width="32" height="37" alt="<?php echo elgg_echo('membersmap:search:around', array($name)); ?>"/>
    <span><?php echo elgg_echo('membersmap:search:around', array($name)); ?></span>
</div>

