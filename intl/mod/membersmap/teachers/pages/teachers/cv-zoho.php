<?php
    // Load Elgg engine
    //include_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
 
    // make sure only logged in users can see this page	
    gatekeeper();
 
    // set the title
    $title = "Home for IB Teachers!";
	$user = elgg_get_logged_in_user_entity();
	
    // layout the page
  	$body = '
			<iframe 
					style="overflow: auto; width: 100%; height: 4200px;" 
					frameborder="0" width="320" height="240" 
					src="https://recruit.zoho.com/ats/Portal.na?digest=SQjBd6msoqWEU8Q7h0zbsitJn5ITkAqAgQ1QhtzPy0s-" >
			</iframe>	

			';
	
	
	

    // draw the page

	echo  elgg_view_page($title, $body);

?>