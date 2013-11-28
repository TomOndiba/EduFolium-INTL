<?php

	register_elgg_event_handler('init','system','teachers_init');
	
function teachers_init() 
	{
		global $CONFIG;

		//HOME
		$item = new ElggMenuItem('teachers', "INICIO", 'teachers/home');
		elgg_register_menu_item('site', $item); 		
		
		//CONNECT
		$item2 = new ElggMenuItem('ibpals_connect', "CONECTAR", 'teachers/connect');
		elgg_register_menu_item('site', $item2); 	
		
		//SHARE
		$item3 = new ElggMenuItem('ibpals_share', "COMPARTIR", 'teachers/share');
		elgg_register_menu_item('site', $item3); 		

		//CREATE
		$item4 = new ElggMenuItem('ibpals_create', "CREAR", 'teachers/create');
		elgg_register_menu_item('site', $item4);

		//CREATE CV
		//CV-ZOHO
		$item5 = new ElggMenuItem('ibpals_cv', "CREAR CV", 'edujobs/teachers/mycv');
		elgg_register_menu_item('site', $item5);		

		//CV-ZOHO
		$item6 = new ElggMenuItem('ibpals_jp', "EMPLEOS", 'edujobs/jobs');
		elgg_register_menu_item('site', $item6);		
		
		
		elgg_register_css("ib_home", $CONFIG->url . "mod/teachers/css/ib_home.css");
			if (elgg_is_logged_in())
				elgg_load_css("ib_home");
		
		// Register a page handler, so we can have nice URLs
		elgg_register_page_handler('teachers', 'ibpals_page_handler');		
		
		
		
	}
		
	function ibpals_page_handler($page) {
		$base = elgg_get_plugins_path() . 'teachers/pages/teachers';

		if (!isset($page[0])) {
		$page[0] = 'home';
		}

		$vars = array();
		$vars['page'] = $page[0];
		
		if ($page[0] == 'home') {
			require_once "$base/home.php";
		} 

		
		if ($page[0] == 'create') {
			require_once "$base/create.php";
		} 

		if ($page[0] == 'share') {
			require_once "$base/share.php";
		} 

		if ($page[0] == 'connect') {
			require_once "$base/connect.php";
		} 
		
		if ($page[0] == 'cv') {
			require_once "$base/cv-zoho.php";
		} 	
		
		if ($page[0] == 'empleos_para_docentes') {
			require_once "$base/jp-zoho.php";
		} 	
		
		
		
	return true;
}

?>
