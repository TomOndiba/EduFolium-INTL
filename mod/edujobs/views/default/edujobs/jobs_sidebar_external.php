<?php
/**
 * Elgg edujobs plugin
 * @package EduFolium
 */
 
$curl = elgg_extract('curl', $vars, 'edujobs/jobs');
$country = elgg_extract('country', $vars, 0);
$city = elgg_extract('city', $vars,  '');
//$jobstart = elgg_extract('jobstart', $vars,  '');
$jobposts = elgg_extract('jobposts', $vars,  '');
$tags = elgg_extract('tags', $vars,  '');

// get countries list
$countrieslist = get_countries_list();
array_unshift($countrieslist, elgg_echo('edujobs:search:allcountries'));

?>

<form method="get" action="<?php echo elgg_get_site_url().$curl;?>" name="edujobspost" enctype="multipart/form-data" class="elgg-form">

<div class="form-wide">
	<label><?php echo elgg_echo('edujobs:search:country'); ?></label>
	<?php echo elgg_view('input/dropdown', array('name' => 'country', 'value' => $country, 'options_values' => $countrieslist, 'options_values' => $countrieslist, 'onchange' => 'this.form.submit()')); ?> 
</div>

<div class="form-wide">
	<label><?php echo elgg_echo('edujobs:label:jobsexternal:search:area'); ?></label>
	<?php echo elgg_view('input/text', array('name' => 'city', 'value' => $city, 'onchange' => 'this.form.submit()')); ?>
</div>

<div class="form-wide">
	<label><?php echo elgg_echo('edujobs:search:jobposts'); ?></label>
	<div class='form-right-checkbox'>
		<?php 
			echo elgg_view('input/radio', array('name' => 'jobposts', 'value' => $jobposts, 'options' => array(elgg_echo('edujobs:search:86400')=>'86400',elgg_echo('edujobs:search:259200')=>'259200',elgg_echo('edujobs:search:604800')=>'604800'), 'onchange' => 'this.form.submit()'));
		?>
	</div>
</div>

<div class="form-wide">
	<label><?php echo elgg_echo('edujobs:search:tags'); ?></label>
	<?php echo elgg_view('input/tags', array('name' => 'tags', 'value' => $tags, 'onchange' => 'this.form.submit()')); ?>
</div>	

<?php 
	echo elgg_view('input/hidden', array('name' => 'searchformsubmitted', 'value' => '1')); 
	//echo elgg_view('input/submit', array('value' => elgg_echo('edujobs:search:submit')));
?>

</form>
