<?php
/**
 * Elgg edujobs plugin
 * @package EduFolium
 */

$object = $vars['item']->getObjectEntity();
$excerpt = elgg_get_excerpt($object->description);

$cuser = get_user($object->owner_guid);

echo elgg_view('river/elements/layout', array(
	'item' => $vars['item'],
	'message' => '',
	'attachments' => elgg_view('output/url', array('href' => $cuser->address)),
));
