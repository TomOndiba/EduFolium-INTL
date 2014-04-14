
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

if(isset($_GET['country']))
{
	$country=$_GET["country"];
	$title=$_GET["title"];
	$company=$_GET["company"];
	$location=$_GET["location"];
	$summary=$_GET["summary"];
	$source=$_GET["source"];
	$link=$_GET["link"];
    
    $jobs= $country."|".$title."|".$company."|".$location."|".$summary."|".$source."|".$link."</br></br></br>";
	$file = 'jobs.txt';
	$actual = file_get_contents($file);
	$actual .= $jobs;	
	file_put_contents($file, $actual);
}

?>

