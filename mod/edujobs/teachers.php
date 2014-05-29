<?php
/**
 * Elgg edujobs helper functions
 * @package MembersMap
 */

// Get engine
require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
elgg_load_library('elgg:edujobs');

admin_gatekeeper();

$options = array('type' => 'user', 'full_view' => false, 'limit' => 0);
$users = elgg_get_entities($options);

//if ($users)  {
	//echo '<h4>Total Users: '.count($users).'</h4>';
//}

echo '<table>';
echo '<tr><th style="width:30px;">No</th><th style="width:200px;">Username</th><th style="width:200px;">Name</th><th style="width:300px;">Email</th><th style="width:100px;">CV</th><th style="width:100px;">Country</th><th style="width:100px;">Location</th></tr>';
$i=0;
$teachers="";
foreach ($users as $u)  {
	if ($u->custom_profile_type == DOCENTE_PROFILE_TYPE_GUID)	{
		$link = elgg_view('output/url', array(
			'href' => elgg_get_site_url().'profile/'.$u->username,
			'text' => $u->username,
			'is_trusted' => true,
		));
			echo '<tr><td>'.$i.'</td>';		
			echo '<td>'.$link.'</td>';
			echo '<td>'.$u->name.'</td>';			
			if($u->email)
				echo '<td>'.$u->email.'</td>';
			else
				{
				if($u->contactemail)	
					{
						echo '<td>'.$u->contactemail.'</td>';
						$u->email = $u->contactemail;					
					}	
					else
						{
							if ($u->School_Email)
							{
						echo '<td>'.$u->School_Email.'</td>';
						$u->email = $u->School_Email;								

							}
							else
							{
								echo '<td>N/A</td>';
								$u->email = "N/A";
							}	
						}
				}					
			
		$i=$i+1;											
		if (check_if_user_has_cv($u))
		{ 
			echo '<td>YES</td>';
			$cv="YES";
		}
		else
		{ 	
			echo '<td>NO</td>';
			$cv="NO";
		}
			echo '<td>'.$u->country.'</td>';		
			echo '<td>'.$u->location.'</td></tr>';
						
		$teachers.= $u->username. "|". $u->name ."|".	$u->email ."|".$cv ."\n";
	}
}
echo '</table>';

echo "<br />finished";
$fichero = 'usuarios.txt';
file_put_contents($fichero, $teachers);

$output = shell_exec('ruby edufolium_intl.rb');
echo "<br />Ruby Output: $output";
