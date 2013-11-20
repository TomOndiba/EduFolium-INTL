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
	if (elgg_is_logged_in()) {
	?>

		<header class="IB_school_header">
				<div id="ib_head">
					<div id="butSchools"><a href="<?php echo $CONFIG->url; ?>action/logout" class="transition">Cerrar Sesión</a></div>		
					<div id="IBPals_logo"><a href="/intl" class="transition"><img src="/intl/_graphics/logo.png"></a></div>
				</div>	
    
		</header>
		<div id="schools_container">
			
			<section class="section1">
				<h1>Gracias por registrarse.<br>Estamos trabajando para ofrecerle una herramienta que le permita explorar la base de datos de docentes.</h1>
				<p>EduFolium le permitirá tener acceso fácil a miles de hojas de vida, incluyendo el perfil de LinkedIn y muestras de los recursos educativos que el docente ha creado. Algoritmos en la paltaforma nos permiten hacerle sugerencias de los mejores docentes que tenemos.</p>
			</section>
			<section class="section2">
				<div class="lupa"></div>
				<div id="callAct">
					<span class="destDos">
						Agradecemos su interés en EduFolium y como uno de nuestros primeros usuarios queremos ofrecerle cinco (5) anuncios de empleo gratis.<br>
					</span>
					<div class="ib_butEntrar" style="float:none;margin-top:20px">
						<a href="mailto:jobpostings@edufolium.com?subject=Anuncio">Envíenos su anuncio</a>
					</div>
				</div>
			</section>
		</div>			

		<script>
			$('.sectionB').css( "display", "none" );
			$('#formulario').css( "margin-left", "150px" );
		</script>
	<?php 
		}
		else
		{
			forward("ib_schools1");
		}
	?>
            
    </body>
</html>