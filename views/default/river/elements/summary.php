<?php
/**
 * Short summary of the action that occurred
 *
 * @vars['item'] ElggRiverItem
 */

$item = $vars['item'];

$subject = $item->getSubjectEntity();
$object = $item->getObjectEntity();
$target = $object->getContainerEntity();

$subject_link = elgg_view('output/url', array(
	'href' => $subject->getURL(),
	'text' => $subject->name,
	'class' => 'elgg-river-subject',
	'is_trusted' => true,
));

$object_link = elgg_view('output/url', array(
	'href' => $object->getURL(),
	'text' => $object->title ? $object->title : $object->name,
	'class' => 'elgg-river-object',
	'is_trusted' => true,
));

$action = $item->action_type;
$type = $item->type;
$subtype = $item->subtype ? $item->subtype : 'default';

$container = $object->getContainerEntity();
if ($container instanceof ElggGroup) {
	$params = array(
		'href' => $container->getURL(),
		'text' => $container->name,
		'is_trusted' => true,
	);
	$group_link = elgg_view('output/url', $params);
	$group_string = elgg_echo('river:ingroup', array($group_link));
}

// check summary translation keys.
// will use the $type:$subtype if that's defined, otherwise just uses $type:default
$key = "river:$action:$type:$subtype";
$summary = elgg_echo($key, array($subject_link, $object_link));

if ($summary == $key) {
	$key = "river:$action:$type:default";
	$summary = elgg_echo($key, array($subject_link, $object_link));
}
//http://edufolium.com/intl/mod/edujobs/assets/flags/Colombia.png
//<img src="smiley.gif" alt="Smiley face" height="42" width="42">

if($subject->country)
{
if($subject->country!='Seleccione su País')
 	$country = str_replace(" ", "_", $subject->country);
	$flag= "<img style='margin-right:5px' width='20' height='12' alt='N/A' src='http://edufolium.com/intl/mod/edujobs/assets/flags/".$country.".png' >";
}

echo $flag.$summary;