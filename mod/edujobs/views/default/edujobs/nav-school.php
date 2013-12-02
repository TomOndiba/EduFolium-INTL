<?php
/**
 * Elgg edujobs plugin
 * @package EduFolium
 */

$tabs = array(
		'teachers' => array(
				'title' => elgg_echo('edujobs:label:teachers'),
				'url' => 'edujobs/teachers/view',
				'selected' => $vars['selected'] == 'teachers/view',
		),    
		'myjobposts' => array(
				'title' => elgg_echo('edujobs:label:myjobposts'),
				'url' => 'edujobs/schools/myjobposts',
				'selected' => $vars['selected'] == 'schools/myjobposts',
		),          
/*
		'jobs' => array(
				'title' => elgg_echo('edujobs:label:jobs'),
				'url' => 'edujobs/jobs',
				'selected' => $vars['selected'] == 'jobs',
		),
*/		
);

echo elgg_view('navigation/tabs', array('tabs' => $tabs));
