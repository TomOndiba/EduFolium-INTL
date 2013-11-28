<?php
/**
 * Elgg pageshell
 * The standard HTML page shell that everything else fits into
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['title']       The page title
 * @uses $vars['body']        The main content of the page
 * @uses $vars['sysmessages'] A 2d array of various message registers, passed from system_messages()
 */
// backward compatability support for plugins that are not using the new approach
// of routing through admin. See reportedcontent plugin for a simple example.
if (elgg_get_context() == 'admin') {
    if (get_input('handler') != 'admin') {
        elgg_deprecated_notice("admin plugins should route through 'admin'.", 1.8);
    }
    elgg_admin_add_plugin_settings_menu();
    elgg_unregister_css('elgg');
    echo elgg_view('page/admin', $vars);
    return true;
}

// render content before head so that JavaScript and CSS can be loaded. See #4032

$messages = elgg_view('page/elements/messages', array('object' => $vars['sysmessages']));
$header = elgg_view('page/elements/header', $vars);
$body = elgg_view('page/elements/body', $vars);
$footer = elgg_view('page/elements/footer', $vars);

// Set the content type
header("Content-type: text/html; charset=UTF-8");

$lang = get_current_language();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang; ?>" lang="<?php echo $lang; ?>">
    <head>
		<?php echo elgg_view('page/elements/head', $vars); ?>
    </head>
	
    <body>
	<?php 
	if (!elgg_is_logged_in()) {
	?>

	<div id="sociaRegister" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="sociaRegisterLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="sociaRegisterLabel"><?php echo elgg_echo("Registro - Colegios"); ?></h3>
        </div>
        <div class="modal-body">
            <?php echo elgg_view_form("register"); ?>
        </div>
        <div class="modal-footer" style="display:none">
            <button class="btn btn-info socia_login" data-dismiss="modal">Login</button>
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
        </div>
    </div>

		<header class="IB_school_header">
				<div id="ib_head">
					<div id="butSchools"><a href="/" class="transition">for Teachers</a></div>		
					<div id="IBPals_logo"><a href="/" class="transition"><img src="/intl/_graphics/logo.png"></a></div>
				</div>	
    
		</header>
		<div id="schools_container">
			<section class="section1">
				<h1>Tired of receiving CVs from teachers with limited or even no proven IB experience during your recruitment process?</h1>
				<p>EduFolium for IB is building the largest community of IB teachers around the world. We only allow access to teachers that can certify their experience. In addition, via ranked samples of the teaching resources they create, we provide you with valuable insights to evaluate your prospects. </p>
			</section>
			<section class="section2">
				<div class="lupa"></div>
				<div id="callAct">
					<p>
						<spam class="destDos">Be one of the first schools to sign up with us and you will gain access to 1,000 profiles for a one time fee of $250 dollars (a 25% discount).</spam>
					</p>
					<p>
						<spam class="destCuatro">Sign up below. No credit card needed.<br>You will only be charged once we give you access to the profiles.</spam>
					</p>

					<div class="ib_butEntrar">
						<a class="socia_register" href="<?php echo $CONFIG->url; ?>register">Sign Up</a>
					</div>
				</div>
			</section>
		</div>
			
		
			
		</div>
		<script>
			$('#custom_profile_fields_custom_profile_type').css( "display", "none" );
			$('#custom_profile_fields_custom_profile_type').val($("#custom_profile_fields_custom_profile_type option:contains('IB School')"));

			$("#custom_profile_fields_custom_profile_type option:contains('IB Teacher')").attr("selected",false) ;
			$("#custom_profile_fields_custom_profile_type option:contains('IB School')").attr("selected",true) ;	
			
			$('.sectionB').css( "display", "none" );
			$('#formulario').css( "margin-left", "150px" );
						
			
		</script>
	<?php 
		}
	?>
            
    </body>
</html>