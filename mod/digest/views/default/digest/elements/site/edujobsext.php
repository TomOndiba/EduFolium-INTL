<?php

	/**
	* Shows the latests  external edujobs in the Digest
	*
	*/
	
	$ts_lower = (int) elgg_extract("ts_lower", $vars);
	$ts_upper = (int) elgg_extract("ts_upper", $vars);
	
	// only show jobs that are published
	$dbprefix = elgg_get_config("dbprefix");
	
	$job_status_name_id = add_metastring("status");
	$job_published_value_id = add_metastring("published");
	
	$job_options = array(
		'type' => 'object', 
		'subtype' => 'edujobsext', 
		'limit' => 10, 
		'created_time_lower' => $ts_lower,
		'created_time_upper' => $ts_upper,		
	);	
	
	$search_options = array();
	$user = elgg_extract("user", $vars);
	$country = $user->country;
	if ($country) {
		$country_frm = array('name' => 'country','value' => $country, 'operand' => '=');
		array_push($search_options,$country_frm);
	}	
	
	if($search_options){  // in case of sidebar form submitted
		$job_options['metadata_name_value_pairs'] = $search_options;
		$job_options['metadata_name_value_pairs_operator'] = 'AND';
		$jobs = elgg_get_entities_from_metadata($job_options);
	}
	else {
		$jobs = elgg_get_entities($job_options);
	}	
	
	if($jobs){
		$title = elgg_view("output/url", array("text" => elgg_echo("jobsext"), "href" => "edujobs/teachers/extjobs" ));
		
		$latest_jobs = "";
		
		foreach($jobs as $job){
			$job_url = $job->getURL();
			
			//get location
			$location = '';
			$flag = get_country_flag($job->country);
			if ($job->location) $location .= $job->location;
			if ($job->country) $location .= ', ' . $job->country;
			if ($flag) $location .= '&nbsp;<img src="'.elgg_get_site_url().'mod/edujobs/assets/flags/'.$flag.'" width="20" height="12" alt="'.$job->country.'" />';

			$latest_jobs .= "<div class='digest-job'>";
			if($job->icontime){
				$latest_jobs .= "<a href='" . $job_url. "'><img src='". $job->getIconURL("medium") . "' /></a>";
			}
			$latest_jobs .= "<span>";
			$latest_jobs .= "<h4><a href='" . $job_url. "'>" . $job->title . "</a></h4>";
			$latest_jobs .= elgg_get_excerpt($job->description);
			$latest_jobs .= '<br />';
			if ($location) $latest_jobs .= $location . ' | ';
			$latest_jobs .= elgg_echo('edujobs:view:job:date') . date(DATE_FORMAT, $job->time_created);
			$latest_jobs .= "</span>";
			$latest_jobs .= "</div>";
		}
		
		echo elgg_view_module("digest", $title, $latest_jobs);
	}
	
