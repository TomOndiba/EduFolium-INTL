<?php
/**
 * Map of all members
 *
 * @package MembersMap
 */

elgg_load_library('elgg:membersmap');
elgg_load_library('elgg:membersmapgeocoder');

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


elgg_push_breadcrumb(elgg_echo('membersmap'), "membersmap/all");

$connect_menu = '
				<div id="ib_butsNavigate" style="margin-top: -10px; margin-bottom: -10px;">				
					<div id="ib_butGroup"  style="display:none">
						<a href="/intl/groups">
							<span><img src="/intl/_graphics/group.png"></span>
						</a>
					</div>
					<div id="ib_butActivity" style="display:none">
						<a href="/intl/activity" >
							<span>
								<img src="/intl/_graphics/activity.png">
							</span>
						</a>
					</div>
					<div id="ib_butMember" style="display:none">
						<a href="/intl/members">
							<span>
								<img src="/intl/_graphics/member.png">
							</span>
						</a>
					</div>						
				</div>
				<br>
			<script>
				$("document").ready(function(){
					$("#ib_butMember").show("fast",function(){
							$("#ib_butActivity").show("fast",function(){
								$("#ib_butGroup").show("fast");
							});
					});					

					$(".elgg-menu-item-ibpals-connect").addClass("active");
				});
			</script>	
				';

$title = elgg_echo('membersmap:all');

$options = array('type' => 'user', 'full_view' => false);
switch ($vars['page']) {
	case 'friends':
            elgg_push_breadcrumb(elgg_echo('membersmap:label:friends'));
            $title = elgg_echo('membersmap:label:friends');
            $options['relationship'] = 'friend';
            $options['relationship_guid'] = elgg_get_logged_in_user_guid();
            $options['types'] = 'user';
            $options['inverse_relationship'] = false;
            $options['limit'] = 0;
            $users = elgg_get_entities_from_relationship($options);
            break;
	case 'online':
            elgg_push_breadcrumb(elgg_echo('membersmap:label:online'));
            $title = elgg_echo('membersmap:label:online');
            $users = get_online_users_map();
            break;
	case 'group':
            $group = elgg_get_page_owner_entity();
            elgg_push_breadcrumb($group->name.elgg_echo('membersmap:membersof'));
            $title = elgg_echo($group->name.elgg_echo('membersmap:membersof'));
            $options = array('type' => 'user', 'full_view' => false);
            $options['relationship'] = 'member';
            $options['relationship_guid'] = $group->guid;
            $options['types'] = 'user';
            $options['inverse_relationship'] = true;
            $options['limit'] = 0;
            $users = elgg_get_entities_from_relationship($options);
            break;        
	default:
            $title = elgg_echo('membersmap:allmembers');
            $options['types'] = 'user';
            $options['limit'] = 0;
            $users = elgg_get_entities($options);
            break;
}
 
$content = elgg_view('maps/allusers', array(
    'user'=>$users,
    'mapwidth'=>$mapwidth,
    'mapheight'=>$mapheight,
    'defaultlocation'=>$defaultlocation,
    'defaultzoom'=>$mapzoom,
    'defaultcoords'=>$defaultcoords,
    'clustering'=>$clustering
    )
);

$params = array(
	'content' => $content,
	'sidebar' => elgg_view('membersmap/sidebar'),
	//'title' => $connect_menu.$title,
	'title' => $title,
	'filter_override' => elgg_view('maps/nav', array('selected' => $vars['page'])),
);

$body = elgg_view_layout('content', $params);

echo elgg_view_page($title, $body);




