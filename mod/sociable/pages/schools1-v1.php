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
    <div id="sociaLogin" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="sociaLoginLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="sociaLoginLabel"><?php echo elgg_echo("Ingreso - Colegio"); ?></h3>
        </div>
        <div class="modal-body">
            <?php echo elgg_view_form("login"); ?>
        </div>
        <div class="modal-footer">
            <button class="btn btn-info socia_register" data-dismiss="modal">Registrarse</button>
            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
        </div>
    </div>    

	
		<header class="IB_school_header">
				<div id="ib_head">
					<div id="butSchools"><a href="/intl" class="transition">Docentes</a></div>		
					<div id="IBPals_logo"><a href="/intl" class="transition"><img src="/intl/_graphics/logo.png"></a></div>
				</div>	
				<div id="topforma">
					<div id="logvalidate">
						<a class="socia_register" href="<?php echo $CONFIG->url; ?>register" onClick="_gaq.push(['_trackEvent','SignUP-Schools','OpenForm','Top Menu']);">Regístrese</a>
					</div>
					<div class="logvalidateB">
						<a class="socia_login" href="<?php /*echo $CONFIG->url; */?>login"><spam class="azul">Ingrese +</spam></a>
					</div>
				</div>    
		</header>
		<div id="schools_container">
			
			<section class="section1">
				<h1>Con más de 1,600 docentes en nuestra plataforma, EduFolium es la alternativa para encontrar los mejores profesionales para su colegio.  </h1>
				<p> EduFolium está creando la comunidad de docentes más grande de Latinoamérica. Tenemos en la actualidad más de 1600 docentes activos en la comunidad en línea y más de 1,500 hojas de vida en nuestra base de datos (no todas disponibles para consulta en línea).  </p>
			</section>
			<section class="section2">
				<div class="lupa"></div>
				<div id="callAct">
					<span class="destDos">
						 Explore cientos de hojas de vida de Docentes, publique sus ofertas laborales y gestione los candidatos.  
					</span>
					<div class="ib_butEntrar" style="float:none;margin-top:20px">
						<a class="socia_register" onClick="_gaq.push(['_trackEvent','SignUP-Schools','OpenForm','Registrese']);" href="<?php echo $CONFIG->url; ?>register">Regístrese</a>
					</div>		
				</div>
			</section>
		</div>			

		<script>
		 
			$('#topforma').css( "float", "left" );	
			$('#topforma').css( "margin-left", "500px" );					
			$('#custom_profile_fields_custom_profile_type').css( "display", "none" );
			$('#custom_profile_fields_custom_profile_type').val($("#custom_profile_fields_custom_profile_type option:contains('Colegio')"));

			$("#custom_profile_fields_custom_profile_type option:contains('Docente')").attr("selected",false) ;
			$("#custom_profile_fields_custom_profile_type option:contains('Colegio')").attr("selected",true) ;	
			
			$('[name="custom_profile_fields_Colegio"]').attr("placeholder","Nombre del Colegio *");
			$('[name="custom_profile_fields_School_Email"]').css( "display", "none" );
			$('[name="custom_profile_fields_Materias"]').css( "display", "none" );
			$('#custom_profile_fields_Nivel1_chzn').css( "display", "none" );
			$('#custom_profile_fields_Areas2_chzn').css( "display", "none" );
			$('#more_info_School_Email').css( "display", "none" );
			$('#more_info_Materias').css( "display", "none" );			
			
			$('.sectionB').css( "display", "none" );
			$('#formulario').css( "margin-left", "150px" );
						
			
		</script>
	<?php 
		}
	?>
            
    </body>
</html>
