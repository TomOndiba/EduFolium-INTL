<?php
/**
 * Members index
 *
 */

$num_members = get_number_users();

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
					<div id="ib_butMap" style="display:none">
						<a href="/intl/membersmap">
							<span>
								<img src="/intl/_graphics/map.png">
							</span>
						</a>
					</div>
				</div>
				<br>
			<script>
				$("document").ready(function(){
						$("#ib_butMap").show("fast",function(){
							$("#ib_butActivity").show("fast",function(){
								$("#ib_butGroup").show("fast");
							});
						});
					$(".elgg-menu-item-ibpals-connect").addClass("active");
	  
				});
			</script>	
				';

$title = elgg_echo('members');

$options = array('type' => 'user', 'full_view' => false);
switch ($vars['page']) {
	case 'popular':
		$options['relationship'] = 'friend';
		$options['inverse_relationship'] = false;
		$content = elgg_list_entities_from_relationship_count($options);
		break;
	case 'online':
		$content = get_online_users();
		break;
	case 'newest':
	default:
		$content = elgg_list_entities($options);
		break;
}

$params = array(
	'content' => $content,
	'sidebar' => elgg_view('members/sidebar'),
	'title' => $title . " ($num_members)",
	//'title' => $connect_menu.$title . " ($num_members)",
	'filter_override' => elgg_view('members/nav', array('selected' => $vars['page'])),
);

$body = elgg_view_layout('content', $params);

echo elgg_view_page($title, $body);
