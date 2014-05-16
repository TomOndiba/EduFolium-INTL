<?php

	/**
	* This view displays the Digest footer.
	*
	* Available in $vars
	* 	$vars['user'] 		=> the current user for whom we're creating the digest
	* 	$vars['group'] 		=> (optional) the current group for whom we're creating the digest
	* 	$vars['ts_lower']	=> the lower time limit of the content in this digest
	* 	$vars['ts_upper']	=> the upper time limit of the content in this digest
	* 	$vars['interval']	=> the interval of the current digest
	* 							(as defined in DIGEST_INTERVAL_DAILY, DIGEST_INTERVAL_WEEKLY, DIGEST_INTERVAL_FORTNIGHTLY, DIGEST_INTERVAL_MONTHLY)
	*
	*/

	$group = elgg_extract("group", $vars);
	
	if(!empty($group)){
		$description = $group->briefdescription;
	} else {
		$site = elgg_get_site_entity();
		
		$description = $site->description;
	}

    echo '
<!-- BEGIN FOOTER edujobs nikos // -->

<div class="social_ext" >
<div class="social_mid" >
<div class="social_int" >
	<table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnFollowStacked">
		<tbody><tr>
			<td align="center" valign="top" class="mcnFollowIconContent" style="padding-right:10px; padding-bottom:5px;">
				<a href="http://plus.google.com/+edufolium" target="_blank"><img src="http://cdn-images.mailchimp.com/icons/social-block/color-googleplus-128.png" alt="Google Plus" class="mcnFollowBlockIcon" width="48" style="width:48px; max-width:48px; display:block;"></a>
			</td>
		</tr>
		<tr>
			<td align="center" valign="top" class="mcnFollowTextContent" style="padding-right:10px; padding-bottom:9px;">
				<a href="http://plus.google.com/+edufolium" target="_blank" style="color: #606060;font-family: Arial;font-size: 11px;font-weight: normal;line-height: 100%;text-align: center;text-decoration: none;">Google Plus</a>
			</td>
		</tr>
	</tbody></table>

	<table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnFollowStacked">
		<tbody><tr>
			<td align="center" valign="top" class="mcnFollowIconContent" style="padding-right:10px; padding-bottom:5px;">
				<a href="http://www.facebook.com/edufolium" target="_blank"><img src="http://cdn-images.mailchimp.com/icons/social-block/color-facebook-128.png" alt="Facebook" class="mcnFollowBlockIcon" width="48" style="width:48px; max-width:48px; display:block;"></a>
			</td>
		</tr>
		<tr>
			<td align="center" valign="top" class="mcnFollowTextContent" style="padding-right:10px; padding-bottom:9px;">
				<a href="http://www.facebook.com/edufolium" target="_blank" style="color: #606060;font-family: Arial;font-size: 11px;font-weight: normal;line-height: 100%;text-align: center;text-decoration: none;">Facebook</a>
			</td>
		</tr>
	</tbody></table>

	<table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnFollowStacked">
		<tbody><tr>
			<td align="center" valign="top" class="mcnFollowIconContent" style="padding-right:10px; padding-bottom:5px;">
				<a href="http://www.twitter.com/edufolium" target="_blank"><img src="http://cdn-images.mailchimp.com/icons/social-block/color-twitter-128.png" alt="Twitter" class="mcnFollowBlockIcon" width="48" style="width:48px; max-width:48px; display:block;"></a>
			</td>
		</tr>
		<tr>
			<td align="center" valign="top" class="mcnFollowTextContent" style="padding-right:10px; padding-bottom:9px;">
				<a href="http://www.twitter.com/edufolium" target="_blank" style="color: #606060;font-family: Arial;font-size: 11px;font-weight: normal;line-height: 100%;text-align: center;text-decoration: none;">Twitter</a>
			</td>
		</tr>
	</tbody></table>

	<table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnFollowStacked">
		<tbody><tr>
			<td align="center" valign="top" class="mcnFollowIconContent" style="padding-right:10px; padding-bottom:5px;">
				<a href="https://www.linkedin.com/in/edufolium" target="_blank"><img src="http://cdn-images.mailchimp.com/icons/social-block/color-linkedin-128.png" alt="LinkedIn" class="mcnFollowBlockIcon" width="48" style="width:48px; max-width:48px; display:block;"></a>
			</td>
		</tr>
		<tr>
			<td align="center" valign="top" class="mcnFollowTextContent" style="padding-right:10px; padding-bottom:9px;">
				<a href="https://www.linkedin.com/in/edufolium" target="_blank" style="color: #606060;font-family: Arial;font-size: 11px;font-weight: normal;line-height: 100%;text-align: center;text-decoration: none;">LinkedIn</a>
			</td>
		</tr>
	</tbody></table>

	<table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnFollowStacked">
		<tbody><tr>
			<td align="center" valign="top" class="mcnFollowIconContent" style="padding-right:0; padding-bottom:5px;">
				<a href="http://edufolium.com" target="_blank"><img src="http://cdn-images.mailchimp.com/icons/social-block/color-link-128.png" alt="Website" class="mcnFollowBlockIcon" width="48" style="width:48px; max-width:48px; display:block;"></a>
			</td>
		</tr>
		<tr>
			<td align="center" valign="top" class="mcnFollowTextContent" style="padding-right:0; padding-bottom:9px;">
				<a href="http://edufolium.com" target="_blank" style="color: #606060;font-family: Arial;font-size: 11px;font-weight: normal;line-height: 100%;text-align: center;text-decoration: none;">Website</a>
			</td>
		</tr>
	</tbody></table>
	
</div>
</div>
</div>
<!-- // END FOOTER -->	
';
	
	if(!empty($description)){
		echo "<div class='digest-footer-quote'>";
		echo "<table>";
		echo "<tr>";
		echo "<td class='digest-footer-quote-left'>";
		echo "<img src='" . elgg_get_site_url() . "mod/digest/_graphics/quote_left.png' />";
		echo "</td>";
		echo "<td>" . $description . "</td>";
		echo "<td class='digest-footer-quote-right'>";
		echo "<img src='" . elgg_get_site_url() . "mod/digest/_graphics/quote_right.png' />";
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		echo "</div>";
	}
	

	

