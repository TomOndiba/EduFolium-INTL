<?php
/**
 * Elgg edujobs plugin
 * @package EduFolium
 */

elgg_load_library('elgg:edujobs');

elgg_pop_breadcrumb();
elgg_push_breadcrumb(elgg_echo('edujobs'), 'edujobs/jobs'); 
elgg_push_breadcrumb(elgg_echo('jobsext'));

$selected = $page[0].'/'.$page[1];

// get current url without parameters
$current_url = explode("?", current_page_url());

$limit = max ((int) get_input ("limit", 10), 0);
$offset = sanitise_int (get_input ("offset", 0), false);

// build sort by combo box
$orderby = get_input('orderby');
$orderby_reverse = false; // default order by most recent date posted
if ($orderby === 'datepostedlatest') $orderby_reverse = true;

$search_options = array();
$sidebar_options = array();
$url_params = '';

$options = array(
	'type' => 'object',
	'subtype' => 'edujobsext',
	'limit' => 10,
	'full_view' => false,
	'view_toggle_type' => false ,
	'reverse_order_by' => $orderby_reverse,
	'created_time_lower' => time() - EXTERNAL_JOBS_TIME_PUBLISHED // retrieve jobs created last ... days (see start.php)
);

if (get_input("searchformsubmitted"))	{
	$country = get_input("country");
	$city = get_input("city");
	$jobposts = get_input("jobposts");
	$tags = get_input("tags");
	
	$url_params .= '&searchformsubmitted=1';
	if ($country) {
		$country_frm = array('name' => 'country','value' => $country, 'operand' => '=');
		array_push($search_options,$country_frm);
		$sidebar_options[country] = $country;
		$url_params .= '&country='.$country;
	}
	if ($city) {
		//$city_frm = array('name' => 'location','value' => '%'.$city.'%', 'operand' => 'like');
		$city_frm = array('name' => 'localt','value' => '%'.$city.'%', 'operand' => ' like ');
		array_push($search_options,$city_frm);
		$sidebar_options[city] = $city;
		$url_params .= '&city='.$city;
	}

	if ($jobposts) {
		$diff = time() - $jobposts;
		$options['wheres'] = elgg_get_entity_time_where_sql('e', time(),$diff);
		$sidebar_options[jobposts] = $jobposts;
		$url_params .= '&jobposts='.$jobposts;
	}

	if ($tags) {
		$tags_frm = array('name' => 'tags','value' => $tags, 'operand' => ' like ');
		array_push($search_options,$tags_frm);
		$sidebar_options[tags] = $tags;
		$url_params .= '&tags='.$tags;
	}

}
else if (elgg_is_logged_in())	{
	$user = elgg_get_logged_in_user_entity();
	
	$country = $user->country;
	if ($country && $country!='Seleccione su País') { // this value exists on edit profile select country (default)
		$country_frm = array('name' => 'country','value' => $country, 'operand' => '=');
		array_push($search_options,$country_frm);
		$sidebar_options[country] = $country;
		$url_params .= '&country='.$country;
	}	
}

$total_res = 0;
if($search_options){  // in case of sidebar form submitted
	$options['metadata_name_value_pairs'] = $search_options;
	$options['metadata_name_value_pairs_operator'] = 'AND';
	//$content = elgg_list_entities_from_metadata($options);
	$content = elgg_list_entities_from_metadata($options);
	
	$options['count'] = true;
	$total_res = elgg_get_entities_from_metadata($options);	
}
else {
	$content = elgg_list_entities($options);
	
	$options['count'] = true;
	$total_res = elgg_get_entities($options);	
}

if (!$content) {
	$content = elgg_echo('jobsext:none');
} 
else
{
	$content = '<div style="float:left">'.elgg_echo('edujobs:jobsexternal:resultsno').$total_res.'</div>'.$content;
}


$sidebar_options['curl'] = 'edujobs/teachers/extjobs';
 
$title = elgg_echo('jobsext');
$sortby = get_sort_by_selector_external($current_url[0].'?'.$url_params, $orderby, true);
$content = $sortby . $content;

$body = elgg_view_layout('content', array(
	'filter_context' => 'all',
	'content' => $content,
	'title' => $title,
	'sidebar' => elgg_view('edujobs/jobs_sidebar_external', $sidebar_options),
	'filter_override' => elgg_view('edujobs/nav-teacher', array('selected' => $selected)),
	//'baseurl' => 'skata',
	
));

echo elgg_view_page($title, $body);







