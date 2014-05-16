<?php
/**
 * Elgg edujobs plugin
 * @package EduFolium
 */
 
 // Get engine
require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
elgg_load_library('elgg:edujobs');

$access_id = 2; // set default access id for jobs inserted, 2=public
?>
 
 
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   <input type="submit" name="Fill_file" value="Fill Jobs File"><br>
</form>


<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   <input type="submit" name="Show_file" value="Show Jobs File"><br>
</form>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   <input type="submit" name="Clear_file" value="Clear Jobs File"><br>
</form>

<?php
if(isset($_POST['Clear_file'])) 
{ 
	$jobs=" ";
	$file = 'jobs.txt';
	file_put_contents($file, $jobs);
    echo "File Cleared";
}

if(isset($_POST['Show_file'])) 
{ 
	$file = 'jobs.txt';
	$actual = file_get_contents($file);
	echo $actual;    
}

if(isset($_POST['Fill_file'])) 
{ 
    echo "Filling File";
	$output = shell_exec('ruby get_indeed_jobs.rb');
	echo "<br />Ruby Output: $output";    

}

// options for checking if each job entry already exists
$options = array(
	'type' => 'object',
	'subtype' => 'edujobsext',
	'limit' => 0,
	'count' => true,
);     
	        

if(isset($_GET['country']) && isset($_GET['title']) && isset($_GET['company']) && isset($_GET['location']) && isset($_GET['summary']) && isset($_GET['source']) && isset($_GET['link']))
{
	$country=$_GET["country"];
	$title=$_GET["title"];
	$company=$_GET["company"];
	$location=$_GET["location"];
	$summary=$_GET["summary"];
	$source=$_GET["source"];
	$link=$_GET["link"];
	
	// login as site admin
	login(get_entity(SITE_ADMIN_GUID));
	
	// check if this job entry already exists
	$options['metadata_name_value_pairs'] = array('name' => 'link', 'value' => $link, 'operand' => '=');
	$exists = elgg_get_entities_from_metadata($options);
	//error_log('-------------->'.$exists);
	
	if ($exists > 0) {
		//error_log('--------------> this entry already exists - '.$exists);
	}
	else {
		$job = new ElggObject;
		$job->subtype = "edujobsext";        
		$job->container_guid = elgg_get_logged_in_user_guid();
		$job->owner_guid = elgg_get_logged_in_user_guid();	
		$job->access_id = $access_id;
		
		// convert title to array for storing in tags
		$title_array = explode(" ", $title);
		$tmp_array_1 = array_map('trim', $title_array);
		
		// convert title to array for storing in tags
		$company_array = explode(" ", $company);
		$tmp_array_2 = array_map('trim', $company_array);		
		
		// merge arrays
		$tag_array = array_merge($tmp_array_1, $tmp_array_2);
		
		// get alternative location
		$location_alternative = get_location_alternative($location);
		
		$job->title = $title; 
		$job->company = $company; 
		$job->location = $location; 
		$job->country = $country; 
		$job->description = $summary; 
		$job->source = $source; 
		$job->link = $link; 
		$job->tags = $tag_array;
		$job->comments_on = 'Off';
		if ($location_alternative)	{
			$job->localt = $location_alternative;
		}
		
		$job->save();
	}

	logout();  // logout user
    
}

?>

