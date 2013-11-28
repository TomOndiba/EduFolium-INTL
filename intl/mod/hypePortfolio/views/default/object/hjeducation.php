<?php

$entity = elgg_extract('entity', $vars, false);
$full = elgg_extract('full_view', $vars, false);

if (!$entity) {
    return true;
}

$form = hj_framework_get_data_pattern('object', 'hjeducation');
$fields = $form->getFields();

$owner = $entity->getOwnerEntity();

// Short View of the Entity
$title = $entity->title;
$fieldofstudy = $entity->fieldofstudy;
if (is_array($fieldofstudy)) {
    $fieldofstudy = implode(', ', $fieldofstudy);
}

if (!empty($fieldofstudy)) {
    $title = "$title, $fieldofstudy";
}

$subtitle = "$entity->schoolname <br />";

if ($entity->startdate !== '') {
    $subtitle .= "$entity->startdate";
    if ($entity->enddate !== '') {
        $subtitle .= " - $entity->enddate";
    }
}

$params = elgg_clean_vars($vars);
$params = hj_framework_extract_params_from_entity($entity, $params);

if (!$full || (elgg_is_xhr() && !elgg_in_context('fancybox'))) {
    $short_description = elgg_get_excerpt($entity->description);
} else {
    $full_description = elgg_view('page/components/hj/fieldtable', $params);
}

$params['target'] = "elgg-object-$entity->guid";

$header_menu = elgg_view_menu('hjentityhead', array(
    'entity' => $entity,
    'current_view' => $full,
    'class' => 'elgg-menu-hz hj-menu-hz',
    'sort_by' => 'priority',
    'params' => $params
        ));

$footer_menu = elgg_view_menu('hjentityfoot', array(
    'entity' => $entity,
    'current_view' => $full,
    'class' => 'elgg-menu-hz hj-menu-hz',
    'sort_by' => 'priority',
    'params' => $params,
        ));

$params = array(
    'entity' => $entity,
    'title' => $title,
    'metadata' => $header_menu,
    'subtitle' => $subtitle,
    'content' => $short_description . $footer_menu . $full_description,
    'class' => 'hj-portfolio-widget'
);

$params = $params + $vars;
$list_body = elgg_view('object/elements/summary', $params);

echo elgg_view_image_block(NULL, $list_body);