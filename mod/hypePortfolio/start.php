<?php

/* hypePortfolio
 *
 * User Portfolio
 * @package hypeJunction
 * @subpackage hypePortfolio
 *
 * @author Ismayil Khayredinov <ismayil.khayredinov@gmail.com>
 * @copyright Copyrigh (c) 2011, Ismayil Khayredinov
 */

elgg_register_event_handler('init', 'system', 'hj_portfolio_init');

function hj_portfolio_init() {

    $plugin = 'hypePortfolio';

	// register group entities for search
	elgg_register_entity_type('hypePortfolio', '');	
    
    if (!elgg_is_active_plugin('hypeFramework')) {
        register_error(elgg_echo('hj:framework:disabled', array($plugin, $plugin)));
        disable_plugin($plugin);
    }
    
    $shortcuts = hj_framework_path_shortcuts($plugin);

    // Libraries
    elgg_register_library('hj:portfolio:base', $shortcuts['lib'] . 'portfolio/base.php');
    elgg_register_library('hj:portfolio:setup', $shortcuts['lib'] . 'portfolio/setup.php');
    
    // Load PHP library
    elgg_load_library('hj:portfolio:base');
    // Register pagehandlers for the portfolio
    elgg_register_entity_url_handler('object', 'hjportfolio', 'hj_portfolio_url_handler');
    elgg_register_page_handler('portfolio', 'hj_portfolio_page_handler');

// Portfolio items should only be viewed through a portfolio
    elgg_register_entity_url_handler('object', 'hjexperience', 'hj_portfolio_url_forwarder');
    elgg_register_entity_url_handler('object', 'hjeducation', 'hj_portfolio_url_forwarder');
    elgg_register_entity_url_handler('object', 'hjskill', 'hj_portfolio_url_forwarder');
    elgg_register_entity_url_handler('object', 'hjlanguage', 'hj_portfolio_url_forwarder');
    elgg_register_entity_url_handler('object', 'hjportfoliofile', 'hj_portfolio_url_forwarder');

// Register new profile menu item
    elgg_register_plugin_hook_handler('register', 'menu:owner_block', 'hj_portfolio_owner_block_menu');

    if (elgg_is_logged_in()) {
        elgg_register_menu_item('site', array(
            'name' => 'portfolio',
            'text' => elgg_echo('portfolio'),
            'href' => 'portfolio/owner/' . elgg_get_logged_in_user_entity()->username,
            'priority' => 300
        ));
    }

// Register new admin menu item
    elgg_register_admin_menu_item('administer', 'portfolio', 'hj', 200);

// Register CSS and JS
    $css_url = elgg_get_simplecache_url('css', 'hj/portfolio/base');
    elgg_register_css('hj.portfolio.base', $css_url);

    $js_url = elgg_get_simplecache_url('js', 'hj/portfolio/base');
    elgg_register_js('hj.portfolio.base', $js_url);
    
    // Allow writing to hjportfolio containers
    elgg_register_plugin_hook_handler('container_permissions_check', 'object', 'hj_portfolio_container_permissions_check');

    elgg_register_widget_type('hjportfolio', elgg_echo('hj:portfolio:widget'), elgg_echo('hj:portfolio:widgetdescription'), 'portfolio', true);
    elgg_register_plugin_hook_handler('hj:framework:widget:types', 'all', 'hj_portfolio_get_portfolio_section_types_hook');
    //Check if the initial setup has been performed, if not porform it
    if (!elgg_get_plugin_setting('hj:portfolio:setup')) {
        elgg_load_library('hj:portfolio:setup');
        if (hj_portfolio_setup())
            system_message('hypePortfolio was successfully configured');
    }
}

function hj_portfolio_url_handler($entity) {
    if ($user = $entity->getOwnerEntity())
        $username = $user->username;

    return "portfolio/owner/{$username}?e={$entity->guid}";
}

function hj_portfolio_url_forwarder($entity) {
    $segment = $entity->getContainerEntity();
    if (elgg_instanceof($segment, 'object', 'hjsegment')) {
        $portfolio = $segment->getContainerEntity();
    } else {
		$portfolio = $segment;
		$segment = get_entity($entity->segment);
	}
    if (elgg_instanceof($portfolio)) {
        $username = $portfolio->getOwnerEntity()->username;
    }
    return "portfolio/owner/{$username}/{$portfolio->guid}/{$segment->guid}/";
}

function hj_portfolio_page_handler($page) {
    $plugin = 'hypePortfolio';
    $shortcuts = hj_framework_path_shortcuts($plugin);
    $pages = $shortcuts['pages'] . 'portfolio/';

// Check if the username was provided in the url
// If no username specified, display logged in user's portfolio

    if (isset($page[1])) {
        set_input('username', $page[1]);
    } elseif (elgg_is_logged_in()) {
        set_input('username', elgg_get_logged_in_user_entity()->username);
    } else {
        return false;
    }

    switch ($page[0]) {
        case 'owner' :
			set_input('e', $page[2]);
			set_input('sg', $page[3]);
            include "{$pages}owner.php";
            break;

        default :
            return false;
            break;
    }
    return true;
}

function hj_portfolio_owner_block_menu($hook, $type, $return, $params) {
    if (elgg_instanceof($params['entity'], 'user')) {
        $url = "portfolio/owner/{$params['entity']->username}";
        $return[] = new ElggMenuItem('portfolio', elgg_echo('hj:portfolio:menu:owner_block'), $url);
        return $return;
    }
    return false;
}

function hj_portfolio_get_portfolio_section_types_hook($hook, $type, $return, $params) {
    $context = elgg_extract('context', $params, false);

    if ($context && $context == 'portfolio') {
        $sections = hj_portfolio_get_portfolio_section_types();
        $return = array_merge($sections, $return);
    }
    return $return;
}

function hj_portfolio_container_permissions_check($hook, $type, $return, $params) {
    $container = elgg_extract('container', $params, false);
    $subtype = elgg_extract('subtype', $params, false);

    if (elgg_instanceof($container)) {
        $owner = $container->getOwnerEntity();
        if (elgg_instanceof($container, 'object', 'hjportfolio') && $subtype == 'hjsegment') {
            return true;
        }
    }
    
    return $return;
}