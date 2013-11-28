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
            <h3 id="sociaRegisterLabel"><?php echo elgg_echo("Resgistro - Colegios"); ?></h3>
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
					<div id="butSchools"><a href="/intl" class="transition">Docentes</a></div>		
					<div id="IBPals_logo"><a href="/intl" class="transition"><img src="/intl/_graphics/logo.png"></a></div>
				</div>	
    
		</header>
		<div id="schools_container">
			
			<section class="section1">
				<h1>¡Olvidese de revisar cientos de hojas de vida para su proceso de contratación! Nosotros le damos acceso a los docentes que mejor se adaptan a sus necesidades de una manera fácil, cómoda y efectiva. </h1>
				<p>EduFolium está creando la comunidad de docentes más grande de Latinoamérica.  A través de algoritmos que nos permiten hacer un ranking de los recursos educativos subidos en nuestra plataforma podemos ofrecerle acceso a los mejores docentes del país.  Encuentre perfiles de LinkedIn y muestras del trabajo de los docentes. </p>
			</section>
			<section class="section2">
				<div class="lupa"></div>
				<div id="callAct" style="width: 360px;">
					<span class="destDos">
						Ingrese con los siguientes datos:<br><br>
						Usuario: <b>colegios@edufolium.com</b><br>
						Clave: <b>demo2013</b><br>

					</span>
					<div class="ib_butEntrar" style="float:none;margin-top:20px;margin-bottom:20px">
						<a href="https://www.zoho.com/recruit/login.html">Demo EduFolium</a>
					</div>
					<span class="destDos">
						Para consultar la base de datos de docentes más completa de Colombia<br>
					</span>							
				</div>
			</section>
		</div>			

		<script>
			$('#custom_profile_fields_custom_profile_type').css( "display", "none" );
			$('#custom_profile_fields_custom_profile_type').val($("#custom_profile_fields_custom_profile_type option:contains('Colegio')"));

			$("#custom_profile_fields_custom_profile_type option:contains('Docente')").attr("selected",false) ;
			$("#custom_profile_fields_custom_profile_type option:contains('Colegio')").attr("selected",true) ;	
			
			$('[name="custom_profile_fields_Colegio"]').attr("placeholder","Nombre del Colegio *");
			
			$('.sectionB').css( "display", "none" );
			$('#formulario').css( "margin-left", "150px" );
						
			
		</script>
	<?php 
		}
	?>
            
    </body>
</html>