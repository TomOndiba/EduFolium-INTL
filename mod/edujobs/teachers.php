<?php
/**
 * Elgg membersmap helper functions
 *
 * @package MembersMap
 */

// Get engine
require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
elgg_load_library('elgg:edujobs');

admin_gatekeeper();

$options = array('type' => 'user', 'full_view' => false, 'limit' => 0);
$users = elgg_get_entities($options);

//if ($users)  {
	//echo '<h4>Total Users: '.count($users).'</h4>';
//}

foreach ($users as $u)  {
	if ($u->custom_profile_type == DOCENTE_PROFILE_TYPE_GUID)	{
		$link = elgg_view('output/url', array(
			'href' => elgg_get_site_url().'profile/'.$u->username,
			'text' => $u->username,
			'is_trusted' => true,
		));		
		if (check_if_user_has_cv($u)) echo $link.' - '.$u->email.' - CV: YES<br />';
		else echo $link.' - '.$u->email.' - CV: NO<br />';
	}
}

echo "<br />finished";
