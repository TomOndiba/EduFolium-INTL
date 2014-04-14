<?php
/**
 * The standard HTML head
 *
 * @uses $vars['title'] The page title
 */

// Set title
if (empty($vars['title'])) {
	$title = elgg_get_config('sitename');
} else {
	$title = elgg_get_config('sitename') . ": " . $vars['title'];
}

global $autofeed;
if (isset($autofeed) && $autofeed == true) {
	$url = full_url();
	if (substr_count($url,'?')) {
		$url .= "&view=rss";
	} else {
		$url .= "?view=rss";
	}
	$url = elgg_format_url($url);
	$feedref = <<<END

	<link rel="alternate" type="application/rss+xml" title="RSS" href="{$url}" />

END;
} else {
	$feedref = "";
}

$js = elgg_get_loaded_js('head');
$css = elgg_get_loaded_css();

$version = get_version();
$release = get_version(true);
?>
<script type="text/javascript">

if (window.location.hash && window.location.hash === "#_=_") {
window.location.hash = "";
}

</script>

<script type="text/javascript">
var fb_param = {};
fb_param.pixel_id = '6015041470775';
fb_param.value = '0.00';
fb_param.currency = 'USD';
(function(){
  var fpw = document.createElement('script');
  fpw.async = true;
  fpw.src = '//connect.facebook.net/en_US/fp.js';
  var ref = document.getElementsByTagName('script')[0];
  ref.parentNode.insertBefore(fpw, ref);
})();
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6015041470775&amp;value=0&amp;currency=USD" /></noscript>

	<script type="text/javascript">
	var fb_param = {};
	fb_param.pixel_id = '6009913331575';
	fb_param.value = '0.00';
	fb_param.currency = 'USD';
	(function(){
	  var fpw = document.createElement('script');
	  fpw.async = true;
	  fpw.src = '//connect.facebook.net/en_US/fp.js';
	  var ref = document.getElementsByTagName('script')[0];
	  ref.parentNode.insertBefore(fpw, ref);
	})();
	</script>
	<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6009913331575&amp;value=0&amp;currency=USD" /></noscript>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="EduFolium es un sitio para docentes y colegios, donde además de encontrar Empleo para Docentes, los educadores también se podrán CONECTAR, COMPARTIR y CREAR información con otros colegas.">
    <meta name="keywords" content="EduFolium, Empleo para Docentes, Colegios, Docentes, Docentes Colombia, Profesores, Educadores, Educadores Colombia, Profesores Colombia, Empleo para docentes en Colombia, Empleos Docentes">
    <meta name="ElggRelease" content="<?php echo $release; ?>" />
	<meta name="ElggVersion" content="<?php echo $version; ?>" />
    	<meta name="robots" content="index,follow">	
	<title><?php echo "Empleo para Docentes - ".$title; ?></title>
	<?php echo elgg_view('page/elements/shortcut_icon', $vars); ?>

<?php foreach ($css as $link) { ?>
	<link rel="stylesheet" href="<?php echo $link; ?>" type="text/css" />
<?php } ?>

<?php
	$ie_url = elgg_get_simplecache_url('css', 'ie');
	$ie7_url = elgg_get_simplecache_url('css', 'ie7');
	$ie6_url = elgg_get_simplecache_url('css', 'ie6');
?>
	<!--[if gt IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php echo $ie_url; ?>" />
	<![endif]-->
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php echo $ie7_url; ?>" />
	<![endif]-->
	<!--[if IE 6]>
		<link rel="stylesheet" type="text/css" href="<?php echo $ie6_url; ?>" />
	<![endif]-->

<?php foreach ($js as $script) { ?>
	<script type="text/javascript" src="<?php echo $script; ?>"></script>
<?php } ?>

<script type="text/javascript">
// <![CDATA[
	<?php echo elgg_view('js/initialize_elgg'); ?>
// ]]>
</script>

<?php
echo $feedref;

$metatags = elgg_view('metatags', $vars);
if ($metatags) {
	elgg_deprecated_notice("The metatags view has been deprecated. Extend page/elements/head instead", 1.8);
	echo $metatags;
}
