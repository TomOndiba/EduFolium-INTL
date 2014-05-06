<?php
/**
 * Elgg edujobs plugin
 * @package EduFolium
 */

global $CONFIG;

elgg_load_js('edujobsjs');
elgg_load_library('elgg:edujobs');

$full = elgg_extract('full_view', $vars, FALSE);
$jobs = elgg_extract('entity', $vars, FALSE);

$user = elgg_get_logged_in_user_entity();

// set the default timezone to use
date_default_timezone_set('UTC');

if (!$jobs) { 
    return;
}

$owner = $jobs->getOwnerEntity();
$owner_icon = elgg_view_entity_icon($owner, 'small');

$owner_link = elgg_view('output/url', array(
	'href' => "edujobs/owner/$owner->username",
	'text' => $owner->name,
	'is_trusted' => true,
));
$author_text = elgg_echo('byline', array($owner_link));

$date = elgg_view_friendly_time($jobs->time_created);
$metadata = elgg_view_menu('entity', array(
	'entity' => $vars['entity'],
	'handler' => 'edujobsext/job',
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz',
));

// comments is empty except if it change
$comments_link = '';

//$subtitle = "$author_text $date $comments_link";
$subtitle = "$author_text $comments_link";

//get flag
$flag = get_country_flag($jobs->country);

$sharethis = '<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style" style="margin-top:10px;float: right;width: 150px;">
<a class="addthis_button_facebook"></a>
<a class="addthis_button_twitter"></a>
<a class="addthis_button_pinterest_share"></a>
<a class="addthis_button_google_plusone_share"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51df54285c67c5b3"></script>
<!-- AddThis Button END -->';

$sharethis = "";

$location = '';
if ($jobs->location) $location .= $jobs->location;
if ($jobs->country) $location .= ', ' . $jobs->country;
if ($flag) $location .= '&nbsp;<img src="'.elgg_get_site_url().'mod/edujobs/assets/flags/'.$flag.'" width="20" height="12" alt="'.$jobs->country.'" />';

/// build content //
$content = '';
//$content .= '<h3>'.$jobs->title.'</h3>';

if ($jobs->description)	{
	$content .= '<div class="job-external">';
	$content .= $jobs->description;
	$content .= '</div>';
}

if ($jobs->source)	{
	$external_link = elgg_view('output/url', array(
			'href' => $jobs->link,
			'text' => elgg_echo('edujobs:label:jobsexternal:clicktoapply'),
			'is_trusted' => true,
			'class' => 'elgg-button elgg-button-submit',
			'target' => '_blank',
			'onclick' => "_gaq.push(['_trackEvent','Ext-Jobs','".$jobs->country."','Source']);",
	));
	$content .= '<div class="job-side-external">';
	$content .= $external_link;
	$content .= '</div>';
}

$content .= '<div class="job-footer-external">';
if ($location) $content .= $location;
if ($jobs->company) $content .= ' | '. $jobs->company;
$content .= ' | '.elgg_echo('edujobs:label:jobsexternal:published').date(DATE_FORMAT, $jobs->time_created);

$content .= '</div>';
/////////////////////////////    


if ($full && !elgg_in_context('gallery')) {
    $params = array(
		'entity' => $jobs,
		'title' => false,
		//'metadata' => $metadata, // we need it if we want edit/delete access by admin
		'subtitle' => $subtitle,
    );
    $params = $params + $vars;
    $summary = elgg_view('object/elements/summary', $params);

    $body = $content;
       
    echo elgg_view('object/elements/full', array(
		'entity' => $jobs,
		'icon' => $owner_icon,
		'summary' => $summary,
		'body' => $body,
    ));

} 
else {
	// brief view

if ($jobs->canEdit()) {
	$ts = time();
	$token = generate_action_token($ts);		
	$del_button .= '<div style="float:right;">'.elgg_view('output/url', array(
		'href' => 'action/edujobsext/job/delete?guid='.$jobs->guid,
		'text' => '<span class="elgg-icon elgg-icon-delete "></span>',
		'class' => 'elgg-requires-confirmation',
		'rel' => 'Are you sure you want to delete this item?',
		'is_action' => true
	)).'</div>';	
	
	$content = $del_button.$content;
}
	
	$job_title = elgg_view('output/url', array(
			'href' => edujobsext_url($jobs),
			'text' => $jobs->title,
			'is_trusted' => true,
	));
	$content = '<h3>'.$job_title.'</h3>'.$content;

	echo elgg_view_image_block($owner_icon, $content);
}

