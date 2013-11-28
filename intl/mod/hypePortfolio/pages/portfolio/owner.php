<?php

/**
 * Renders a Portfolio page for a given user
 *
 * @package hypeJunction
 * @subpackage hypePortfolio
 * @category View
 *
 */
?>
<?php

// See if the user name was provided, if not forward user to own portfolio
$username = get_input('username');
if ($username) {
    $user = get_user_by_username($username);
} else {
    forward('portfolio/owner/' . elgg_get_logged_in_user_entity()->username);
}

// Load libraries if we can proceed
elgg_load_js('hj.framework.fieldcheck');

elgg_load_js('hj.framework.ajax');
elgg_load_js('hj.framework.tabs');
elgg_load_js('hj.portfolio.base');

elgg_load_css('hj.portfolio.base');
elgg_load_css('hj.framework.profile');

if ($user->canEdit()) {
    elgg_load_js('hj.framework.tabs.sortable');
}

$portfolio_guid = get_input('e');
$segment_guid = get_input('sg');

if (empty($portfolio_guid)) {
    $portfolios = hj_portfolio_find_user_portfolios($user);
    $portfolio = $portfolios[0];
} else {
    $portfolio = get_entity($portfolio_guid);
}

// If no portfolios were created, suggest the user to create one
// If viewing other person's page, forward to profile instead
if (!elgg_instanceof($portfolio) && !$user->canEdit()) {
    register_error(elgg_echo('hj:portfolio:noportfolio'));
    forward("profile/{$user->username}");
}

if (!elgg_instanceof($portfolio) && $user->canEdit()) {
    $portfolio = new ElggObject();
    $portfolio->subtype = 'hjportfolio';
    $portfolio->owner_guid = $user->guid;
    $portfolio->container_guid = $user->guid;
    $portfolio->access_id = ACCESS_PUBLIC;
    if ($portfolio->save()) {
        hj_framework_set_entity_priority($portfolio);
        system_message(elgg_echo('hj:portfolio:setup:success'));
    } else {
        register_error(elgg_echo('hj:portfolio:setup:error'));
        forward();
    }
}

$segments = hj_framework_get_entities_by_priority('object', 'hjsegment', $user->guid, $portfolio->guid);

if (!$sel = get_input('sg')) {
    $first_segment = $segments[0];
    $sel = $first_segment->guid;
}
$selected["$sel"] = true;

$context = elgg_get_context();

if (!empty($segments)) {
    foreach ($segments as $segment) {
        $params = array(
            'full_view' => true,
            'container_guid' => $portfolio->guid,
            'owner_guid' => $portfolio->owner_guid,
            'push_context' => $context,
            'target' => 'hj-ajax-tab-dump-portfolio',
			'source' => "hj-ajax-tab-load-{$segment->guid}"
        );
        $params = hj_framework_extract_params_from_entity($segment, $params);
        $data = hj_framework_json_query($params);

        $tabs[] = array(
            'title' => $segment->title,
            'id' => "hj-ajax-tab-load-{$segment->guid}",
            'class' => "hj-ajax-tab-load",
            'url' => "action/framework/entities/view?e=$segment->guid",
            'data-options' => $data,
            'url_class' => 'elgg-state-draggable',
            'selected' => $selected["$segment->guid"]
        );
    }
} else {
    $selected['new'] = true;
}

if ($user->canEdit()) {
    $form = hj_framework_get_data_pattern('object', 'hjsegment', 'hjportfolio');

    $params = array(
        'full_view' => true,
        'context' => $context,
        'form_guid' => $form->guid,
        'container_guid' => $portfolio->guid,
        'owner_guid' => $portfolio->owner_guid,
        'ajaxify' => false,
        'event' => 'create',
        'target' => 'hj-ajax-tab-dump-portfolio'

    );
    $params = hj_framework_extract_params_from_params($params);
    $data = hj_framework_json_query($params);

    $tabs[] = array(
        'title' => elgg_echo('hj:portfolio:addnew'),
        'id' => "hj-ajax-tab-load-new",
        'class' => 'hj-ajax-tab-load',
        'url' => "action/framework/entities/view?e=$form->guid",
        'data-options' => $data,
        'selected' => $selected['new']
    );
}

$ajax = <<<HTML
        <div id="hj-ajax-tab-dump-portfolio" class="hj-ajax-result hj-ajax-tabs-portfolio" style="display:none"></div>
HTML;


$share ='
			<div id="ib_butsNavigate" style="width:180px">
				<div id="edufolium_butchat" style="display:none">
					<a href="/intl/thewire/all">
						<span>
							<img src="/intl/_graphics/edufolium_microchat-icon.png">
						</span>
					</a>
				</div>					
				<div id="edufolium_butGallery" style="display:none">
					<a href="/intl/gallery/owner">
						<span>
							<img src="/intl/_graphics/edufolium-iconGallery.png">
						</span>
					</a>
				</div>
			</div>
			<script>			
				$("document").ready(function(){
							$("#edufolium_butGallery").show("fast",function(){
									$("#edufolium_butchat").show("fast")
									});
					});
					$(".elgg-menu-item-ibpals-share").addClass("active");					
			</script>				
		';

$sidebar = elgg_view('hj/portfolio/userdetails', array('entity' => $user));
$title = sprintf(elgg_echo('hj:portfolio:portfolios'), $user->name);

$title = $share.$title;

$module = '<div id="hj-sortable-tabs">' . elgg_view('navigation/tabs', array('tabs' => $tabs, 'id' => 'hj-sortable-tabs', 'class' => 'hj-ajax-tabs')) . '</div>';
$module .= $ajax;
$module = elgg_view_module('aside', $title, $module);

$content = elgg_view_layout('hj/profile', array(
    'content' => $module,
    'sidebar' => $sidebar,
        ));
$page = elgg_view_layout('one_column', array('content' => $content));

echo elgg_view_page($title, $page);