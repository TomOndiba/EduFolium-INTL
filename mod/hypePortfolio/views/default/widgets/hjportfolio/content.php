<?php

/**
 * View Portfolio Widget Contents
 *
 * @package hypeJunction
 * @subpackage hypePortfolio
 * @category Portfolio
 * @category Widgets
 * @category Views
 *
 * @uses hjPortfolio
 *
 * @return string HTML
 */
$widget = elgg_extract('entity', $vars, false);

if (!$widget) {
	return true;
}

$segment = $widget->getContainerEntity();
$section = $vars['entity']->section;

if (!$limit = $vars['entity']->num_display)
	$limit = 10;

$content = $segment->getSectionContent($section, array(
	'widget' => $widget,
	'segment' => $segment,
	'limit' => $limit));

$content_count = $segment->getSectionContent($section, array(
	'widget' => $widget,
	'segment' => $segment,
	'count' => true
		));

$target = "hj-list-$segment->guid-$widget->guid-$section";

$data_options = array(
	'type' => 'object',
	'subtype' => $section,
	'metadata_name' => 'widget',
	'metadata_value' => $widget->guid
);

$view_params = array(
	'full_view' => false,
	'list_id' => $target,
	'list_class' => 'hj-view-list',
	'item_class' => 'hj-view-entity elgg-state-draggable',
	'pagination' => true,
	'data-options' => htmlentities(json_encode($data_options), ENT_QUOTES, 'UTF-8'),
	'limit' => $limit,
	'count' => $content_count,
	'base_url' => 'hj/sync/priority'
);

$content = elgg_view_entity_list($content, $view_params);

unset($view_params['data-options']);
$form = hj_framework_get_data_pattern('object', $section);

$params = array(
	'subtype' => $section,
	'form_guid' => $form->guid,
	'container_guid' => $segment->container_guid,
	'segment_guid' => $segment->guid,
	'widget_guid' => $widget->guid,
	'context' => 'portfolio',
	'handler' => 'hjportfolio',
	'target' => $target
);

$params = array_merge($view_params, $params);
$params = hj_framework_extract_params_from_params($params);

$footer_menu = elgg_view_menu('hjsectionfoot', array(
	'handler' => 'hjsection',
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz hj-menu-hz',
	'params' => $params
		));

echo $content;
echo $footer_menu;