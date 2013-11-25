<?php

$entity = elgg_extract('entity', $vars, false);
$full = elgg_extract('full_view', $vars, false);

if (!$entity) {
    return true;
}

$form_guid = elgg_extract('form_guid', $vars);
$form = get_entity($form_guid);

if (elgg_instanceof($form, 'object', 'hjform')) {
    $fields = $form->getFields();
}

$file = get_entity($entity->fileupload);
$file_params = hj_framework_extract_params_from_entity($file);
$filefolder_guid = elgg_extract('container_guid', $file_params);
$filefolder = get_entity($filefolder_guid);

$title = $entity->title;

$filefolder = sprintf(elgg_echo('hj:framework:filefolder'), $filefolder->title);
$filename = sprintf(elgg_echo('hj:framework:filename'), $file->originalfilename);
$simpletype = sprintf(elgg_echo('hj:framework:simpletype'), $file->simpletype);
$filesize = sprintf(elgg_echo('hj:framework:filesize'), $file->filesize);

$type = $entity->Type;
$course = $entity->Course;
$syllabus = $entity->Syllabus;
$recommend = $entity->Recommend;
$programme = $entity->Programme;

//$subtitle = " $entity->Course $filefolder <br />$filename  <br />$simpletype <br />$filesize";

$subtitle = "<b>".elgg_echo('hj:label:hjportfoliofile:Programme').":</b> ". $programme ."<br />";
$subtitle .= "<b>".elgg_echo('hj:label:hjportfoliofile:Course').":</b> ". $course ."<br />";
$subtitle .= "<b>".elgg_echo('hj:label:hjportfoliofile:Syllabus').":</b> ". $syllabus."<br />";
$subtitle .= "<b>".elgg_echo('hj:label:hjportfoliofile:Type').":</b> ". $type."<br />";
$subtitle .= "<b>Recommendation:</b> ". $recommend."<br />";


$short_description = elgg_get_excerpt($entity->description);

$params = elgg_clean_vars($vars);
$params = hj_framework_extract_params_from_entity($entity, $params);
$params['fbox_x'] = '980';
$params['fbox_y'] = '800';
$params['target'] = "elgg-object-$entity->guid";

$header_menu = elgg_view_menu('hjentityhead', array(
    'entity' => $entity,
    'file_guid' => $file->guid,
    'handler' => 'hjfile',
    'class' => 'elgg-menu-hz hj-menu-hz',
    'sort_by' => 'priority',
    'params' => $params
	));

$footer_menu = elgg_view_menu('hjentityfoot', array(
    'entity' => $entity,
    'file_guid' => $file->guid,
    'handler' => 'hjfile',
    'class' => 'elgg-menu-hz hj-menu-hz',
    'sort_by' => 'priority',
    'params' => $params,
	));

if ($file->simpletype == 'image') {
    $preview_image = '<div class="hj-file-icon-preview hj-file-icon-master">' . elgg_view_entity_icon($file, 'master') . '</div>';
}
$full_description = $entity->description;

$params = array(
    'entity' => $entity,
    'title' => $title,
    'metadata' => $header_menu,
    'subtitle' => $subtitle,
    'tags' => false,
    'content' => $footer_menu
);

$params = $params + $vars;
$list_body = elgg_view('object/elements/summary', $params);
$icon = elgg_view_entity_icon($file, 'medium');

$col1 = elgg_view_image_block($icon, $list_body);

if (elgg_is_xhr() && elgg_in_context('fancybox')) {
    $col1 = $col1 . elgg_view_comments($entity);
    $col2 = $preview_image;
    echo elgg_view_layout('hj/dynamic', array('grid' => array(4, 8), 'content' => array($col1, $col2)));
} else {
    echo $col1;
}
