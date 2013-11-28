<?php

$entity = elgg_extract('entity', $vars, false);
$full = elgg_extract('full_view', $vars, false);

if (!$entity) {
    return true;
}

$form = hj_framework_get_data_pattern('object', 'hjlanguage');
$fields = $form->getFields();

$languages = $entity->language;
if (!is_array($languages)) {
    $languages = array($languages);
}

foreach ($languages as $tag) {
    $url = elgg_get_site_url() . 'search?q=' . urlencode($tag) . "&search_type=tags";
    if (is_string($tag)) {
	$title .= '<li>';
	$title .= elgg_view('output/url', array('href' => $url, 'text' => $tag, 'icon' => 'hj hj-icon-world'));
	$title .= '</li>';
    }
}
$title = elgg_view_icon('hj hj-icon-world') . '<span class="hj-icon-text"><ul>' . $title . '</ul></span>';

$params = elgg_clean_vars($vars);
$params = hj_framework_extract_params_from_entity($entity, $params);

$params['target'] = "elgg-object-$entity->guid";

$subtitle = "$entity->proficiency";
$short_description = elgg_get_excerpt($entity->description);

$header_menu = elgg_view_menu('hjentityhead', array(
    'entity' => $entity,
    'current_view' => true,
    'has_full_view' => false,
    'class' => 'elgg-menu-hz hj-menu-hz',
    'sort_by' => 'priority',
    'params' => $params
	));

$footer_menu = elgg_view_menu('hjentityfoot', array(
    'entity' => $entity,
    'current_view' => true,
    'has_full_view' => false,
    'class' => 'elgg-menu-hz hj-menu-hz',
    'sort_by' => 'priority',
    'params' => $params,
	));

$params = array(
    'entity' => $entity,
    'title' => "$title",
    'metadata' => $header_menu,
    'subtitle' => $subtitle,
    'content' => $short_description . $footer_menu . $full_description,
    'class' => 'hj-portfolio-widget'
);

$params = $params + $vars;
$list_body = elgg_view('object/elements/summary', $params);

echo elgg_view_image_block(NULL, $list_body);