<?php

/*
 * Project Name:            Sociable Theme
 * Project Description:     Theme for Elgg 1.8
 * Author:                  Shane Barron - SocialApparatus
 * License:                 GNU General Public License (GPL) version 2
 * Website:                 http://socia.us
 * Contact:                 sales@socia.us
 * 
 * File Version:            1.0
 * Last Updated:            5/11/2013
 */

elgg_register_event_handler('init', 'system', 'sociable_init');

function sociable_init() {
    global $CONFIG;

	elgg_register_page_handler('signup_ok', 'signupok_page_handler');
	elgg_register_page_handler('ib_teachers', 'ib_teachers_page_handler');	
	elgg_register_page_handler('colegios', 'colegios_page_handler');
	elgg_register_page_handler('ib_schools2', 'ib_schools2_page_handler');
	elgg_register_page_handler('ib_schools3', 'ib_schools3_page_handler');
	elgg_register_page_handler('ib_schools4', 'ib_schools4_page_handler');	
	elgg_register_page_handler('home_schools', 'home_schools_page_handler');		

    if (elgg_get_context() === "admin") {
        elgg_unregister_css("twitter-bootstrap");
        elgg_unregister_css("ui-lightness");
        elgg_unregister_css("sociable");
        elgg_unregister_css("bubblegum");
        elgg_unregister_css("righteous");
        elgg_unregister_css("ubuntu");
		/*IBPals*/
        elgg_unregister_css("formstile");
		elgg_unregister_css("fonts-google");
		elgg_unregister_css("main");
		elgg_unregister_css("normalize");
		elgg_unregister_css("schools");				
		elgg_unregister_js("prefixfree");
		elgg_unregister_js("plugins");
		/*IBPals*/
        elgg_unregister_js("sociable");
        elgg_unregister_js("jquery-migrate");
        elgg_unregister_js("twitter-bootstrap");
    } else {
        elgg_register_css("twitter-bootstrap", $CONFIG->url . "mod/sociable/vendors/bootstrap/css/bootstrap.css");
        elgg_register_css("ui-lightness", $CONFIG->url . "mod/sociable/vendors/jquery-ui-1.10.2.custom/css/ui-lightness/jquery-ui-1.10.2.custom.min.css");
        elgg_register_css("sociable", $CONFIG->url . "mod/sociable/css/sociable.css");
        elgg_register_css("bubblegum", "http://fonts.googleapis.com/css?family=Bubblegum+Sans");
        elgg_register_css("righteous", "http://fonts.googleapis.com/css?family=Righteous");
        elgg_register_css("ubuntu", "http://fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic");
		/*IBPals*/
		elgg_register_css("main", $CONFIG->url . "mod/sociable/css/main.css");
		elgg_register_css("formstile", $CONFIG->url . "mod/sociable/css/formstile.css");
		elgg_register_css("normalize", $CONFIG->url . "mod/sociable/css/normalize.css");
		elgg_register_css("schools", $CONFIG->url . "mod/sociable/css/styleSchools.css");
		elgg_register_css("main", $CONFIG->url . "mod/sociable/css/main.css");		
		elgg_register_css("fonts-google","http://fonts.googleapis.com/css?family=Open+Sans:400,700,600");
		elgg_register_js("prefixfree", $CONFIG->url . "mod/sociable/js/prefixfree.min.js");
		elgg_register_js("plugins", $CONFIG->url . "mod/sociable/js/plugins.js");
		elgg_register_js("chosen", $CONFIG->url . "mod/sociable/js/chosen.jquery.js");
		/*IBPals*/
        elgg_register_js("sociable", $CONFIG->url . "mod/sociable/js/sociable.js");
        elgg_register_js("jquery", $CONFIG->url . "mod/sociable/vendors/jquery/jquery-1.9.1.min.js", "head", 0);
        elgg_register_js("jquery-migrate", $CONFIG->url . "mod/sociable/vendors/jquery/jquery-migrate-1.1.1.js", "head", 1);
        elgg_register_js("jquery-ui", $CONFIG->url . "mod/sociable/vendors/jquery-ui-1.10.2.custom/js/jquery-ui-1.10.2.custom.min.js", "head", 2);
        elgg_register_js("twitter-bootstrap", $CONFIG->url . "mod/sociable/vendors/bootstrap/js/bootstrap.min.js");
		
        elgg_load_js("sociable");
		elgg_load_js("jquery");		
		elgg_load_js("jquery-ui");
        elgg_load_js("jquery-migrate");		
        elgg_load_js("twitter-bootstrap");
		
        elgg_load_css("ui-lightness");
        elgg_load_css("twitter-bootstrap");
        elgg_load_css("righteous");
        elgg_load_css("ubuntu");
        elgg_load_css("bubblegum");
        elgg_load_css("sociable");
		/*IBPals*/

		elgg_load_js("chosen");
			if (!elgg_is_logged_in()) {
				elgg_load_css("formstile");
				elgg_load_css("fonts-google");
				elgg_load_css("normalize");
				elgg_load_css("schools");						
				elgg_load_css("main");									
				elgg_load_js("prefixfree");
				elgg_load_js("plugins");				
			}	

		/*IBPals*/		
        set_view_location("navigation/menu/site", elgg_get_plugins_path() . "sociable/new_views/");
        set_view_location("navigation/menu/elements/item", elgg_get_plugins_path() . "sociable/new_views/");
        set_view_location("navigation/menu/elements/section", elgg_get_plugins_path() . "sociable/new_views/");
        set_view_location("navigation/tabs", elgg_get_plugins_path() . "sociable/new_views/");
        set_view_location("navigation/menu/widget", elgg_get_plugins_path() . "sociable/new_views/");
    }
}

function ib_teachers_page_handler($page) {

	$base = elgg_get_plugins_path() . 'sociable/pages';
	require_once "$base/teachers.php";
	
return true;	
}

function colegios_page_handler($page) {

	$base = elgg_get_plugins_path() . 'sociable/pages';
	require_once "$base/schools1-v1.php";
	
return true;	
}

function ib_schools2_page_handler($page) {

	$base = elgg_get_plugins_path() . 'sociable/pages';
	require_once "$base/schools2.php";
	
return true;	
}

function ib_schools3_page_handler($page) {

	$base = elgg_get_plugins_path() . 'sociable/pages';
	require_once "$base/schools3.php";
	
return true;	
}

function ib_schools4_page_handler($page) {

	$base = elgg_get_plugins_path() . 'sociable/pages';
	require_once "$base/schools4.php";
	
return true;	
}

function home_schools_page_handler($page) {

	elgg_load_css("formstile");
	elgg_load_css("fonts-google");
	elgg_load_css("normalize");
	elgg_load_css("schools");						
	elgg_load_css("main");									
	elgg_load_js("prefixfree");
	elgg_load_js("plugins");			
	$base = elgg_get_plugins_path() . 'sociable/pages';
	require_once "$base/home_schools.php";
	
return true;	
}

function signupok_page_handler($page) {

	$base = elgg_get_plugins_path() . 'sociable/pages';
	require_once "$base/signupok.php";
	
return true;	
}
