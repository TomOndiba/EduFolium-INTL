<?php
/**
 * Show map based on search of all members
 *
 * @package MembersMap
 */
?>

<?php
    // access check for closed groups
    group_gatekeeper();

    $users = $vars['user'];
    $mapwidth = $vars['mapwidth'];
    $mapheight = $vars['mapheight'];
    $defaultlocation = $vars['defaultlocation'];
    $defaultzoom = $vars['defaultzoom'];
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
            
            showusers(geocoder, -1, 0, markerBounds, map, 0, 0);   
    });

    // search area
    function codeAddress(givenaddr) {
        codeAddressExtend(givenaddr,<?php echo $defaultzoom;?>,'<?php echo elgg_get_site_url();?>','<?php echo $defaultlocation;?>','<?php echo elgg_echo("membersmap:map:2");?>', 0);
    } 


    function showusers(geocoder, radius, showradius, markerBounds, map, www1, www2) {
        var ddd;
        var markers = [];
        
        //alert(www1+','+www2);
<?php
    $cont = 0;
    foreach ($users as $u)  {
    $cont++;
    if ($cont < 5000)
    {
        if (!isset($u->location) || !$u->location) {
            //do nothing
        }
        else    {
            // function below is required when users saved location before enable members map plugin
            if (!$u->getLatitude() || !$u->getLongitude())  {
                $ccc = save_user_coords($u->location, $u);
            }
            
            if ($u->getLatitude() && $u->getLongitude())  {
                // remove single and double quotes from username
                $namecleared = str_replace("'", "&#39;", $u->name);
                $namecleared = str_replace('"', "&quot;", $namecleared);

                //$bfcleared = trim(strip_tags($u->briefdescription));
                $bfcleared = preg_replace('/[^(\x20-\x7F)]*/','', $u->briefdescription);
				$bfcleared = str_replace("'", "&#39;", $bfcleared);
				$bfcleared = str_replace('"', "&quot;", $bfcleared);
?> 
                if (radius>=0) ddd = calcDistance(www1, www2, <?php echo $u->getLatitude();?>, <?php echo $u->getLongitude();?>);
                if (ddd <= radius || radius<0)   {
                    
					var tmpinfowindow1 ='<?php echo 'Cont:'.$cont ?>';
					var tmpinfowindow2 ='<?php echo 'IconURL:'.$u->getIconURL('tiny').'" \n alt="'.$namecleared ?>';
					var tmpinfowindow3 ='<?php echo 'href="'.elgg_get_site_url() ?>'; 
					var tmpinfowindow4 ='<?php echo 'profile/'.$u->username ?>'; 
					var tmpinfowindow5 ='<?php echo 'namecleared:'.$namecleared ?>';
					var tmpinfowindow6 ='<?php echo 'location:'.$u->location ?>';
					var tmpinfowindow7 ='<?php echo 'briefdescription:'.$bfcleared ?>';

                    var myLatlng = new google.maps.LatLng(<?php echo $u->getLatitude();?>,<?php echo $u->getLongitude();?>);
                    var marker = new google.maps.Marker({
                        map: map,
                        position: myLatlng,
                        title: '<?php echo $namecleared;?>',
                        icon: '<?php echo elgg_get_site_url();?>mod/membersmap/graphics/smiley.png'
                    });                
                    google.maps.event.addListener(marker, 'click', function() {
                      infowindow.setContent('<?php echo '<img src="'.$u->getIconURL('tiny').'" alt="'.$namecleared.'" style="float:left; margin: 6px 4px 0 0;border-radius: 3px 3px 3px 3px;" />  <a href="'.elgg_get_site_url().'profile/'.$u->username.'">'.$namecleared.'</a><br />'.$u->location.'<br/>'.$bfcleared;?>');
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
    }
    
    if ($clustering)    {
?> 
        var markerCluster = new MarkerClusterer(map, markers);
<?php
    }
?>        
    } // end of showusers
  
  //--></script>

<div id="map" style="width:<?php echo $mapwidth; ?>; height:<?php echo $mapheight; ?>;"></div>



