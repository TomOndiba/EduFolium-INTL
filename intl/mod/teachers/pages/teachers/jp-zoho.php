<?php
    // Load Elgg engine
    //include_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
 
    // make sure only logged in users can see this page	
    gatekeeper();
 
    // set the title
    $title = "Empleo para Docentes en Colombia!";
	$user = elgg_get_logged_in_user_entity();
	
    // layout the page
  	$body = '
  	<h2>
  	  Comparte estas ofertas con otros docentes en:  
  	</h2>
  	
  	<!-- AddThis Button BEGIN -->
  	<div class="addthis_toolbox addthis_default_style addthis_32x32_style" style="float: right;margin-top: -60px;margin-right: 150px;">
  	<a class="addthis_button_email"></a>
  	<a class="addthis_button_facebook"></a>
  	<a class="addthis_button_twitter"></a>
  	<a class="addthis_button_pinterest_share"></a>
  	<a class="addthis_button_google_plusone_share"></a>
  	<a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a>
  	</div>
  	<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
  	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51df54285c67c5b3"></script>
  	<!-- AddThis Button END -->
  	
			<iframe 
					style="overflow: auto; width: 100%; height: 4200px;" 
					frameborder="0" width="320" height="240" 
					src="https://recruit.zoho.com/ats/Portal.na?digest=SQjBd6msoqWEU8Q7h0zbsgP8IddWmSvNf0493AAtvtc-" >
			</iframe>	

			';
	
	
	

    // draw the page

	echo  elgg_view_page($title, $body);

?>