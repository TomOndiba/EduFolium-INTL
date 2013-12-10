<?php
/**
 * Elgg edujobs plugin
 * @package EduFolium
 */

$object = $vars['item']->getObjectEntity();
$excerpt = elgg_get_excerpt($object->description);

if ($object->cvport_type == 'edujobs:cv:portfolio:link')	{
	$file .= '<p>'.elgg_view('output/url', array(
		'name' => 'portfolio_link',
		'text' => elgg_echo($object->cvport_link),
		'href' => $object->cvport_link,
		'target' => '_blank',
	)).'</p>';	
}
else if ($object->cvport_type == 'edujobs:cv:portfolio:file')	{
	$file = elgg_view('output/url', array(
		'name' => 'portfolio_file',
		'text' => elgg_echo('edujobs:cv:download:portfile'),
		'href' => 'edujobs/teachers/download/'.$object->guid,
		'target' => '_blank',
	));
}

echo elgg_view('river/elements/layout', array(
	'item' => $vars['item'],
	'message' => $file,
	'attachments' => elgg_view('output/url', array('href' => $cuser->address)),
));
