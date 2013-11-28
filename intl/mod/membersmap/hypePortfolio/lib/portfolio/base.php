<?php
/**
 * Get user's portfolio
 * 
 * @param ElggUser $user 
 * @return hjPortfolio
 */
function hj_portfolio_find_user_portfolios($user) {
    $portfolios = hj_framework_get_entities_by_priority('object', 'hjportfolio', $user->guid);
    return $portfolios;
}

/**
 * Get available portfolio sections
 * 
 * @return array 
 */
function hj_portfolio_get_portfolio_section_types() {
    $sections = get_plugin_setting('hj:framework:sections:portfolio', 'hypeFramework');
    if (!$sections) {
        $sections = array('hjexperience', 'hjeducation', 'hjskill', 'hjlanguage', 'hjportfoliofile');
    } else {
        $sections = explode(',', $sections);
    }
    
    $sections = elgg_trigger_plugin_hook('hj:portfolio:sections', 'hjportfolio', array('sections' => $sections), $sections);
    
    set_plugin_setting('hj:framework:sections:portfolio', implode(',', $sections), 'hypeFramework');
    
    foreach ($sections as $section) {
        $return[$section] = elgg_echo("hj:portfolio:$section");
    }
    
    return $return;
}

/**
 * An array of language proficiency levels
 * 
 * @return array 
 */
function hj_portfolio_get_language_proficiency_array() {
    $proficiency = array(
        elgg_echo('hj:portfolio:proficiency:native'),
        elgg_echo('hj:portfolio:proficiency:fullprofessional'),
        elgg_echo('hj:portfolio:proficiency:workingprofessional'),
        elgg_echo('hj:portfolio:proficiency:limitedworking'),
        elgg_echo('hj:portfolio:proficiency:elementary')
    );
    $proficiency = elgg_trigger_plugin_hook('hj:portfolio:hjlanguage:proficiency', 'hjportfolio', array('current' => $proficiency), $proficiency);
    return $proficiency;
}
